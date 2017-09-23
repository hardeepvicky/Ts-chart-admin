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