<?php

/**
 * return Auth user name
 */
if (!function_exists('getFirstMedia')) {
    function getFirstMedia($class, $collection = 'default')
    {

        return $class->getFirstMedia($collection) ? '<img src="'. $class->getFirstMediaUrl($collection) .'" width="200" height="200" alt="" srcset="">' : '<img alt="" src="'.asset('images/school_logo.svg').'" width="200" height="200" >';
    }
}

/**
 * return Auth user name
 */
if (!function_exists('getFirstMediaUrl')) {
    function getFirstMediaUrl($class, $collection = 'default')
    {

        return $class->getFirstMedia($collection) ? $class->getFirstMediaUrl($collection)  : asset('images/school_logo.svg');
    }
}
