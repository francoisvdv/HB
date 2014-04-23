<?php

/**
 * Description of AuthAPICall
 *
 * @author H. Donkers
 */
class AuthAPICall extends APICall
{
	protected $user, $pass;
	
	public function __construct($user, $pass)
	{
		$this->user = $user;
		$this->pass = $pass;
	}
	
	public function exec()
	{
		$dbc = Configuration::getDatabaseConnection();
		
		$oUser = $dbc->getUser($this->user);
		
		if($oUser->authenticate($pass))
		{
			return $oUser->sid();
		}
		else
		{
			return false;
		}
	}
}

?>