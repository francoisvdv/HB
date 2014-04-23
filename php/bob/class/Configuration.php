<?php

/**
 * Description of Configuration
 *
 * @author H. Donkers
 */
class Configuration
{
	public static function init()
	{
		
	}
	
	public static function getDatabaseConnection()
	{
		static $c;
		
		if($c === null)
			$c = new DatabaseConnection("name", "pass", "database");
		
		return $c;
	}
	
	public static function getSessionDir()
	{
		return realpath(__DIR__ . "/../session/");
	}
}

?>