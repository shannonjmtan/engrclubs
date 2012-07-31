<?php

/**
 * Class definition for Router.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120106
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * The Router is responsible for parsing out a call path, constructing a
 * controller object, and executing a method on that controller object with
 * parameters as passed as segments.
 * 
 * By default, a router string is divided as follows:
 * 
 *      /obj/method/arg1/arg2/..
 * 
 * This query string, for instance, would construct an Obj_Controller object and
 * invoke the method function on it with the parameters arg1, arg2, ...
 * 
 * If a controller isn't specified, the router will check for a default 
 * controller via ->get_default_controller_name() and throw a Router_Exception
 * if one isn't set. If one has been set by ->set_default_controller_name(),
 * then it will instead return this if one isn't specified.
 * 
 * If a method isn't specified, it will use the controller name (excluding the
 * _Controller suffix). 
 * 
 * If arguments aren't provided, then it will not pass any to the method.
 * 
 * @package foundation
 */
class Router
{
    /**
     * The separator used within the call string.
     */
    const SEGMENT_SEPARATOR = '/';
    
    /**
     * The call string to be parsed.
     * 
     * @var string
     */
    private $_call;
    
    /**
     * An array of substrings of the call string separated by SEGMENT_SEPARATOR.
     * 
     * @var array
     */
    private $_segments = null;
    
    /**
     * The default controller name string, if set, or else null for no default.
     * If false, ->get_controller_name() will throw Router_Exception if the call
     * string does not specify a controller.
     * 
     * @var string|false
     */
    private $_default_controller = false;
    
    /**
     * The controller object constructed lazily by ->get_controller_object().
     * 
     * @var Controller
     */
    private $_controller_object;
    
    /**
     * Object constructor that stores the call string for the Router.
     * 
     * @param string $call 
     */
    public function __construct($call)
    {
        $this->_call = $call;
    }
    
    /**
     * Accessor to get the call string the router was instantiated with.
     * 
     * @return string 
     */
    public function get_call()
    {
        return $this->_call;
    }
    
    /**
     * Mutator that sets the default controller name so that, if a controller
     * name isn't provided in the call string, then the controller object will
     * be built based on $controller_name.
     * 
     * @param string $controller_name 
     */
    public function set_default_controller_name($controller_name)
    {
        $this->_default_controller = $controller_name;
    }
    
    /**
     * Accessor to get the name of the default controller, if one has been set,
     * or else returns false.
     * 
     * @return string|false 
     */
    public function get_default_controller_name()
    {
        return $this->_default_controller;
    }
    
    /**
     * Get an array of substrings of the call string separated by 
     * SEGMENT_SEPARATOR.
     * 
     * @return array
     */
    public function get_segments()
    {
        if($this->_segments === null)
        {
            $this->_segments = array_map('urldecode', explode(self::SEGMENT_SEPARATOR, $this->_call));
        }
        
        return $this->_segments;
    }
    
    /**
     * Get a particular substring from the call string separated by 
     * SEGMENT_SEPARATOR or false if it does not exist.
     * 
     * @param int $n in the range [0, len)
     * @return string|false
     */
    public function get_segment($n)
    {
        $segments = $this->get_segments();
        
        return isset($segments[$n]) && strlen($segments[$n]) > 0 ? $segments[$n] : false;
    }
    
    /**
     * Get the name of the controller, firstly from the call string segment 0
     * if specified or otherwise from the default controller if set, or throw
     * a Router_Controller_Exception otherwise.
     * 
     * @throws Router_Controller_Exception
     * @return string
     */
    public function get_controller_name()
    {
        if($name = $this->get_segment(0))
        {
            return $name;
        }
        
        if($name = $this->get_default_controller_name())
        {
            return $name;
        }
        
        throw new Router_Controller_Exception('No default controller specified.');
    }
    
    /**
     * Get the name of the method, firstly from the call string segment 1 if 
     * specified or otherwise the name of the controller.
     * 
     * @throws Router_Exception
     * @return string 
     */
    public function get_method_name()
    {
        return $this->get_segment(1) ? $this->get_segment(1) : $this->get_controller_name();
    }
    
    /**
     * Get an array of substrings from the call string separated by 
     * SEGMENT_SEPARATOR not including the controller or method names. These
     * in the range [2,len) are intended to be passed as arguments to the method
     * invocation.
     * 
     * @return array 
     */
    public function get_method_args()
    {
        $args = array_slice($this->get_segments(), 2);
        
        for($i=0; $i < count($args); $i++)
        {
            if(strlen($args[$i]) == 0)
            {
                $args[$i] = false;
            }
        }
        
        if(count($args) > 0 && !$args[count($args)-1])
        {
            array_pop($args);
        }
        
        return $args;
    }
    
    /**
     * Build a controller object from a class named by ->get_controller_name()
     * and the suffix "_Controller", if it has not already been defined, and
     * then return a reference to this controller object. This throws a
     * Router_Controller_Exception if the controller class does not exist.
     * 
     * @throws Router__Controller_Exception
     * @return Controller 
     */
    public function &get_controller_object()
    {
        if($this->_controller_object === null)
        {
            $class_name = $this->get_controller_name().'_controller';
            
            if(!class_exists($class_name))
            {
                throw new Router_Controller_Exception('Controller class ('.$class_name.') does not exist.');
            }
            
            $this->_controller_object = new $class_name();
        }
        
        return $this->_controller_object;
    }
    
    /**
     * Execute the controller object built by ->get_controller_object() by
     * invoking the method determined as ->get_method_name() with the arguments
     * from ->get_method_args() passed to it. This throws a Router_Exception
     * if the method does not exist in the controller class.
     * 
     * @throws Router_Method_Exception
     */
    public function execute()
    {
        $controller_object =& $this->get_controller_object();
        
        $method_name = $this->get_method_name();
        
        if(!method_exists($controller_object, $method_name))
        {
            throw new Router_Method_Exception('Controller method ('. get_class($controller_object).'::'.$method_name.') does not exist.');
        }
        
        $args_array = $this->get_method_args();
        
        call_user_func_array(array($controller_object, $method_name), $args_array);
    }
}
