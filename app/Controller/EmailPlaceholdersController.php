<?php
class EmailPlaceholdersController extends AppController
{
    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => "name", 'type' => 'string', 'view_field' => 'name'),
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
        parent::add(array("action" => "admin_index"));
        
        $this->render('admin_form');
    }

    /**
     * add method
     * @return void
     */
    public function admin_edit($id)
    {
        parent::edit($id, array("action" => "admin_index"));
        
        $this->render('admin_form');
    }
}