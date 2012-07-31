<?php

class String
{
    private $_str;
    
    public function __construct($str)
    {
        $this->_str = $str;
    }
    
    public function &strip_slashes()
    {
        $this->_str = stripslashes($this->_str);
        return $this;
    }
    
    public function &strip_tags()
    {
        $this->_str = strip_tags($this->_str);
        return $this;
    }
    
    public function &trim()
    {
        $this->_str = trim($this->_str);
        return $this;
    }
    
    public function is_empty()
    {
        return $this->get_len() == 0;
    }
    
    public function is_email_address()
    {
        $regex = "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum|cat|coop|int|jobs|pro|tel|travel|xxx)\b";
        return preg_match('"'.$regex.'"', $this->_str);
    }
    
    public function get()
    {
        return $this->_str;
    }
    
    public function get_len()
    {
        return strlen($this->_str);
    }
    
    public static function build($str)
    {
        return new String($str);
    }
    
    public static function build_rand($length = 8, $seeds = 'alphanum')
    {
        // Possible seeds
        $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
        $seedings['numeric'] = '0123456789';
        $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
        $seedings['hexidec'] = '0123456789abcdef';

        // Choose seed
        if (isset($seedings[$seeds]))
        {
            $seeds = $seedings[$seeds];
        }

        // Seed generator
        list($usec, $sec) = explode(' ', microtime());
        $seed = (float) $sec + ((float) $usec * 100000);
        mt_srand($seed);

        // Generate
        $str = '';
        $seeds_count = strlen($seeds);

        for ($i = 0; $length > $i; $i++)
        {
            $str .= $seeds{mt_rand(0, $seeds_count - 1)};
        }

        return new String($str);
    }
}