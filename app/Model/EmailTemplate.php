<?php
class EmailTemplate extends AppModel
{
    public $sanitize = false;
    
    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Name is required"),
        ),
        'code' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Code is required"),
            'isUnique' => array('rule' => array('isUnique'), 'message' => "Code alredy exist"),
        ),
        'subject' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Subject is required"),
        ),
        'body' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "body is required"),
        ),
    );
}
