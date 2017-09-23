<?php
Router::connect('/', array('controller' => 'users', 'action' => 'login'));
Router::connect('/web-api', array('controller' => 'WebServices', 'action' => 'index'));

Router::connect('/users/password/change', array('controller' => 'users', 'action' => 'change_password', 'admin' => true));
Router::connect('/users/password/forgot', array('controller' => 'users', 'action' => 'forgot_password', 'admin' => false));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
