<?php
/**
 * Errors Controller
 * 
 * 
 * @created    17/03/2015
 * @copyright  Copyright (C) 2015
 * @license    Proprietary
 */

class ErrorsController extends AppController 
{
    public $name = 'Errors';
    
    public function beforeFilter() {   
        parent::beforeFilter();        
        $this->Auth->allow();
    }

    public function error404() {
		
        $this->layout = 'error';
        $back = "/";
        $this->set(compact('back'));
    }
        
    public function methodNotAllowed()
    {
        $this->layout = 'error';
        $this->render("method_not_allowed");
    }
        
    public function error($msg)
    {
        $this->set(compact("msg"));
    }
    
    public function admin_error404() {
		
        $this->error404();
    }
        
    public function admin_methodNotAllowed()
    {
        $this->methodNotAllowed();
    }
        
    public function admin_error($msg)
    {
        $this->set(compact("msg"));
    }
}