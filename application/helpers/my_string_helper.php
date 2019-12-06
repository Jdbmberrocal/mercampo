<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: GeorgeCoronel
 * Date: 12/01/2019
 * Time: 11:50
 */

if (!function_exists('_encode')) {

    function _encode($_value)
    {
        $CI =& get_instance();
        return $CI->hashids->encode($_value);
    }

}

if (!function_exists('_decode')) {

    function _decode($_value)
    {
        $CI =& get_instance();
        return $CI->hashids->decode($_value)[0];
    }

}