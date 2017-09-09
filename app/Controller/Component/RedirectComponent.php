<?php
App::uses('Component', 'Controller');
class RedirectComponent extends Object {
    
    var $controller = null;
  
  	function urlToNamed() {
        $params = $this->controller->params->query;
		//debug($params);exit;
		foreach($params as $key => $value){
			if ( $key == 'x' || $key == 'y'){
				unset($params[$key]);
			}
		}
						
		if ( !empty($params) ){
			//$params['action'] = 'index';
			$this->controller->redirect($params);
			
		} 
    }
	
    function initialize(Controller $controller)
    {
        $this->controller = $controller;
    } 
	
	function startup(Controller $controller)
    {
        $this->controller = $controller;
    }
	
	function beforeRender(Controller $controller)
    {
        $this->controller = $controller;
    }
	
	function shutdown(Controller $controller)
    {
        $this->controller = $controller;
    }
	 
	function beforeRedirect(Controller $controller)
    {
        $this->controller = $controller;
    }    
    
}
?>