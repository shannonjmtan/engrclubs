<?php

/**
 * Web-accessible script that exposes all MVC-driven pages.
 * 
 * @author Eric Bollens
 * @version 20120403
 * @copyright Copyright (c) 2012 UC Regents
 */

/** 
 * Include the desktop client global file first. 
 */
require_once(dirname(dirname(__FILE__)).'/global.php');

/** 
 * Define the call string for the router.
 * 
 * @see Router
 */
$call_string = $_SERVER['QUERY_STRING'];
if(($end_pos = strpos($call_string, '&')) !== false)
{
    $call_string = substr($call_string, 0, $end_pos);
}
if(substr($call_string, 0, 1) == '/')
{
    $call_string = substr($call_string, 1);
}

/** 
 * Initialize the Template. 
 * 
 * @uses Template
 */
Template::init();

/**
 * Construct the router, define a default controller, and execute.
 * 
 * @uses Router
 */
$router = new Router($call_string);
$router->set_default_controller_name('home');
$router->execute();
