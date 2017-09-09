<?php
/**
 * @created    06-03-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */

App::uses('Sanitize', 'Utility');
class AppModel extends Model
{
    public $recursive = -1;
    public $sanitize = true;
    
    public $parent_field = null, $model_cache_config = "day", $model_cache_key = null;
    
    public static $authUser = array();    
    /**
     * Save the created_on, created_by, modified_on, modified_by data
     * @param array $options
     */
    public function beforeSave($options = array())
    {
        //Checks if created_on field is exists and it's not record edit mode
        if ($this->hasField('created_on') && empty($this->data[$this->alias][$this->primaryKey]))
        {
            $this->data[$this->alias]['created_on'] = date('Y-m-d H:i:s');
        }

        //Checks if modified_on field is exists
        if ($this->hasField('modified_on'))
        {
            $this->data[$this->alias]['modified_on'] = date('Y-m-d H:i:s');
        }

        if (self::$authUser)
        {
            //Checks if created_by field is exists and it's not record edit mode
            if ($this->hasField('created_by'))
            {
                $this->data[$this->alias]['created_by'] = self::$authUser["id"];
            }

            //Checks if modified_by field is exists
            if ($this->hasField('modified_by'))
            {
                $this->data[$this->alias]['modified_by'] = self::$authUser["id"];
            }
        }
        
        if ($this->sanitize)
        {
            $this->data = Sanitize::clean($this->data);
        }
        
        return true;
    }

    /**
     * Adds is_deleted condition
     * 
     * @param Array $query
     */
    function beforeFind($query)
    {
        // Force all finds to only find stuff which is not deleted        
        if ($this->hasField('is_deleted'))
        {
            $query['conditions'][$this->alias . '.is_deleted'] = 0;
        }
        return $query;
    }

    /*
     * Prevents Delete and Inactive if child data available
     * @param id
     * @return Boolean
     */
    public function preventDeleteAndInactive($id)
    {
        if (isset($this->hasMany))
        {
            foreach ($this->hasMany as $key => $value)
            {
                $this->{$key}->recursive = 0;
                $childRecords = $this->{$key}->find('count', array('conditions' => array(
                        $key . "." . $value['foreignKey'] => $id)));
                if (isset($childRecords) && $childRecords > 0)
                {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }
    
    public function afterSave($created, $options = array())
    {
        parent::afterSave($created, $options);
        $this->clearCache();
    }
    
    public function afterDelete()
    {
        parent::afterDelete();
        $this->clearCache();
    }
    
    public function clearCache()
    {
        if ($this->model_cache_key)
        {
            Cache::delete("model_" . $this->model_cache_key, $this->model_cache_config);
        }
    }
    
    /**
     * cache data 
     */
    public function findCache()
    {
        $data = array();
        
        if ($this->model_cache_key)
        {
            $data = Cache::read("model_" . $this->model_cache_key, $this->model_cache_config);
        }
        
        if (!$data)
        {
            $this->recursive = -1;
            $this->contain(array());
            $data = $this->find("all");
            
            if ($this->model_cache_key)
            {
                Cache::write("model_" . $this->model_cache_key, $data, $this->model_cache_config);
            }
        }
        
        return $data;
    }
    
    public function beforeCacheClear()
    {
        return true;
    }
            
    public function afterCacheClear()
    {
        
    }

    /**
     * Gets the list data which is active
     * 
     * @param Array $fields
     * @return Array
     */
    public function getActiveList($fields = array("id", "name"), $conditions = array('is_active' => 1))
    {
        return $this->find("list", array('fields' => $fields, 'conditions' => $conditions, "recursive" => -1));
    }
    
    public function getListCache($key = "id", $value = "name")
    {
        $this->recursive = -1;
        $data = $this->findCache();
        return Hash::combine($data, "{n}.{s}.$key", "{n}.{s}.$value");
    }
    
    public function getActiveListCache($key = "id", $value = "name")
    {
        $data = $this->findCache();
        
        $records = array_filter($data, function ($record) 
        {
            $record = reset($record);
            if ($record["is_active"] == 0)
            {
                return false;
            }
               
            return true;
        });
        
        return Hash::combine($records, "{n}.{s}.$key", "{n}.{s}.$value");
    }
    
     /**
     * return data in tree structure
     * @param array $arr
     * @param int $parent_id
     * @return array
     */
    public function getTree($arr = array(), $parent_id = 0)
    {
        if (isset($arr["fields"]) && !in_array($this->parent_field, $arr["fields"]))
        {
            $arr["fields"][] = $this->parent_field;
        }        
        
        $this->recursive = -1;
        
        $records = $this->find("all", $arr);
        
        return $this->getTreeArray($records, $parent_id);
    }
    
    /**
     * convert cakephp find records to tree
     * @param array $records
     * @param int $parentId
     * @return array
     */
    public function getTreeArray(array $records, $parentId = 0) 
    {
        $data = array();

        foreach ($records as $element) 
        {
            if ($element[$this->alias][$this->parent_field] == $parentId) 
            {
                $children = $this->getTreeArray($records, $element[$this->alias]['id']);
                
                if ($children) 
                {
                    $element['children'] = $children;
                }
                
                $data[] = $element;
            }
        }

        return $data;
    }
    
    public function getTreeList($key = "id", $value = "name", $conditions = array(), $parent_id = 0, $only_parent = false, $only_child = true)
    {
        $fields = array($key, $value);
        $records = $this->getTree(array(
            "fields" => $fields,
            "conditions" => $conditions
        ), $parent_id);
        
        return $this->getTreeListArray($records, $key, $value, $only_parent, $only_child);
    }
    
    /**
     * convert cakephp find records to tree List
     * @param array $tree
     * @return array
     */
    public function getTreeListArray(array $tree, $key, $value, $only_parent = false, $only_child = true, $prefix = "", $sep = " | ") 
    {
        $list = array();

        foreach ($tree as $node) 
        {
            $id = $node[$this->alias][$key];
            $name = $prefix . $node[$this->alias][$value];
            
            if ($only_parent)
            {
                $list[$id] = $name;
            }
            else if ($only_child)
            {
                if (isset($node["children"]) && !empty($node["children"]))
                {
                    $list += $this->getTreeListArray($node["children"], $key, $value, $only_parent, $only_child, $name . $sep, $sep);
                }
                else
                {
                    $list[$id] = $name;
                }
            }
            else
            {
                $list[$id] = $name;
                
                if (isset($node["children"]) && !empty($node["children"]))
                {
                    $list += $this->getTreeListArray($node["children"], $key, $value, $only_parent, $only_child, $name . $sep, $sep);
                }
            }
        }
        
        return $list;
    }
    
    /**
     * get list of model which have parent field
     * for use that you have to set parent_field in model
     * @param array $parent_id
     * @return array
     */
    public function getTreeChildCount($parent_id = 0)
    {
        $count = $this->find("count", array(
            "conditions" => array(
                $this->parent_field => $parent_id
            ),
            "recursive" => -1
        ));
        
        return $count;
    }
    
    /**
    * Custom validation
    */
    public function validDate($field)
    {
        $val = reset($field);
        
        $date = DateUtility::getDate($val);
        
        if ($date == FALSE)
        {
            return false;
        }
        
        return true;
    }
    
    public function sp($name, $inputParams = array(), $outputParams = array(), $spKeys = array())
    {
        if ($spKeys)
        {
            $inputs = $inputParams;
            $inputParams = array();
            foreach($spKeys as $key)
            {
                if (isset($inputs[$key]))
                {
                    $inputParams[] = $inputs[$key];
                }
                else
                {
                    $inputParams[] = NULL;
                }
            }
        }
        
        $arr = array();
        foreach ($inputParams as $val)
        {
            if (is_null($val))
            {
                $val = "NULL";
            }
            else if (is_bool($val))
            {
                $val = $val ? 1 : 0;
            }
            else if (is_array($val))
            {
                if (!empty($val))
                {
                    $val = "'" . implode(",", $val) . "'";
                }
                else
                {
                    $val = "NULL";
                }
            }
            else
            {
                $val = "'" . $val . "'";
            }

            $arr[] = $val;
        }

        $params = array_merge($arr, $outputParams);

        $params = implode(",", $params);

        //Gets call result
        $q = "CALL {$name}({$params});";
        //debug($q); exit;
        $callResult = $this->query($q);

        $outputParams = implode(",", $outputParams);

        //Gets output result
        $outputResult = array();
        if (!empty($outputParams))
        {
            $outputResult = $this->query("SELECT {$outputParams};");
        }
        //Returns the combined result
        return array_merge($callResult, $outputResult);
    }
    
    public function stock_product_category_wise($inputs)
    {
        $spKeys = array(
            "_parent_category_id", "_category_id", 
            "_is_active"
        );
        
        return $this->sp("stock_product_category_wise", $inputs, array(), $spKeys);
    }
    
    public function ledger_product_category_wise($inputs)
    {
        $spKeys = array(
            "_parent_category_id", "_category_id",
            "_product_id", "_is_active",
            "_from_date", "_to_date"
        );
       
        return $this->sp("ledger_product_category_wise", $inputs, array(), $spKeys);
    }
    
    public function stock_value_category_wise($inputs)
    {
        $spKeys = array(
            "_parent_category_id", "_category_id",
            "_product_id", "_is_active",
            "_from_date", "_to_date"
        );
       
        return $this->sp("stock_value_category_wise", $inputs, array(), $spKeys);
    }
}