<?php
class UserPayment extends AppModel
{
    public $sanitize = false;
    
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}
