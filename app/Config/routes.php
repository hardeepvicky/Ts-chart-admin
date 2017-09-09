<?php
Router::connect('/', array('controller' => 'pages', 'action' => 'index', 'home'));
Router::connect('/builder', array('controller' => 'UserResumes', 'action' => 'index'));
Router::connect('/admin', array('controller' => 'users', 'action' => 'login'));
Router::connect('/web-api', array('controller' => 'web_services', 'action' => 'index'));

Router::connect('/users/password/change', array('controller' => 'users', 'action' => 'change_password', 'admin' => true));
Router::connect('/users/password/forgot', array('controller' => 'users', 'action' => 'forgot_password', 'admin' => false));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
