<?php

/**
 * Class definition for CURL_Request_Model.
 * 
 * @package common
 * @subpackage service
 * @author Eric Bollens
 * @version 20120111
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * The client common CURL_Request_Model performs a RESTful web service call and 
 * produces either a CURL_Response_Model on success, containing the data, or 
 * throws a CURL_Request_Model_Exception on failure. To accomplish this, the 
 * model leverages cURL and  thus the PHP cURL extension is required.
 * 
 * In configurations where the service is accessible through a redirect (not
 * advised), the php.ini directives safe_mode and open_basedir cannot be enabled
 * or this model fail.
 * 
 * @package common
 * @subpackage service
 */
abstract class CURL_Request_Model
{
    /**
     * URL of the cURL request, with query string parameters stripped out.
     * 
     * @var string
     */
    private $_url;
    
    /**
     * Parameters that will be made available in the URL query string of the
     * request.
     * 
     * @var array
     */
    private $_query_string_parameters = array();
    
    /**
     * cURL options set within a protected context by ->_set_opt()
     * 
     * @var type 
     */
    private $_opts = array();
    
    /**
     * Constructor that accepts a URL that the request will be made to. This
     * may include query string parameters, which are parsed out so that they
     * can be mutated through ->set_query_string_parameter() up until the point
     * ->execute() is called.
     * 
     * @param string $url
     */
    public function __construct($url)
    {
        if(($pos = strpos($url, '?')) !== false)
        {
            $this->_url = substr($url, 0, $pos);
            
            $query_string = substr($url, $pos+1);
            
            $query_parameters = explode('&', $query_string);
            foreach($query_parameters as $parameter)
            {
                if(($pos = strpos($parameter, '=')) !== false)
                {
                    $name = substr($parameter, 0, $pos);
                    $value = substr($parameter, $pos+1);
                    $this->set_query_string_parameter($name, $value);
                }
                else
                {
                    $this->set_query_string_parameter($parameter);
                }
            }
        }
        else
        {
            $this->_url = $url;
        }
    }
    
    /**
     * Abstract method that implementers must define as the string representing
     * the HTTP request method such as 'GET' or 'POST'.
     * 
     * @return string
     */
    public abstract function get_method();
    
    /**
     * Get the current URL as per the $url definition during construction and
     * any mutations on the query string via ->set_query_string_parameter().
     * 
     * @return string
     */
    public function get_url()
    {
        return $this->_url.$this->get_query_string();
    }
    
    /**
     * Set a parameter by $name that will be made available in the URL query 
     * string of the request. The $value may be set to a string or null if 
     * the parameter is unary.
     * 
     * @param string $name
     * @param string|null $value 
     */
    public function set_query_string_parameter($name, $value = null)
    {
        $this->_query_string_parameters[$name] = $value;
    }
    
     /**
     * Returns true if the parameter by $name is set for the URL query string.
     * 
     * @param string $name
     * @return boolean 
     */
    public function has_query_string_parameter($name)
    {
        return array_key_exists($name, $this->_query_string_parameters);
    }
    
    /**
     * Unset the parameter by $name so that it will not be in query string. This 
     * throws a CURL_Request_Model_Exception if the parameter is not already 
     * defined in the query string.
     * 
     * @param string $name 
     * @throws CURL_Request_Model_Query_String_Exception
     */
    public function unset_query_string_parameter($name)
    {
        if(!$this->has_query_string_parameter($name))
        {
            throw new CURL_Request_Model_Query_String_Exception('Query string parameter \''.$name.'\' does not exist');
        }
        
        unset($this->_query_string_parameters[$name]);
    }
    
    /**
     * Returns the string value of a get parameter $name, or null if the get 
     * parameter by $name is unary. This throws a CURL_Request_Model_Exception 
     * if the parameter is not part of the query string.
     * 
     * @param string $name
     * @throws CURL_Request_Model_Query_String_Exception
     * @return string|null
     */
    public function get_query_string_parameter($name)
    {
        if(!$this->has_query_string_parameter($name))
        {
            throw new CURL_Request_Model_Query_String_Exception('Query string parameter \''.$name.'\' does not exist');
        }
        
        return $this->_query_string_parameters[$name];
    }
    
    /**
     * Returns an array of query string parameters.
     * 
     * @return array 
     */
    public function get_query_string_parameters()
    {
        return $this->_query_string_parameters;
    }
    
    /**
     * Generates the urlencoded query string including '?'.
     * 
     * @return type 
     */
    public function get_query_string()
    {
        if(count($this->_query_string_parameters) == 0)
        {
            return '';
        }
        else
        {
            return '?'.self::generate_data_string($this->_query_string_parameters);
        }
    }
    
    /**
     * Leveraging cURL, this takes the URL and parameters as defined and invokes
     * an HTTP request. In the event that this is successful, it returns a
     * CURL_Response_Model. Otherwise, it throws a CURL_Request_Model_Exception.
     * 
     * @throws CURL_Request_Model_Execution_Exception
     * @return CURL_Response_Model
     */
    public function execute()
    {
        $ch = curl_init();
        
        foreach($this->_opts as $name=>$value)
            curl_setopt($ch, $name, $value);
        
        curl_setopt($ch, CURLOPT_URL, $this->get_url());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response_data = curl_exec($ch);
        
        if($response_data === false)
        {
            throw new CURL_Request_Model_Execution_Exception('cURL error: '.curl_error($ch), curl_errno($ch));
        }
        
        curl_close($ch);
        
        return new CURL_Response_Model($this, $response_data);
    }
    
    /**
     * Static factory that accepts an array and creates a URL-encoded data
     * string usable as a query string or as post data.
     * 
     * @param array $array
     * @return string 
     */
    public static function generate_data_string($array)
    {
        $str = '';
        foreach($array as $name=>$value)
        {
            if($value)
            {
                $str .= $name . '=' . urlencode($value);
            }
            else
            {
                $str .= $name;
            }
            $str .= '&';
        }
        return rtrim($str, '&');
    }
    
    /**
     * Protected function that allows a subclass to set options on the curl
     * channel that will be leveraged in Request_Model->execute(). The
     * CURLOPT_RETURNTRANSFER and CURLOPT_URL options are reserved and may
     * not be set.
     * 
     * @param string $name
     * @param mixed $value 
     * @throws CURL_Request_Model_Option_Exception
     */
    protected function _set_opt($name, $value)
    {
        switch($name)
        {
            case CURLOPT_RETURNTRANSFER:
            case CURLOPT_URL:
                throw new CURL_Request_Model_Option_Exception('Option \''.$name.'\' is reserved');
        }
        
        $this->_opts[$name] = $value;
    }
    
    /**
     * Protected accessor for an option that will be set on the curl channel
     * during Request_Model->execute().
     * 
     * @param string $name
     * @throws CURL_Request_Model_Option_Exception
     * @return mixed 
     */
    protected function _get_opt($name)
    {
        switch($name)
        {
            case CURLOPT_RETURNTRANSFER:
                return 1;
                
            case CURLOPT_URL:
                return $this->get_url();
        }
        
        if(isset($this->_opts[$name]))
        {
            return $this->_opts[$name];
        }
        else
        {
            throw new CURL_Request_Model_Option_Exception('Option \''.$name.'\' does not exist');
        }
    }
}