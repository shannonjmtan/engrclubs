<?php

/**
 * Class definition for View.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120618
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * The View class is responsible for encapsulating a view file. In a static
 * context, it also supports similar directory registering to Loader.
 * 
 * When a View is constructed, it should be relative to the /view directory
 * within a registered directory. By default, /common is registered, meaning
 * that the name would be a file within /common/view. This name should further
 * avoid the .php extension.
 * 
 * A sample view file might be:
 * 
 *      /common/view/dir/file.php
 * 
 * This would be accessed as follows:
 * 
 *      $view = new View('dir/file');
 * 
 * Once instantiated, values may be assigned to variables in the view file as:
 * 
 *      $view->var = $value;
 * 
 * This will expose $var within the view with the value $value.
 * 
 * A view output is then generated with ->render() and often echod:
 * 
 *      echo $view->render();
 * 
 * It may also be stored and passed to other views.
 * 
 * If one seeks to define a different view base directory, it may be registered
 * and then the view will be referenced as such. Consider a view at location:
 * 
 *      /client-desktop/view/home/home.php
 * 
 * In the client-desktop global startup, a new base dir is registered:
 * 
 *      View::register('client-desktop');
 * 
 * Then the view may simply be defined in the same format as before and operated
 * on in the same manner as described above:
 * 
 *      $view = new View('home/home');
 *      $view->var = $value;
 *      echo $view->render();
 * 
 * @package foundation
 */
class View
{
    /**
     * The local path of a view file within /view, which is itself within one
     * of the directories defined by $_dir. This should not include extension.
     * 
     * @var string 
     */
    private $_name;
    
    /**
     * The extension appended to the end of the local path from view name.
     */
    const EXT = '.php';
    
    /**
     * Stored variables that will be passed into the view as local variables.
     * 
     * @var array
     */
    private $_vars = array();
    
    /**
     * Directories including /common in LIFO order by View::register($dir).
     * 
     * @var array
     */
    private static $_dir = array('common');
    
    /**
     * Constructor that accepts the local path of a view file within the /view
     * directory, itself contained within /common or another directory 
     * registered via View::register().
     * 
     * @param string $local_path 
     */
    public function __construct($name)
    {
        $this->_name = $name;
    }
    
    /**
     * Static builder that invokes the constructor __construct for View.
     * 
     * @param string $name
     * @return View 
     */
    public static function build($name)
    {
        return new View($name);
    }
    
    /**
     * Magic method for $obj->$name = $value that stores $value by $name for 
     * access within the view upon ->render().
     * 
     * @param string $name
     * @param mixed $value 
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }
    
    /**
     * Magic method for $obj->$name that accesses variable by $name that will
     * be accessible within the view upon ->render().
     * 
     * @param string $name
     * @return mixed 
     */
    public function __get($name)
    {
        return $this->get($name);
    }
    
    /**
     * Magic method that determines isset($obj->$name) if variable by $name is
     * set and will be accessible within the view upon ->render().
     * 
     * @param string $name
     * @return boolean 
     */
    public function __isset($name)
    {
        return isset($this->_vars[$name]);
    }
    
    /**
     * Magic method for unset($obj->$name) to unset a variable by $name so that
     * it will not be accessible within the view upon ->render().
     * 
     * @param string $name 
     * @throws View_Parameter_Exception
     */
    public function __unset($name)
    {
        if(!isset($this->$name))
        {
            throw new View_Parameter_Exception('Undefined view variable ('.$name.')');
        }
        else
        {
            unset($this->_vars[$name]);
        }
    }
    
    /**
     * Method that stores $value by $name for access within the view upon 
     * ->render(). This is chainable as it returns $this.
     * 
     * @param string $name
     * @param mixed $value 
     */
    public function &set($name, $value)
    {
        $this->_vars[$name] = $value;
        return $this;
    }
    
    /**
     * Method that accesses variable by $name that will be accessible within the
     * view upon ->render().
     * 
     * @param string $name
     * @throws View_Parameter_Exception
     * @return mixed 
     */
    public function get($name)
    {
        if(!isset($this->_vars[$name]))
        {
            throw new View_Parameter_Exception('Undefined view variable ('.$name.')');
        }
        else
        {
            return $this->_vars[$name];
        }
    }
    
    /**
     * Method that returns an array($name=>$value) of all variables that will be
     * accessible within the view by $name upon ->render().
     * 
     * @return type 
     */
    public function get_all()
    {
        return $this->_vars;
    }
    
    /**
     * Generate the output of the view.
     * 
     * @throws View_Render_Exception
     * @return string 
     */
    public function render()
    {
        if(!($path = $this->get_file_path()))
        {
            throw new View_Render_Exception('View file ('.$this->_name.') missing');
        }
        
        ob_start();
        extract($this->get_all());
        include($path);
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
    
    /**
     * Get the path for the view file. This observes the directory structure as 
     * defined by View::register() given LIFO ordering by 
     * View->get_possible_file_paths().
     * 
     * @return string|false 
     */
    public function get_file_path()
    {
        foreach($this->get_possible_file_paths() as $path)
        {
            if(file_exists($path))
            {
                return $path;
            }
        }
        
        return false;
    }
    
    /**
     * Get an array of possible paths for the view file, ordered in
     * terms of directories as registered by View::register() in LIFO order.
     * 
     * @return array
     */
    public function get_possible_file_paths()
    {
        $basedir = Loader::get_base_path();
        
        $paths = array();
        
        foreach(self::$_dir as $dir)
        {
            $paths[] = $basedir.'/'.$dir.'/view/'.$this->_name.self::EXT;
        }
        
        $paths[] = $basedir.'/view/'.$this->_name.self::EXT;
        
        return $paths;
    }
    
    /**
     * Registers directory $dir in addition to /common in LIFO order that all
     * constructed views will check within for the view file.
     * 
     * @param string $dir 
     */
    public static function register($dir)
    {
        array_unshift(self::$_dir, $dir);
    }
    
    /**
     * Get an array of registered directories for file view path.
     * 
     * @return array
     */
    public static function get_registered()
    {
        return self::$_dir;
    }
    
    /**
     * Unregisters directory $dir from set that the view will check for a view
     * file. Use this with caution, as registering again will cause the
     * item to be bumped to the front of the LIFO ordering of registered dirs.
     * 
     * @param string $dir 
     */
    public static function unregister($dir)
    {
        $array = self::$_dir;
        
        if(($pos = array_search($dir, $array)) !== false)
        {
            unset($array[$pos]);
            self::$_dir = array_values($array);
        }
    }
}
