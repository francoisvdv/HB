<?php

/**
 * Description of User
 *
 * @author H. Donkers
 */
namespace model;

class User
{
	protected $id, $pass, $name, $authenticated;
	
	public function __construct($id, $name, $pass)
	{
		$this->id   = $id;
		$this->name = $name;
		$this->pass = $pass;
	}
	
	public function __get($varName)
	{
		switch($varName)
		{
			case "id":
				return $this->id;
			case "name":
				return $this->name;
			default:
				trigger_error("variable not accessable");
				break;
		}
	}
	
	public function authenticate($pass)
	{
		if($this->pass == $pass)
		{
			$this->authenticated = true;
		}
		else
		{
			return false;
		}
		
		return true;
	}
	
	public function sid()
	{
		$sess = \DatabaseConnection::newSession($this);
		$sess->user = $this;
		$sess->date = time();
		
		return $sess->getSid();
	}
}

?>