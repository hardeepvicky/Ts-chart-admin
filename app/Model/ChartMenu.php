<?php
class ChartMenu extends AppModel
{
    public $parent_field = "parent_id";
    public $model_cache_key = null;
    
    public $actsAs = array(
        'ContainableExtend',
    );
    
    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        ),
    );
    
    public $hasMany = array(
        'ChartReport' => array(
            'className' => 'ChartReport',
            'foreignKey' => 'chart_menu_id'
        ),
    );
    
    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Name is required"),
        ),
        'type' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Type is required"),
        ),
        'company_id' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Company id is required"),
        ),
    );
    
    public function beforeSave($options = array()) 
    {
        if (!parent::beforeSave($options))
        {
            return false;
        }
        
        if (self::$authUser && !isset($this->data[$this->alias]['company_id']))
        {
            $this->data[$this->alias]['company_id'] = self::$authUser["company_id"];
        }
        
        return TRUE;
    }
    
    public function beforeFind($query) 
    {
        $query = parent::beforeFind($query);
        
        if (self::$authUser)
        {
            $query['conditions'][$this->alias . '.company_id'] = self::$authUser["company_id"];
        }
        
        return $query;
    }
}