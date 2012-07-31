<?php

class HTML5
{
    const TIME_DATETIME = 'F j, Y g:i A';
    const TIME_DATE = 'F j, Y';
    const TIME_TIME = 'g:i A';
    
    public static function time($time, $format = HTML5_Element::TIME_DATETIME)
    {
        return '<time datetime="'.date('Y-m-d', $time).'T'.date('H:i:sP', $time).'" pubdate>'.date($format, $time).'</time>';
    }
}