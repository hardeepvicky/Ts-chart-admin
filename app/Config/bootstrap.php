<?php
Cache::config('acl_config', array(
    'engine' => 'File',
    'duration' => '+366 days',
    "groups" => array("Acl"),
    'path' => CACHE,
    'prefix' => ''
));

Cache::config('month', array(
    'engine' => 'File',
    'duration' => '+1 months',
    'path' => CACHE,
    'prefix' => 'month_'
));

Cache::config('week', array(
    'engine' => 'File',
    'duration' => '+1 week',
    'path' => CACHE,
    'prefix' => 'week_'
));

Cache::config('day', array(
    'engine' => 'File',
    'duration' => '+1 days',
    'path' => CACHE,
    'prefix' => 'day_'
));

Cache::config('hour', array(
    'engine' => 'File',
    'duration' => '+1 hours',
    'path' => CACHE,
    'prefix' => 'hour_'
));

Cache::config('hour_3', array(
    'engine' => 'File',
    'duration' => '+3 hours',
    'path' => CACHE,
    'prefix' => 'hour_3_'
));

Cache::config('hour_6', array(
    'engine' => 'File',
    'duration' => '+6 hours',
    'path' => CACHE,
    'prefix' => 'hour_6_'
));

Cache::config('min_15', array(
    'engine' => 'File',
    'duration' => '+15 mintues',
    'path' => CACHE,
    'prefix' => 'min_15_'
));


/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

CakePlugin::load('AclExtras');
require_once('constants.php');
require_once('functions.php');

require_once('DateUtility.php');
require_once('static_arrays.php');
require_once('menu.php');

require_once APP . 'vendor/tech-dev-tools/Util.php';

App::uses('CacheDbAcl', 'Lib');
Configure::write('CacheDbAclConfig', 'acl_config');

CakePlugin::load('DebugKit');