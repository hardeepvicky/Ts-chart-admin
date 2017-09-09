<?php
/**
 * @created    14-07-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
class UserResumeReference extends AppModel 
{
    public $sanitize = false;
    
    public $belongsTo = array(
        'UserResume' => array(
            'className' => 'UserResume',
            'foreignKey' => 'user_resume_id'
        ),
    );
}