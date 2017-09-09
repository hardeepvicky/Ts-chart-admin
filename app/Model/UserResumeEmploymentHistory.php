<?php
/**
 * @created    14-07-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
class UserResumeEmploymentHistory extends AppModel 
{
    public $sanitize = false;
    
    public $actsAs = array(
        'ContainableExtend',
        'DateFormat' => array(
            "from_date" => "M-Y",
            "to_date" => "M-Y",
        )
    );
    
    public $belongsTo = array(
        'UserResume' => array(
            'className' => 'UserResume',
            'foreignKey' => 'user_resume_id'
        ),
    );
}