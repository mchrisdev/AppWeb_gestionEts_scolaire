<?php
/**
 * La classe Autoloader est une classe qui permet de charger 
 * des differentes classe 
 */
class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class_name)
    {
        require ('classes/'.$class_name.'.php');
    }
}