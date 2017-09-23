<?php
class ChartReportsController extends AppController
{
    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('chart_menu_id'), 'type' => 'int', 'view_field' => 'chart_menu_id'),
            array('model' => $this->modelClass, 'field' => array('name'), 'type' => 'string', 'view_field' => 'name')
        ));
        
        $this->paginate['recursive'] = -1;
        
        $records = $this->paginate($this->modelClass, $conditions);
        
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
        $menu_link_list = $this->{$this->modelClass}->ChartMenu->getTreeList();
        
        $this->set(compact('menu_link_list'));
    }
}