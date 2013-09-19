<?php

/**
 * File that should be included by any script before anything else.
 * 
 * @author Eric Bollens
 * @version 20120625
 * @copyright Copyright (c) 2012 UC Regents
 */

/** 
 * Include and initialize Loader for autoload functionality 
 * 
 * @uses Loader
 */
require_once(dirname(__FILE__).'/lib/loader.php');
Loader::init();

/**
 * Stub for $CONFIG global. For now, this can be set anywhere. However, do not
 * rely on this, as it will eventually be made immutable except from ini files.
 * 
 * @todo implement immutable class for $CONFIG
 * @todo load properties from ini files
 * 
 * @name $CONFIG
 * @global stdClass $CONFIG
 */
$CONFIG = new stdClass();
$CONFIG->title = 'UCLA Engineering Clubs';
$CONFIG->url = 'http://localhost/engrclubs/www';
$CONFIG->debug = true;
$CONFIG->db_host = 'localhost';
$CONFIG->db_user = 'root';
$CONFIG->db_pass = 'root';
$CONFIG->db_db = 'engrclubs';

@date_default_timezone_set('America/Los_Angeles');