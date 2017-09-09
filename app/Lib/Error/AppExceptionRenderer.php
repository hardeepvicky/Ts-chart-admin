<?php
/**
 * Exception Handler
 * 
 * 
 * @created    17/03/2015
 * @copyright  Copyright (C) 2015
 * @license    Proprietary
 */

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer 
{
	public function notFound($error)
	{
	    //SessionComponent::write('error', $error->getMessage());
	    $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
	}
    
    private function _error($msg)
    {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error', $msg));
    }
	
	public function badRequest($error) 
	{
	    $this->notFound($error);
	}

	public function forbidden($error) 
	{
	    $this->notFound($error);
	}

	public function methodNotAllowed($error) 
	{
	    $this->notFound($error);
	}

	public function internalError($error) 
	{
	   $this->_error($error->getMessage());
	}

	public function fatalError($error) 
	{     
	   $this->_error($error->getMessage());
	}

	public function databaseError($error) 
	{
	    $this->_error($error->getMessage());
	}
	public function notImplemented($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingController($error) 
	{
	    $this->notFound($error->getMessage());
	}

	public function missingAction($error) 
	{
	    $this->notFound($error->getMessage());
	}

	public function missingView($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingLayout($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingHelper($error) 
	{
	    $this->_error($error->getMessage());
	}
	public function missingBehavior($error) 
	{
	   $this->notFound($error);
	}

	public function missingComponent($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingTask($error) 
	{
	    $this->notFound($error);
	}

	public function missingShell($error) 
	{
	    $this->notFound($error);
	}

	public function missingShellMethod($error) 
	{
	    $this->notFound($error);
	}

	public function missingDatabase($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingConnection($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingTable($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function missingColumn($error) 
	{
	    $this->_error($error->getMessage());
	}

	public function privateAction($error) 
	{
	    $this->notFound($error);
	}
}