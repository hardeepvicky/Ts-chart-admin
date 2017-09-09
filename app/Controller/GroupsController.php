<?php
class GroupsController extends AppController
{
    public function index()
    {
        $records = $this->{$this->modelClass}->find("all", array("Order" => "display_order ASC"));

        $title = "Group Summary";
        
        $this->set(compact("title"));
        
        //setting variables
        $this->set(compact('records'));
    }

    public function add($redirect = array("action" => "index"))
    {
        parent::add($redirect);
        
        $title = "Group Add";
        
        $this->set(compact("title"));

        //Renders the common form for add and edit actions
        $this->render('form');
    }

    public function edit($id, $redirect = array("action" => "index"))
    {
        //Calls the parent add functions
        parent::edit($id, $redirect);

        $title = "Group Edit";
        
        $this->set(compact("title"));
        
        //Renders the common form for add and edit actions
        $this->render('form');
    }

}