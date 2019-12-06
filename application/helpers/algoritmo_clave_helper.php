<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 function hash_clave($cadena='')
{
    $res = strrev($cadena);
    $salt = "&hHkssl%&&sfMN230==??wdsf";
    $cadenaSalt = $res.$salt;
    $crypt = sha1($cadenaSalt);
    $invertido = strrev($crypt);
    return $invertido;
}

function aleatorio($long)
{
    $caracteres = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    $num_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for($i = 0; $i < $long; $i++)
    {
        $string_aleatorio .= $caracteres[rand(0, $num_caracteres - 1)];
    }
    return $string_aleatorio;
}