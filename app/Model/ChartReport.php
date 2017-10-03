<?php
class ChartReport extends AppModel
{
    public $model_cache_key = null;
    
    public $actsAs = array(
        'ContainableExtend',
    );
    
    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        ),
        'ChartMenu' => array(
            'className' => 'ChartMenu',
            'foreignKey' => 'chart_menu_id'
        ),
    );
    
    public $hasMany = array(    );
    
    public $validate = array(
        'company_id' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Company id is required"),
        ),
        'chart_menu_id' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Menu id is required"),
        ),
        'type' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Type is required"),
        ),
        'chart_type' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Chart Type is required"),
        ),
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Name is required"),
        ),
        'url' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "url is required"),
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
        
        require_once APP . 'Vendor/tech-dev-tools/FileUtility.php';
        $fileUtility = new FileUtility(1024 * 1024 * 2, array("csv"));
        
        if (isset($this->data['ChartReport']['csv_file']))
        {
            if ( is_array($this->data['ChartReport']['csv_file']) )
            {
                if ($this->data['ChartReport']['csv_file']['name'])
                {
                    $this->data['ChartReport']['csv_file']['name'] = str_replace(" ", "-", $this->data['ChartReport']['csv_file']['name']);
                    if ($fileUtility->uploadFile($this->data['ChartReport']['csv_file'], PATH_CHART_CSV_FILES))
                    {
                        $this->data['ChartReport']['csv_file'] = $fileUtility->file;

                        $result = $this->_validateCSV(PATH_CHART_CSV_FILES . $fileUtility->file, $this->data['ChartReport']['chart_type']);

                        if ($result !== TRUE)
                        {
                            foreach ($result as $error)
                            {
                                $this->invalidate('csv_file', $error);
                            }

                            return false;
                        }
                    }
                    else
                    {
                        $this->invalidate('csv_file', $fileUtility->errors[0]);
                        return false;
                    }
                }
                else
                {
                    unset($this->data['ChartReport']['csv_file']);
                }
            }
            else
            {
                if (empty($this->data['ChartReport']['csv_file']))
                {
                    unset($this->data['ChartReport']['csv_file']);
                }
                
                $csv_file = $this->field("csv_file");
                
                if ($csv_file && isset($this->data['ChartReport']['chart_type']))
                {
                    $result = $this->_validateCSV(PATH_CHART_CSV_FILES . $csv_file, $this->data['ChartReport']['chart_type']);

                    if ($result !== TRUE)
                    {
                        foreach ($result as $error)
                        {
                            $this->invalidate('csv_file', $error);
                        }
                        
                        return false;
                    }
                }
            }
        }
        
        if (isset($this->data['options']) && is_array($this->data['options']))
        {
            $this->data['ChartReport']['options'] = serialize($this->data['options']);
            unset($this->data['options']);
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
    
    public function afterFind($results, $primary = false)
    {
        $records = parent::afterFind($results, $primary);
        
        foreach($records as $k => $record)
        {
            if (isset($record['ChartReport']['type']))
            {
                if ($record['ChartReport']['type'] == ReportTypes::INTERNAL)
                {
                    $records[$k]['ChartReport']['url'] = SITE_URL . "ChartReports/draw_chart/" . $record['ChartReport']['id'];
                }
            }
        }
        
        return $records; 
    }
    
    public function _validateCSV($csv_file, $chart_type)
    {
        $data = CsvUtility::fetchCSV($csv_file);
        
        switch ($chart_type)
        {
            case ChartTypes::PIE:
                if (count($data[1]) != 2)
                {
                    return ["CSV should be 2 columns, please refer to sample csv"];
                }
                
                break;
                
            
            case ChartTypes::AREA:
            case ChartTypes::BAR:
            case ChartTypes::LINE:
            case ChartTypes::COLUMN:
                
                if (count($data[1]) < 2)
                {
                    return ["In CSV, Columns count should be equal of more than 2, please refer to sample csv"];
                }
                
                break;
        }
        
        $errors = array();
        foreach ($data as $k => $row)
        {
            $cols = array_keys($row);
            for($i = 1; $i < count($row); $i++)
            {
                if (!is_numeric($row[$cols[$i]]))
                {
                    $errors[] = "Row $k, Column " . ($i + 1) . " : should be numeric";
                }
            }
        }
        
        if ( !empty($errors))
        {
            return $errors;
        }
        
        return TRUE;
    }
}