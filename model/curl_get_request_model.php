<?php

/**
 * Class definition for CURL_Get_Request_Model.
 * 
 * @package common
 * @subpackage service
 * @author Eric Bollens
 * @version 20120111
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * cURL-based GET request that generates a CURL_Response_Model if successful
 * or otherwise throws a CURL_Request_Model_Execution_Exception.
 * 
 * @package common
 * @subpackage service
 */
class CURL_Get_Request_Model extends CURL_Request_Model
{
    /**
     * Always returns 'GET' for the CURL_Get_Request_Model.
     * 
     * @return type 
     */
    public function get_method() 
    {
        return 'GET';
    }
    
    /**
     * Override of CURL_Request_Model->execute that sets CURLOPT_HTTPGET=1 
     * before execution.
     * 
     * @return Response_Model 
     */
    public function execute()
    {
        $this->_set_opt(CURLOPT_HTTPGET, true);
        
        return parent::execute();
    }
}