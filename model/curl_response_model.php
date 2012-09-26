<?php

/**
 * Class definition for CURL_Response_Model.
 * 
 * @package common
 * @subpackage service
 * @author Eric Bollens
 * @version 20120111
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * Model representing a successful cURL request made by a CURL_Request_Model 
 * object with an accessor for data. This is most often constructed as the 
 * output of CURL_Request_Model->execute().
 * 
 * @package common
 * @subpackage service
 * @see CURL_Request_Model
 */
class CURL_Response_Model
{
    /**
     * The result of the response model in PHP representation.
     * 
     * @var mixed
     */
    private $_response_data;
    
    /**
     * The CURL_Request_Model that generated this response.
     * 
     * @var Request_Model
     */
    private $_request_model;
    
    /**
     * Constructor for an successful response. This is most often called from 
     * CURL_Response_Model->execute().
     * 
     * @param Request_Model $request_model
     * @param string $response_data
     */
    public function __construct(CURL_Request_Model $request_model, $response_data)
    {
        $this->_request_model = $request_model;
        $this->_response_data = $response_data;
    }
    
    /**
     * The CURL_Request_Model that generated this object as defined by 
     * constructor.
     * 
     * @return Request_Model 
     */
    public function get_request()
    {
        return $this->_request_model;
    }
    
    /**
     * The response data from request or null if no response data exists.
     * 
     * @return mixed
     */
    public function get_data()
    {
        return $this->_response_data;
    }
}