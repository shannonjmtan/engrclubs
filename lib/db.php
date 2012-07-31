<?php

/**
 * Class definition for DB.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120123
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * Singleton database accessor class.  Encapsulates a common mysqli object that
 * can be referenced with DB::mysqli(), and also forwards static method calls to
 * the mysqli object so you can make method calls against the mysqli object
 * easily (if PHP 5.3+).
 * 
 * @package foundation
 * @uses DB_Exception
 */
class DB {

    /**
     * The instance of the DB object
     *
     * @var null|DB
     */
    private static $_self = null;

    /**
     * The mysqli object associated with the current database connection.
     *
     * @var null|mysqli
     */
    private static $_mysqli = null;

    /**
     * Constructor is declared private to make the class a singleton.
     */
    private function __construct() {}
    
    /**
     * Constructor is declared private to make the class a singleton.
     */
    private function __clone() {}

    /**
     * __callStatic magic method is used for call forwarding to the encapsulated
     * mysqli object.
     *
     * @param string $name Name of the function to call
     * @param array $arguments Array of arguments the function is called with
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if(method_exists('mysqli', $name))
            $result = call_user_func_array(array(self::mysqli(), $name), $arguments);
        
        if(!$result)
            throw new DB_Exception('MySQL Error ('.self::mysqli()->errno.'): '.  self::mysqli()->error);
        
        return $result;
    }

    /**
     * Singleton accessor method that returns the instance of the mysqli object.
     *
     * @return mysqli
     */
    public static function &mysqli()
    {
        global $CONFIG;
        
        if(self::$_self == null)
            self::$_self = new DB();
        
        if(self::$_mysqli == null)
            @self::$_mysqli = new mysqli($CONFIG->db_host, $CONFIG->db_user, $CONFIG->db_pass, $CONFIG->db_db);
        
        if(mysqli_connect_errno())
            throw new DB_Exception('Database Connection Error ('.mysqli_connect_errno().'): '.  mysqli_connect_error());
        
        return self::$_mysqli;
    }
}
