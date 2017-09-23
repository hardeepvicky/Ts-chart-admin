<?php
class UsersController extends AppController
{
    public function beforeFilter()
    {
        if (!in_array($this->params['action'], array('logout', "acl")))
        {
            parent::beforeFilter();
        }
        
        $this->Auth->allow('login', 'activate', 'signup', 'signup_send_email', 'account_created', 'logout', "acl", "forgot_password"); 
        // We can remove this line after we're finished
    }

    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('username', "firstname", "lastname", "email"), 'type' => 'string', 'view_field' => 'username')
        ));
        
        $conditions["group_id"] = GROUP_COMPANY_ADMIN;
        
        $this->paginate['recursive'] = 0;
        $records = $this->paginate($this->modelClass, $conditions);
        
        $company_list = $this->User->Company->getListCache();
        
        //setting variables
        $this->set(compact('records', 'company_list'));
    }
    
    public function admin_company_sub_manager_summary()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('username', "firstname", "lastname", "email"), 'type' => 'string', 'view_field' => 'username')
        ));
        
        $conditions["group_id"] = GROUP_COMPANY_SUB_ADMIN;
        
        $records = $this->paginate($this->modelClass, $conditions);
        
        //setting variables
        $title_for_layout = "Sub Manager";
        $this->set(compact('records', 'title_for_layout'));   
        $this->render('admin_company_user_summary');
    }
    
    public function admin_company_members_summary()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('username', "firstname", "lastname", "email"), 'type' => 'string', 'view_field' => 'username')
        ));
        
        $conditions["group_id"] = GROUP_COMPANY_MEMBER;
        
        $records = $this->paginate($this->modelClass, $conditions);
        
        //setting variables
        $title_for_layout = 'Member';
        $this->set(compact('records', 'title_for_layout'));   
        $this->render('admin_company_user_summary');
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
    
    public function admin_add_company_sub_manager()
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->request->data[$this->modelClass]['group_id'] = GROUP_COMPANY_SUB_ADMIN;
        }
        
        parent::add(array("action" => "admin_company_sub_manager_summary"));
        
        $title_for_layout = "Sub Manager";
        $action_title = "Add";
        $this->set(compact('title_for_layout', 'action_title'));
        $this->render('admin_form_company_user');
    }
    
    public function admin_add_company_member()
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->request->data[$this->modelClass]['group_id'] = GROUP_COMPANY_MEMBER;
        }
        
        parent::add(array("action" => "admin_company_members_summary"));
        
        $title_for_layout = "Member";
        $action_title = "Add";
        $this->set(compact('title_for_layout', 'action_title'));
        $this->render('admin_form_company_user');
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
    
    public function admin_edit_company_sub_manager($id)
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->request->data[$this->modelClass]['group_id'] = GROUP_COMPANY_SUB_ADMIN;
        }
        
        parent::edit($id, array("action" => "admin_company_sub_manager_summary"));
        
        $title_for_layout = "Sub Manager";
        $action_title = "Edit";
        $this->set(compact('title_for_layout', 'action_title'));
        $this->render('admin_form_company_user');
    }
    
    public function admin_edit_company_member($id)
    {
        if ($this->request->is(array('post', 'put')))
        {
            $this->request->data[$this->modelClass]['group_id'] = GROUP_COMPANY_MEMBER;
        }
        
        parent::edit($id, array("action" => "admin_company_members_summary"));
        
        $title_for_layout = "Member";
        $action_title = "Edit";
        $this->set(compact('title_for_layout', 'action_title'));
        $this->render('admin_form_company_user');
    }
    
    public function admin_toggleStatus($id)
    {
        $this->toggleStatus($id);
    }
    
    public function login()
    {
        $this->layout = 'login';

        if ($this->request->is('post'))
        {
            if ($this->Auth->login())
            {
                $this->authUser = $this->Auth->user();
                if(!$this->authUser["is_active"])
                {
                    $this->authUser = array();
                    $this->Auth->logout();
                    $this->Session->setFlash('User is deactivated.', 'flash_failure');
                }
            }
            else
            {
                $this->Session->setFlash('Username or password was incorrect.', 'flash_failure');
            }
        }
        
        if ($this->authUser)
        {
            $menus = Menu::get($this->Acl, $this->authUser['group_id']);

            $home_link = Menu::getHomePageLink($menus);
            
            $this->redirect($home_link);
        }
    }
    
    public function signup()
    {
        $this->layout = 'login';
        
        if ($this->request->is("post", "put"))
        {
            $this->User->set($this->request->data);
            $result = $this->User->validates();
            if ($this->request->data['User']['password'] != $this->request->data['User']['confirm_password'])
            {
                $this->User->validationErrors['confirm_password'] = "Password and Confirm Password didn't match";
                $result = false;
            }
            
            if ($result)
            {
                $db = $this->{$this->modelClass}->getDataSource();
                $db->begin();
                
                try
                {
                    $this->{$this->modelClass}->Company->create();
                    if (!$this->{$this->modelClass}->Company->save(["Company" => $this->request->data["Company"]]))
                    {
                        throw new Exception("Failed to save Company");
                    }
                    
                    $this->request->data["User"]["company_id"] = $this->{$this->modelClass}->Company->id;
                    $this->request->data["User"]["group_id"] = GROUP_COMPANY_ADMIN;
                            
                    $this->{$this->modelClass}->create();
                    if (!$this->{$this->modelClass}->save(["User" => $this->request->data["User"]]))
                    {
                        throw new Exception("Failed to save user");
                    }
                    
                    $this->request->data['User']["id"] = $this->{$this->modelClass}->id;

                    $activation_token = Util::getRandomString(30) . $this->request->data['User']["id"];

                    $this->{$this->modelClass}->id = $this->request->data['User']["id"];
                    $this->{$this->modelClass}->saveField("activation_token", $activation_token);

                    //$this->_signup_send_email($this->request->data['User']["id"]);

                    $this->Session->setFlash('Account has been created. Email has been sent. To Acitivate the account verfiy your email.', 'flash_success');

                    $db->commit();
                    $this->redirect(array("action" => "account_created", $this->request->data['User']["id"]));
                }
                catch(Exception $ex)
                {
                    $db->rollBack();
                    $this->Session->setFlash('Account fail to create.', 'flash_failure');
                }
            }
            else
            {
                $this->Session->setFlash('Fail to create Account due to validation errors', 'flash_failure');
            }
        }
    }
    
    public function signup_send_email($id)
    {
        $this->_signup_send_email($id);

        $this->Session->setFlash('Email has been sent', 'flash_success');
        
        $this->redirect($this->referer());
    }
    
    private function _signup_send_email($id)
    {
        $this->User->recursive = -1;
        $user = $this->User->findById($id);
        
        if (!$user)
        {
            throw new NotFoundException(__('Invalid Request'));
        }
        
        $user = $user['User'];
        
        $view = new View($this); 
        $view->set(compact("user")); 
        $view->layout = null;
        $html = $view->render("/Emails/html/account_activate"); 
        
        $this->load_model("Setting");
        $settings = $this->Setting->get(NULL);
                
        $this->email(EmailTypes::ACCOUNT_ACTIVATE, $user['email'], $settings['admin']['fromEmail'], EmailTypes::$list[EmailTypes::ACCOUNT_ACTIVATE], $html);
    }
    
    public function account_created($id)
    {
        $this->layout = 'login';
        $this->set(compact('id'));
    }

    public function activate($token)
    {
        $this->layout = "login";
        
        $user = $this->User->find("first", array(
            "conditions" => array(
                "activation_token" => $token
            ),
            'recursive' => -1
        ));
        
        if (!$user)
        {
            die("Invalid Token");
        }
        
        if ($user)
        {
            $this->User->id = $user['User']['id'];
            $this->User->saveField("is_active", 1);
            
            $this->Session->setFlash('Account has been activated. Please login', 'flash_success');
        }
        
        $this->redirect(array("action" => "login"));
    }
    
    public function logout()
    {
        if ($this->authUser['group_id'] == GROUP_ADMIN)
        {
            $this->redirect($this->Auth->logout());
        }
        else
        {
            $this->Auth->logout();
            $this->redirect("/");
        }
    }

    public function admin_change_password()
    {
        $this->layout = "login";
        
        if (!empty($this->request->data))
        {
            $cansave = true;
            $this->User->recursive = -1;
            $user = $this->User->findById($this->authUser["id"], array("fields" => "password"));

            if (!$user)
            {
                $this->User->validationErrors['username'] = 'Username not found';
                $cansave = false;
            } 
            else if ($user['User']['password'] != $this->Auth->password($this->request->data['User']['password']))
            {
                $this->User->validationErrors['password'] = 'Password is incorrect';
                $cansave = false;
            }

            if ($this->request->data['User']['new_password'] != $this->request->data['User']['confirm_password'])
            {
                $this->User->validationErrors['confirm_password'] = "Password didn't match";
                $cansave = false;
            }

            if ($cansave)
            {
                $this->User->id = $this->authUser["id"];
                if ($this->User->saveField('password', $this->request->data['User']['new_password']))
                {
                    $this->Session->setFlash('Password changed successfully', "flash_success");
                    $this->redirect($this->referer());
                } 
                else
                {
                    $this->Session->setFlash("Password could not be changed", "flash_failure");
                }
            }
        }
    }
    
    public function forgot_password()
    {
        $this->layout = "login";
        
        if ($this->request->is('post')) 
        {
            $user = $this->User->find('first', array(
                'conditions' => array('User.username' => $this->request->data["User"]['username']),
                "recursive" => -1
            ));
            
            if (empty($user)) 
            {
                $this->Session->setFlash('Invalid Username', 'flash_failure');
            } 
            else 
            {
                $user = $user["User"];
                $new_password = Util::getRandomString(6);
                
                $user["password"] = $new_password;
                $data["User"] = array(
                    "password" => $new_password,
                );
                
                $this->User->id = $user['id'];
                $this->User->save($data);
                
                $view = new View($this); 
                $view->set(compact("user")); 
                $view->layout = null;
                $html = $view->render("/Emails/html/forgot_password"); 

                $this->load_model("Setting");
                $settings = $this->Setting->get(NULL);
        
                $this->email(EmailTypes::FORGOT_PASSWORD, $user['email'], $settings['admin']['fromEmail'], EmailTypes::$list[EmailTypes::FORGOT_PASSWORD], $html);
                
                $this->Session->setFlash('Email has been sent successfully.', 'flash_success');
            }
            
            $this->redirect($this->referer());
        }
    }
        
    public function initDB()
    {
        $this->autoRender = false;
        
        echo "init DB : ";
        
        $group = $this->User->Group;

        // Allow admins to everything
        $group->id = GROUP_ADMIN;
        $this->Acl->deny($group, 'controllers');
        
        $this->Acl->allow($group, 'controllers/Companies/admin_toggleStatus');
        
        $this->Acl->allow($group, 'controllers/Users/admin_index');
        $this->Acl->allow($group, 'controllers/Users/admin_change_password');
        
        $this->Acl->allow($group, 'controllers/Logs/admin_web_service');
        $this->Acl->allow($group, 'controllers/Logs/admin_cron');
        $this->Acl->allow($group, 'controllers/Logs/admin_email');
        
        $group->id = GROUP_COMPANY_ADMIN;
        $this->Acl->deny($group, 'controllers');
        
        $this->Acl->allow($group, 'controllers/ChartMenus');
        $this->Acl->allow($group, 'controllers/ChartReports');
        
        $this->Acl->allow($group, 'controllers/Users/admin_company_sub_manager_summary');
        $this->Acl->allow($group, 'controllers/Users/admin_add_company_sub_manager');
        $this->Acl->allow($group, 'controllers/Users/admin_edit_company_sub_manager');
        $this->Acl->allow($group, 'controllers/Users/admin_company_members_summary');
        $this->Acl->allow($group, 'controllers/Users/admin_add_company_member');
        $this->Acl->allow($group, 'controllers/Users/admin_edit_company_member');
        $this->Acl->allow($group, 'controllers/Users/admin_toggleStatus');
        $this->Acl->allow($group, 'controllers/Users/admin_change_password');
        
        $group->id = GROUP_COMPANY_SUB_ADMIN;
        $this->Acl->deny($group, 'controllers');
        
        $this->Acl->allow($group, 'controllers/ChartMenus');
        $this->Acl->allow($group, 'controllers/ChartReports');
        $this->Acl->allow($group, 'controllers/Users/admin_company_members_summary');
        $this->Acl->allow($group, 'controllers/Users/admin_change_password');
        
        // we add an exit to avoid an ugly "missing views" error message
        echo "done";
    }
    
    public function aclExtras()
    {
        $this->autoRender = false;
        
        echo 'Acl Extras : '; 
        
        App::uses('ShellDispatcher', 'Console'); 
        $command = '-app '.APP.' AclExtras.AclExtras aco_sync'; 
        $args = explode(' ', $command); 
        $dispatcher = new ShellDispatcher($args, false); 
        
        if($dispatcher->dispatch()) 
        { 
            echo 'done'; 
        } 
        else 
        { 
            echo 'Error'; 
        }
    }
    
    public function clearCache()
    {
        Cache::clear(false, 'acl_config'); //clear all cache
        echo "Clear Cache Run Successfully. </br>"; 
        $this->autoRender = false;
    }
    
    public function acl()
    {
        $this->autoRender = false;
        
        $this->aclExtras();
        
        echo "<br/>";
        
        $this->initDB();
        
        echo "<br/>";
        
        $this->clearCache();
        
        exit;
    }
}