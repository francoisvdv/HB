<?php

/**
 * Description of RegisterAPICall
 *
 * @author H. Donkers
 */
namespace api;

class RegisterAPICall extends APICall
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
		trigger_error("Not supported");
	}
}

?>