<?php

/**
 * Class definition for Loader.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120618
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * Define a NAMESPACE_SEPARATOR constant
 */
!defined('NAMESPACE_SEPARATOR') && define('NAMESPACE_SEPARATOR', '\\');

/**
 * The Loader is responsible for handling class loading within MWRS. 
 * 
 * Loader will automatically load classes once Loader::init() is called so that
 * require() and include() are not necessary.
 * 
 * By default, it loads classes from /common/lib.
 * 
 * This pathing is actually two separate components:
 * 
 *      - Registered Directory
 *      - Class Type Subdirectory
 * 
 * By default, "common" is the only registered directory. However, additional
 * class path directory roots may be registered with Loader::register(). When
 * attempting them to load an undefined class, Loader will check under 
 * registered directories in LIFO order.
 * 
 * Consider the following registration:
 * 
 *      Loader::register('client/common');
 *      Loader::register('client/mobile');
 *      $object = new Unloaded_Class();
 * 
 * In this example, it will first check client/mobile/lib/unloaded_class.php; 
 * if this does not exist, it will try client/common/lib/unloaded_class.php;
 * if this too does not exist, it falls back to service/lib/unloaded_class.php.
 * If none of these exist, then Loader will fail to load the class.
 * 
 * In addition to registered class path base directories, the Loader also 
 * supports class type subdirectories. It is signaled to try a directory besides
 * /lib when it matches one of the following suffixes:
 * 
 *      _controller -> controller/
 *      _exception  -> exception/
 *      _interface  -> interface/
 *      _model      -> model/
 *      _test       -> test/
 * 
 * Additional functions exist to provide telemetry on which class paths Loader
 * will check, and which class path Loader has resolved.
 * 
 * @package foundation
 */
class Loader
{
    /**
     * Directories including /common in LIFO order by Loader::register($dir).
     * 
     * @var array
     */
    private static $_dir = array();
    
    /**
     *
     * Special suffix mappings to folders other than /lib.
     * 
     * @var array
     */
    private static $_map = array('_controller'=>'controller'
                               , '_exception'=>'exception'
                               , '_interface'=>'interface'
                               , '_model'=>'model'
                               , '_test'=>'test');
    
    /**
     * Initializer for loader that registers it as the autoloader.
     */
    public static function init()
    {
        spl_autoload_register('Loader::load');
    }
    
    /**
     * Registers directory $dir in addition to /common in LIFO order that the 
     * loader will check for class definitions.
     * 
     * @param string $dir 
     */
    public static function register($dir)
    {
        array_unshift(self::$_dir, $dir);
    }
    
    /**
     * Get an array of registered directories for class path.
     * 
     * @return array
     */
    public static function get_registered()
    {
        return self::$_dir;
    }
    
    /**
     * Unregisters directory $dir from set that loader will check for class
     * definitions. Use this with caution, as registering again will cause the
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
    
    /**
     * Load a class by name $class. This is invoked automatically by the PHP
     * runtime if Loader::init() has been calledd, and it uses 
     * Loader::get_class_path() to determine the class definition file.
     *  
     * 
     * @param string $class 
     */
    public static function load($class)
    {
        if($class_path = self::get_class_path($class))
        {
            include_once($class_path);
            return true;
        }
        
        return false;
    }
    
    /**
     * Get the path for a class by name $class. This observes the directory 
     * structure as defined by Loader::register() given LIFO ordering by
     * Loader::get_possible_class_paths().
     * 
     * @param string $class
     * @return string|false 
     */
    public static function get_class_path($class)
    {
        foreach(self::get_possible_class_paths($class) as $path)
        {
            if(file_exists($path))
            {
                return $path;
            }
        }
        
        return false;
    }
    
    /**
     * Get an array of possible paths for a class by name $class, ordered in
     * terms of directories as registered by Loader::register() in LIFO order.
     * 
     * @param string $class
     * @return array
     */
    public static function get_possible_class_paths($class)
    {
        $basedir = self::get_base_path();
        $class = strtolower($class);
        $class_file = str_replace(NAMESPACE_SEPARATOR, DIRECTORY_SEPARATOR, $class);
        $len = $class_file;
        
        $subdir = 'lib';
        
        foreach(self::$_map as $suffix=>$suffix_subdir)
        {
            if(substr($class, $len-strlen($suffix), strlen($suffix)) == $suffix)
            {
                $subdir = $suffix_subdir;
            }
        }
        
        $paths = array();
        
        foreach(self::$_dir as $dir)
        {
            $paths[] = $basedir.'/'.$dir.'/'.$subdir.'/'.$class_file.'.php';
        }
        
        $paths[] = $basedir.'/'.$subdir.'/'.$class_file.'.php';
        
        return $paths;
    }
    
    /**
     * Get the root path of the application.
     * 
     * @return string 
     */
    public static function get_base_path()
    {
        return dirname(dirname(__FILE__));
    }
}
