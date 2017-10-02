<?php
class EmailPlaceholder extends AppModel
{
    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Name is required"),
            'isUnique' => array('rule' => array('isUnique'), 'message' => "Name alredy exist"),
        ),
    );
}
