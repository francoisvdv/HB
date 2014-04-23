<?php

/**
 * Description of DatabaseConnection
 *
 * @author H. Donkers
 */
class DatabaseConnection
{
	protected $users = array(
		array("name" => "huib", "pass" => "pass"),
		array("name" => "francois", "pass" => "hoi"),
	);
	
	public function getUser($name)
	{
		$pass;
		$id;
		foreach($this->users as $key => $u)
			if($u["name"] == $name)
			{
				$pass = $u["pass"];
				$id = $key;
				break;
			}
		
		return new \model\User($id, $name, $pass);
	}
	
	public function userExists($name)
	{
		foreach($this->users as $u)
			if($u["name"] == $name)
				return true;
		
		return false;
	}
}

?>