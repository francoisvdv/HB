<?php

/**
 * Description of RegisterAPICall
 *
 * @author H. Donkers
 */
class RegisterAPICall extends APICall
{
	protected $user, $pass;
	
	public function __construct($user, $pass)
	{
		$this->user = $user;
		$this->pass = $pass;
	}
	
	public function exec()
	{
		
	}
}

?>