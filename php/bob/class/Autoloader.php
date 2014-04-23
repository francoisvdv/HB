<?php

/**
 * Description of CTE_Autoloader
 *
 * @author H. Donkers
 */

class Autoloader
{
	protected static $_sClassPostfix = ".php";
    /**
     * Registers CTE_Autoloader as an SPL autoloader.
     *
     * @param Boolean $prepend Whether to prepend the autoloader or not.
     */
    public static function register($prepend = false)
    {
        if(version_compare(phpversion(), '5.3.0', '>='))
		{
            spl_autoload_register(array(new self, 'autoload'), true, $prepend);
        }
		else
		{
            spl_autoload_register(array(new self, 'autoload'));
        }
    }
	
    /**
     * Handles autoloading of classes.
     *
     * @param string $class A class name.
     */
    public static function autoload($class)
    {
		if(!preg_match("/^".__NAMESPACE__."/", $class))
		{
			return false;
		}
		
		$reduced_class = preg_replace("/^".__NAMESPACE__."\\\\/", "", $class);
		
		$file = dirname(__FILE__).DIRECTORY_SEPARATOR.str_replace(array("\\", "\0"), array(DIRECTORY_SEPARATOR, ""), $reduced_class).self::$_sClassPostfix;
		
		if(is_file($file))
		{
            require_once $file;
			return true;
        }
		else
		{
			return false;
		}
    }
}
