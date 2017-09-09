<?php
/**
 * @created    14-07-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
class ResumeTemplate extends AppModel 
{
    public $hasMany = array(
        'UserResume' => array(
            'className' => 'UserResume',
            'foreignKey' => 'resume_template_id'
        ),
    );
}