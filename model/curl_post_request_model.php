<?php

/**
 * Class definition for CURL_Post_Request_Model.
 * 
 * @package common
 * @subpackage service
 * @author Eric Bollens
 * @version 20120111
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * cURL-based POST request that generates a CURL_Response_Model if successful
 * or otherwise throws a CURL_Request_Model_Execution_Exception.
 * 
 * @package common
 * @subpackage service
 */
class CURL_Post_Request_Model extends CURL_Request_Model
{
    /**
     * Parameters that will be made available in the post data content of the
     * request.
     * 
     * @var array
     */
    private $_post_data_parameters = array();
    
    /**
     * Set a parameter by $name that will be made available in the post data
     * content of the request. The $value may be set to a string or null if 
     * the parameter is unary.
     * 
     * @param string $name
     * @param string|null $value 
     */
    public function set_post_data_parameter($name, $value = null)
    {
        $this->_post_data_parameters[$name] = $value;
    }
    
    /**
     * Returns true if the parameter by $name is set for post data.
     * 
     * @param string $name
     * @return boolean 
     */
    public function has_post_data_parameter($name)
    {
        return array_key_exists($name, $this->_post_data_parameters);
    }
    
    /**
     * Unset the parameter by $name so that it will not be in post data. This 
     * throws a CURL_Request_Model exception if the parameter is not part of the
     * post data content.
     * 
     * @param string $name 
     * @throws Request_Model_Exception
     */
    public function unset_post_data_parameter($name)
    {
        if(!$this->has_post_data_parameter($name))
        {
            throw new CURL_Request_Model_Post_Data_Exception('Post data parameter \''.$name.'\' does not exist');
        }
        
        unset($this->_post_data_parameters[$name]);
    }
    
    /**
     * Returns the string value of a post parameter $name, or null if the post 
     * parameter by $name is unary. This throws a CURL_Request_Model exception 
     * if the parameter is not part of the post data content.
     * 
     * @param string $name
     * @throws Request_Model_Exception
     * @return string|null
     */
    public function get_post_data_parameter($name)
    {
        if(!$this->has_post_data_parameter($name))
        {
            throw new CURL_Request_Model_Post_Data_Exception('Post data parameter \''.$name.'\' does not exist');
        }
        
        return $this->_post_data_parameters[$name];
    }
    
    /**
     * Determines if any post data fields have been set.
     * 
     * @return boolean 
     */
    public function has_post_data_parameters()
    {
        return count($this->_post_data_parameters) > 0;
    }
    
    /**
     * Returns an array of post data fields.
     * 
     * @return array 
     */
    public function get_post_data_parameters()
    {
        return $this->_post_data_parameters;
    }
    
    /**
     * Generates the urlencoded post data string.
     * 
     * @return type 
     */
    public function get_post_data_string()
    {
        if(!$this->has_post_data_parameters())
        {
            return '';
        }
        else
        {
            return self::generate_data_string($this->_post_data_parameters);
        }
    }
    
    /**
     * Always returns 'POST' for the CURL_Post_Request_Model.
     * 
     * @return string 
     */
    public function get_method()
    {
        return 'POST';
    }
    
    /**
     * Override of CURL_Request_Model->execute that sets CURLOPT_POST=1 and 
     * CURLOPT_POSTFIELDS to CURL_Post_Request_Model->get_post_data_string() 
     * before execution.
     * 
     * @return CURL_Response_Model 
     */
    public function execute()
    {
        $this->_set_opt(CURLOPT_POST, true);
        $this->_set_opt(CURLOPT_POSTFIELDS, $this->get_post_data_parameters());
        
        return parent::execute();
    }
}