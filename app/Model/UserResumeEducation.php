<?php
/**
 * @created    14-07-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
class UserResumeEducation extends AppModel 
{
    public $sanitize = false;
    
    public $actsAs = array(
        'ContainableExtend',
        'DateFormat' => array(
            "date" => "M-Y",
        )
    );
    
    public $belongsTo = array(
        'UserResume' => array(
            'className' => 'UserResume',
            'foreignKey' => 'user_resume_id'
        ),
    );
}