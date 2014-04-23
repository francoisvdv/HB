<?php

/**
 * Description of AuthAPICall
 *
 * @author H. Donkers
 */
namespace api;

class AuthAPICall extends APICall
{
	protected $user, $pass;
	
	public function __construct($user, $pass)
	{
		$this->user = $user;
		$this->pass = $pass;
	}
	
	public function needsIdentification()
	{
		return false;
	}
	
	public function exec(\model\Session $session)
	{
		$dbc = \Configuration::getDatabaseConnection();
		
		if($dbc->userExists($this->user))
		{
			$oUser = $dbc->getUser($this->user);
			
			if($oUser->authenticate($this->pass))
			{
				$session->user = $oUser;
				$session->date = time();
				
				return array("sid" => $session->getSid());
			}
		}
		
		return array("error" => "wrong credentials");
	}
}

?>