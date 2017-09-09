<?php
class Setting extends AppModel
{
    public $sanitize = false;
    
    const GLUE = "_";
    
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
    
    public function get($user_id)
    {
        $this->recursive = -1;
        $records = $this->find("all", array(
            "conditions" => array(
                "user_id" => $user_id
            )
        ));
        
        $data = array();
        
        foreach($records as $record)
        {
            $list = explode(self::GLUE, $record[$this->alias]['key']);
            
            $this->_listToArr($list, $data, $record[$this->alias]['value']);
        }
        
        return $data;
    }
    
    private function _listToArr($list, &$main_data, $value, $i = 0)
    {
        $k = $list[$i];
        
        if ($i < count($list) - 1)
        {
            if (!isset($main_data[$k]))
            {
                $main_data[$k] = array();
            }
            
            $this->_listToArr($list, $main_data[$k], $value, $i + 1);
        }
        else
        {
            $main_data[$k] = $value;
        }
    }
}
