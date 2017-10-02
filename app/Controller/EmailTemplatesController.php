<?php
class EmailTemplatesController extends AppController
{
    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => "code", 'type' => 'string', 'view_field' => 'code'),
        ));
        
        $this->paginate["limit"] = 20;
        $records = $this->paginate($this->modelClass, $conditions);
        
        //setting variables
        $this->set(compact('records')); 
    }

    /**
     * add method
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->_beforeSave();
        }
        
        parent::add(array("action" => "admin_index"));
     
        $placeholder_list = $this->_getPlaceHolderList();
        $this->set(compact("placeholder_list"));
        $this->render('admin_form');
    }

    /**
     * add method
     * @return void
     */
    public function admin_edit($id)
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->_beforeSave();
        }
        
        parent::edit($id, array("action" => "admin_index"));
        
        $placeholder_list = $this->_getPlaceHolderList();
        $this->set(compact("placeholder_list"));
        $this->render('admin_form');
    }
    
    public function admin_delete($id)
    {
        $this->delete($id, array("action" => "admin_index"));
    }
    
    private function _getPlaceHolderList()
    {
        $this->load_model("EmailPlaceholder");
        $placeholder_list = $this->EmailPlaceholder->find("list", array("order" => "name ASC"));
        return $placeholder_list;        
    }
    
    private function _beforeSave()
    {
        $subject = $this->request->data[$this->modelClass]['subject'];
        $body = $this->request->data[$this->modelClass]['body'];
        
        $id_list = array();
        $placeholder_list = $this->_getPlaceHolderList();
        
        foreach($placeholder_list as $id => $name)
        {
            if (strpos($subject, "{" . $name . "}") !== false)
            {
                $id_list[] = $id;
            }
            
            if (strpos($body, "{" . $name . "}") !== false)
            {
                $id_list[] = $id;
            }
        }
        
        $this->request->data[$this->modelClass]['placeholder_ids'] = implode(",", $id_list);
    }
}