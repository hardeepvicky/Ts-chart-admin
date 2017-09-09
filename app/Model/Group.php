<?php
class Group extends AppModel
{
    public $actsAs = array('Acl' => array('type' => 'requester'));
    
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'group_id'
        )
    );
    
    public function parentNode()
    {
        return null;
    }

    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => 'Group name is required.',
            ),
        ),
    );
}
