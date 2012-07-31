<?php

/**
 * Class definition for Router_Controller_Exception.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120112
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * Exception thrown by Router when the controller cannot be determined from call
 * string. This exception indicates that a controller object will not be 
 * possible to construct.
 * 
 * @package foundation
 * @see Router
 */
class Router_Controller_Exception extends Router_Exception
{
    
}
