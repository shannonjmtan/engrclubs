<?php

/**
 * Class definition for Template.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120317
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * The Template class is responsible for rendering a template view around the
 * content output during execution. To accomplish this, it leverages a View
 * file with a path defined under /view/{Template::BASE_VIEW_DIR}.
 * 
 * The templating engine in started via Template::init(). It does not need to
 * be ended to render content. Instead, this occurs as part of the shutdown 
 * routine. One cannot invoke Template::execute() directly, and doing so will
 * trigger an E_USER_WARNING and no output.
 * 
 * The default template view is 'default'. It can be changed or accessed via:
 * 
 *      Template::set_name($name)
 *      Template::get_name()
 * 
 * A template file is built just like any other view, except with a special
 * reserved local variable $CONTENT that is the total sum of all output that
 * occurs naturally during the progression of script execution. Consequently,
 * a template file requires $CONTENT to be printed somewhere within.
 * 
 * Besides $CONTENT, local variables may be assigned and accessed like a View:
 * 
 *      Template::set_var($name)
 *      Template::get_var()
 * 
 * As it uses an underlying implementation of View, it leverages the same LIFO
 * ordering for base directories as set by View::register().
 * 
 * @package foundation
 */
class Template
{
    /**
     * Name of the template directory within /view
     * 
     * @var string
     */
    const BASE_VIEW_DIR = 'template';
    
    /**
     * Name of the template file within /view/{Template::BASE_VIEW_DIR}.
     * 
     * @var string 
     */
    private static $_file = 'default';
    
    /**
     * Stored variables that will be passed into the template as local variables.
     * 
     * @var array
     */
    private static $_vars = array();
    
    /**
     * Flag that, when set false, does not display a template view. This is
     * mutated by Template::enable() and Template::disable() and defaults to
     * true for template enablement.
     * 
     * @var boolean 
     */
    private static $_enabled = true;
    
    /**
     * Private constructor that prevents the calling of execute() except by
     * the shutdown function.
     */
    private function __construct(){}
    
    /**
     * Initializer that must be called before content output to start the
     * template buffering that will, at end of execution, then render out all
     * output within the template.
     */
    public static function init()
    {
        ob_start();
        
        register_shutdown_function('Template::execute', new Template());
    }
    
    /**
     * Set the name of the template file in /view/{Template::BASE_VIEW_DIR}.
     * 
     * @param string $name 
     */
    public static function set_name($name)
    {
        self::$_file = $name;
    }
    
    /**
     * Get the name of the template file in /view/{Template::BASE_VIEW_DIR).
     * 
     * @return type 
     */
    public static function get_name()
    {
        return self::$_file;
    }
    
    /**
     * Disable the template engine so that content is output raw.
     */
    public static function disable()
    {
        self::$_enabled = false;
    }
    
    /**
     * Enable the template engine so that content is output within the 
     * template view file as $CONTENT. This does not need to be called unless
     * Template::disable() has already been called.
     */
    public static function enable()
    {
        self::$_enabled = true;
    }
    
    /**
     * Determine if the template is enabled.
     * 
     * @return boolean 
     */
    public static function is_enabled()
    {
        return self::$_enabled;
    }
    
    /**
     * Get the local file path of the template file within /view including the
     * Template::BASE_VIEW_DIR.
     * 
     * @return string 
     */
    public static function get_local_file_path()
    {
        return self::BASE_VIEW_DIR.'/'.self::$_file;
    }
    
    /**
     * Get the path for the template view file. This observes the directory 
     * structure as defined by View::register() given LIFO ordering by 
     * View->get_possible_file_paths().
     * 
     * @return string|false 
     */
    public static function get_file_path()
    {
        return View::build(self::get_local_file_path())->get_file_path();
    }
    
    /**
     * Get an array of possible paths for the template view file, ordered in
     * terms of directories as registered by View::register() in LIFO order.
     * 
     * @return array
     */
    public static function get_possible_file_paths()
    {
        return View::build(self::get_local_file_path())->get_possible_file_paths();
    }
    
    /**
     * Method that stores $value by $name for access within the template view
     * upon ::render().
     * 
     * @param string $name
     * @param mixed $value 
     */
    public static function set_var($name, $value)
    {
        self::$_vars[$name] = $value;
    }
    
    /**
     * Method that accesses variable by $name that will be accessible within the
     * view upon ->render().
     * 
     * @param string $name
     * @throws Template_Exception
     * @return mixed 
     */
    public static function get_var($name)
    {
        if(!self::isset_var($name))
        {
            throw new Template_Exception('Undefined template variable ('.$name.')');
        }
        else
        {
            return self::$_vars[$name];
        }
    }
    
    /**
     * Determines if variable $name is accessible within the template view.
     * 
     * @param string $name
     * @return boolean 
     */
    public static function isset_var($name)
    {
        return isset(self::$_vars[$name]);
    }
    
    /**
     * Unsets a variable by $name within the template view.
     * 
     * @param string $name 
     */
    public static function unset_var($name)
    {
        if(!self::isset_var($name))
        {
            throw new Template_Exception('Undefined template variable ('.$name.')');
        }
        else
        {
            unset(self::$_vars[$name]);
        }
    }
    
    /**
     * Execute template rendition, outputting from Template::render(). This 
     * cannot be called directly, but instead is invoked on script shutdown
     * if Template::init() has been called.
     * 
     * @param Template $obj 
     */
    public static function execute($object = null)
    {
        global $CONFIG;
        
        if(!$object || !is_a($object, __CLASS__))
        {
            trigger_error('Template::execute() cannot be called directly', E_USER_WARNING);
            return;
        }
        
        if(!self::is_enabled())
        {
            ob_end_flush();
            return;
        }
        
        $view = new View(self::get_local_file_path());
        
        foreach(self::$_vars as $name=>$value)
        {
            $view->$name = $value;
        }
        
        $view->CONFIG = isset($CONFIG) && is_object($CONFIG) ? $CONFIG : false;
        
        $view->CONTENT = ob_get_contents();
        
        ob_end_clean();
        
        // Try to render or else throw E_FATAL since cannot throw exception
        // outside of stack frame.
        try
        {
            echo $view->render();
        }
        catch(View_Exception $e)
        {
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }
}
