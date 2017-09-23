<?php
class Company extends AppModel
{
    public $model_cache_config = "day", $model_cache_key = 'Company';
    
    public $actsAs = array(
        'ContainableExtend',
    );
    
    public $hasMany = array(    
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'company_id'
        )
    );
    
    public $validate = array(
        'code' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Code is required"),
            'isUnique' => array('rule' => 'isUnique', 'message' => "Code already exist"),
        ),
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Name is required"),
        ),
    );
}
