<?php

/**
 * Class definition for URL.
 * 
 * @package foundation
 * @author Eric Bollens
 * @version 20120111
 * @copyright Copyright (c) 2012 UC Regents
 */

/**
 * Utility class for generating system URLs.
 * 
 * @package foundation
 * @see Router
 */
class URL
{
    public static function mvc($controller_name = false, $method_name = false, $method_arguments = array())
    {
        global $CONFIG;
        
        $url = isset($CONFIG->url) ? $CONFIG->url : '';
        
        if(!is_array($method_arguments))
            $method_arguments = array($method_arguments);
        
        if(func_num_args() > 3)
        {
            $func_args = func_get_args();
            $more_args = array_slice($func_args, 3);
            $method_arguments = array_merge($method_arguments, $more_args);
        }
        
        if(!$controller_name)
            return $url;
        
        $segments = array($controller_name, $method_name ? $method_name : '');
        $segments = array_merge($segments, $method_arguments);
        $segments = array_map('urlencode', $segments);
        
        return $url.'/index.php?'.implode(Router::SEGMENT_SEPARATOR, $segments);
    }
    
    public static function img($name)
    {
        return self::asset('img/'.$name);
    }
    
    public static function asset($name)
    {
        global $CONFIG;
        
        $url = isset($CONFIG->url) ? $CONFIG->url : '';
        
        return $url.'/assets/'.$name;
    }
}
