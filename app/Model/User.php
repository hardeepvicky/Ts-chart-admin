<?php
class User extends AppModel
{
    public $model_cache_key = null;
    
    public $actsAs = array(
        'Acl' => array('type' => 'requester', 'enabled' => false),
        'ContainableExtend',
        'DateFormat' => array(
            "employment_start_date" => DateUtility::DATE_OUT_FORMAT,
        )
    );
    
    var $virtualFields = array(
        'name' => 'CONCAT(User.firstname, " ", User.lastname)'
    );
    
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id'
        ),
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        ),
    );
    
    public $hasMany = array(    );
    
    public $validate = array(
        'username' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Username is required"),
            'isUnique' => array('rule' => 'isUnique', 'message' => "Username already exist"),
        ),
        'group_id' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Group is required"),
        ),
        'password' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Password is required"),
        ),
        'firstname' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Firstname is required"),
        ),  
        'email' => array(
            'notEmpty' => array('rule' => array('notEmpty'), 'message' => "Email is required"),
            'email' => array('rule' => array('email'), 'message' => "Invalid Email"),
        ),
    );

    public function beforeSave($options = array())
    {
        parent::beforeSave($options);

        if (isset($this->data["User"]["password"]) && !empty($this->data["User"]["password"]))
        {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        } 
        else if (empty($this->data["User"]["password"]))
        {
            unset($this->data["User"]["password"]);
        }
        
        if ( (!isset($this->data["User"]["company_id"]) || empty($this->data["User"]["company_id"])) && self::$authUser)
        {
            $this->data["User"]["company_id"] = self::$authUser['company_id'];
        }
        
        return true;
    }
    
    public function bindNode($user)
    {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function parentNode()
    {
        if (!$this->id && empty($this->data))
        {
            return null;
        }
        if (isset($this->data['User']['group_id']))
        {
            $groupId = $this->data['User']['group_id'];
        }
        else
        {
            $groupId = $this->field('group_id');
        }
        if (!$groupId)
        {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }
}
