<?php

/**
 * Description of SearchAPICall
 *
 * @author H. Donkers
 */
namespace api;

class SearchAPICall extends APICall
{
	protected $cityfrom, $cityto;
	
	public function __construct($cityfrom, $cityto)
	{
		$this->cityfrom = $cityfrom;
		$this->cityto   = $cityto;
	}
	
	public function needsIdentification()
	{
		return true;
	}
	
	public function exec(\model\Session $session)
	{
		return array("user"=>$session->user->name, "from"=>$this->cityfrom, "to"=>$this->cityto);
	}
}

?>