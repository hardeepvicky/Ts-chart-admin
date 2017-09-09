<?php
/**
 * @created    14-07-2017
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
class UserResume extends AppModel 
{
    public $sanitize = false;
    
    public $belongsTo = array(
        'ResumeTemplate' => array(
            'className' => 'ResumeTemplate',
            'foreignKey' => 'resume_template_id'
        ),
    );
    
    public $hasMany = array(
        'UserResumeEducation' => array(
            'className' => 'UserResumeEducation',
            'foreignKey' => 'user_resume_id'
        ),
        'UserResumeEmploymentHistory' => array(
            'className' => 'UserResumeEmploymentHistory',
            'foreignKey' => 'user_resume_id'
        ),
        'UserResumeOtherDetail' => array(
            'className' => 'UserResumeOtherDetail',
            'foreignKey' => 'user_resume_id'
        ),
        'UserResumeReference' => array(
            'className' => 'UserResumeReference',
            'foreignKey' => 'user_resume_id'
        ),
    );
    
    public $validate = array(
        'title' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Title is required"),
        ),
        'firstname' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Firstname is required"),
        ),
        'lastname' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Lastname is required"),
        ),
        'email' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Email is required"),
            'email' => array('rule' => array('email'), 'message' => "Invalid Email"),
        ),
    );
}