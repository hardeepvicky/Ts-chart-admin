<?php
class ChartMenusController extends AppController
{
    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('parent_id'), 'type' => 'int', 'view_field' => 'parent_id'),
            array('model' => $this->modelClass, 'field' => array('name'), 'type' => 'string', 'view_field' => 'name')
        ));
        
        $this->paginate['recursive'] = -1;
        $this->paginate['contain'] = array(
            'ChartReport' => array()
        );
        
        if (empty($conditions))
        {
            $conditions['parent_id'] = 0;
        }
        
        $records = $this->paginate($this->modelClass, $conditions);
        
        foreach ($records as $k => $record)
        {
            $records[$k][$this->modelClass]['children'] = $this->{$this->modelClass}->getTreeChildCount($record[$this->modelClass]['id']);
        }
        
        $this->_setList();
        
        //setting variables
        $this->set(compact('records'));
    }
    
    /**
     * add method
     * @return void
     */
    public function admin_add()
    {
        parent::add(array("action" => "admin_index"));
        
        $this->_setList();

        $this->render('admin_form');
    }

    /**
     * add method
     * @return void
     */
    public function admin_edit($id)
    {
        parent::edit($id, array("action" => "admin_index"));
        
        $this->_setList();

        $this->render('admin_form');
    }
    
    private function _setList()
    {
        $this->{$this->modelClass}->recursive = -1;
        
        $parent_menu_list = $this->{$this->modelClass}->getTreeList("id", "name", ["type" => MenuTypes::MENU], 0, false, false);
        
        $parent_menu_list = array("0" => "-") + $parent_menu_list;
        
        $this->set(compact('parent_menu_list'));
    }
}