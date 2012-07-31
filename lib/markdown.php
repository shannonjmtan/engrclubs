<?php

class Markdown
{
    private static function get_package_location()
    {
        return dirname(dirname(__FILE__)).'/package/php-markdown';
    }
    
    public static function format($text)
    {
        include_once(self::get_package_location().'/markdown.php');
        return Markdown($text);
    }
}