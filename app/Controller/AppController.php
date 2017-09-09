<?php
App::uses('BaseController', 'Controller');

class AppController extends BaseController
{
    public $authUser, $accountGroups, $voucherTypes;
    //Includes global components array
    public $components = array("Acl", 'Auth', 'Session', 'Redirect', 'DebugKit.Toolbar');
    
    //Includes global helper array
    var $helpers = array('Html', 'Form', 
        'AclLink' => array(
		  'userModel' => 'Group', //overide default userModel "User"
		  'primaryKey' => 'id' //overide default primaryKey "id"
		)
    );
    
    //Changes the view extension name from .ctp to .php
    public $ext = '.php';
    
    //Sets default pagination for all controllers
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'id' => 'DESC'
        )
    );
    
    public function beforeFilter()
    {
        $this->Auth->authorize = 'Actions';
        $this->Auth->actionPath = 'Controllers/';
        $this->Auth->authError = 'You are not allowed to visit that url.';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', "admin" => false);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', "admin" => false);
        $this->Auth->loginRedirect = array('controller' => 'companies', 'action' => 'index', "admin" => true);
        $this->Auth->unauthorizedRedirect = array("controller" => "errors", "action" => "methodNotAllowed");

        $model = $this->modelClass;
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        $this->authUser = AppModel::$authUser = $auth_user = $this->Auth->user();
        $this->set(compact('auth_user', 'model', 'controller', 'action'));
        
        if ($this->request->is("ajax"))
        {
            $this->layout = "ajax";
        }
        
        $this->Auth->allow();
        
        if ($this->authUser)
        {
            if ($this->authUser["group_id"] == GROUP_ADMIN)
            {
                $menus = Menu::get($this->Acl, $this->authUser['group_id']);
                
                $home_link = Menu::getDefaultLink($menus);

                $this->set(compact("home_link", "menus"));
            }
            else
            {
                $home_link = array("controller" =>  "UserResumes", "action" => "index", "admin" => true);
                $this->set(compact("home_link"));
            }
        }
    }

    /**
     *  Common add record action
     */
    protected function add($redirect = array())
    {
        //Checks if request is post
        if ($this->request->is('post'))
        {
            $this->{$this->modelClass}->create();
            //Saves the record
            if ($this->{$this->modelClass}->save($this->request->data))
            {
                if ($redirect)
                {
                    $this->Session->setFlash($this->modelClass . ' has been saved.', 'flash_success');
                    $this->redirect($redirect);
                }
                else
                {
                    return true;
                }
            }
            else //Save error
            {
                $this->Session->setFlash('Unable to add new ' . $this->modelClass . '.', 'flash_failure');
            }
        }
        return false;
    }

    /**
     *  Common edit record action
     */
    protected function edit($id, $redirect = array())
    {
        //Checks if no ID is passed to the action
        if (!$id)
        {
            throw new NotFoundException(__('Invalid ' . $this->modelClass));
        }
        
        //Gets record from database
        $record = $this->{$this->modelClass}->findById($id);
        
        //Checks if no record exists in the database
        if (!$record)
        {
            throw new NotFoundException(__('Invalid ' . $this->modelClass));
        }
        
        //Checks if request is POST or PUT
        if ($this->request->is('post') || $this->request->is('put'))
        {
            //Points the model to specific record
            $this->{$this->modelClass}->id = $id;
            
            //Save the record
            if ($this->{$this->modelClass}->save($this->request->data))
            {
                if($redirect)
                {
                    $this->Session->setFlash($this->modelClass . ' has been updated.', 'flash_success');
                    $this->redirect($redirect);
                }
                else
                {
                    return true;
                }
            }
            else  //Save error
            {
                $this->Session->setFlash('Unable to update new ' . $this->modelClass . '.', 'flash_failure');
            }
        }
        
        //Handles GET request
        if (!$this->request->data)
        {
            $this->request->data = $record;
        }
        
        return false;
    }

    /*
     * Common action for delete record
     */
    protected function delete($id, $redirect = array())
    {
        //Checks if no ID is passed to the action
        if (!$id)
        {
            throw new NotFoundException(__('Invalid ' . $this->modelClass));
        }
        
        $record = $this->{$this->modelClass}->find("first", array(
            "fields" => "id",
            "conditions" => array("id" => $id),
            "recursive" => -1,
            "contain" => array()
        ));
        
        //Checks if no ID is passed to the action
        if (!$record)
        {
            throw new NotFoundException(__('Invalid ' . $this->modelClass));
        }
        
        //Points model to specific record
        $this->{$this->modelClass}->id = $id;

        //Checks if record can be deleted or it has not associated data
        if ($this->{$this->modelClass}->preventDeleteAndInactive($id))
        {
            $this->{$this->modelClass}->id = $id;
            
            if ($this->{$this->modelClass}->hasField('is_deleted'))
            {
                $this->{$this->modelClass}->saveField('is_deleted', 1);
            }
            else
            {
                $this->{$this->modelClass}->delete($id);
            }
            
            if($redirect)
            {
                $this->Session->setFlash('The record deleted Successfully', 'flash_success');
                $this->redirect($redirect);
            }
            else
            {
                return true;
            }
        }
        else //Error otherwise
        {
            $this->Session->setFlash('The record cannot be deleted, as it has associated data', 'flash_failure');
            
            if($redirect)
            {
                $this->redirect($redirect);
            }
            else
            {
                return false;
            }
        }

        return false;
    }

    /**
     * Toggles the status of is_active field
     * 
     * @param Integer $id
     * @param Integer $status
     */
    public function admin_toggleStatus($id)
    {
        //Checks if no ID is passed to the action
        if (!$id)
        {
            throw new NotFoundException(__('Invalid ' . $this->modelClass));
        }
        
        //Points model to specific record
        $this->{$this->modelClass}->id = $id;
        $status = $this->{$this->modelClass}->field('is_active');
        $this->{$this->modelClass}->saveField('is_active', !$status);

        $this->Session->setFlash('Status change Successfully.', 'flash_success');
        $this->redirect(array("action" => "admin_index"));
    }
    
    /*
     * Web Api
     */
    public function json_get($id = 0)
    {
        $conditions = array();
        
        if ($id)
        {
            $conditions["id"] = $id;
        }
        
        $data = $this->{$this->modelClass}->find("all",array(
            "conditions" => $conditions,
            "recursive" => -1
        ));
        
        if ($data)
        {
            $data = Set::classicExtract($data, "{n}." . $this->modelClass);
        }
        
        echo json_encode($data); exit;
    }
    
    public function json_edit($id)
    {
        $response = array(
            "status" => 0
        );
        
        try
        {
            if (!$id)
            {
                throw new Exception("Invalid Id");
            }
            
            $count = $this->{$this->modelClass}->find("count", array("conditions" => array("id" => $id)));
            
            if ($count == 0)
            {
                throw new Exception("Invalid Id");
            }
            
            $data[$this->modelClass] = $this->request->data;
            
            $this->{$this->modelClass}->id = $id;
            if ($this->{$this->modelClass}->save($data))
            {
                $response["status"] = 1;
            }
            else
            {
                $response["errors"] = $this->{$this->modelClass}->validationErrors;
            }
        }
        catch(Exception $ex)
        {
            $response['msg'] = $ex->getMessage();
        }
        
        echo json_encode($response); exit;
    }

    public function json_delete($id)
    {
        $response = array(
            "status" => 0
        );
        
        try
        {
            if (!$id)
            {
                throw new Exception("Invalid Id");
            }
            
            if ($this->{$this->modelClass}->delete($id))
            {
                $response["status"] = 1;
            }
        }
        catch(Exception $ex)
        {
            $response['msg'] = $ex->getMessage();
        }
        
        echo json_encode($response); exit;
    }
    
    protected function getSearchConditions($inputs)
    {
        $conditions = array();
        $searchArray = array();

        //Looping the input data
        foreach ($inputs as $i => $input)
        {
            //Setting value in local variables
            $model = $input['model'];
            $fields = $input['field'];
            $type = strtolower($input['type']);
            $view_field = $input['view_field'];
            
            if (!is_array($fields))
            {
                $fields = array($fields);
            }

            //Checking data type and constructing conditions array
            if (isset($this->params['named'][$view_field]) && strlen(trim($this->params['named'][$view_field])) > 0)
            {
                foreach($fields as $field)
                {
                    if ($type == 'string')
                    {
                        $conditions[$i]["OR"][$model . "." . $field . " LIKE"] = "%" . $this->params['named'][$view_field] . "%";
                    }
                    else if ($type == 'integer' || $type == 'int')
                    {
                        $conditions[$i]["OR"][$model . "." . $field] = $this->params['named'][$view_field];
                    }
                    else if ($type == 'from_date')
                    {
                        $conditions[$i]["OR"]["date($model.$field) >="] = DateUtility::getDate($this->params['named'][$view_field], DateUtility::DATE_FORMAT);
                    }
                    else if ($type == 'to_date')
                    {
                        $conditions[$i]["OR"]["date($model.$field) <="] = DateUtility::getDate($this->params['named'][$view_field], DateUtility::DATE_FORMAT);
                    }
                    else if ($type == 'from_datetime')
                    {
                        $conditions[$i]["OR"]["$model.$field >="] = DateUtility::getDate($this->params['named'][$view_field]);
                    }
                    else if ($type == 'to_datetime')
                    {
                        $conditions[$i]["OR"]["$model.$field <="] = DateUtility::getDate($this->params['named'][$view_field]);
                    }
                }
                
                $searchArray[$model . $view_field] = $this->params['named'][$view_field];
            }
            else
            {
                $searchArray[$model . $view_field] = "";
            }
        }

        $this->set($searchArray);
        return $conditions;
    }
    
    protected function _queryLog()
    {
        $dbo = $this->{$this->modelClass}->getDatasource();
        return $dbo->getLog();
    }
    
    protected function _queryLastLog()
    {
        $logs = $this->_queryLog();
        $lastLog = end($logs['log']);
        return $lastLog['query'];
    }
}
