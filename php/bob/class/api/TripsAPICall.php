<?php

/**
 * Description of TripsAPICall
 *
 * @author H. Donkers
 */
namespace api;

class TripsAPICall extends APICall
{
	public function __construct()
	{
		
	}
	
	public function exec(\model\Session $session)
	{
		return array(
			"trips" => array(
				"abc" =>	array(
					"fromcity" => "Amsterdam",
					"tocity"   => "Eindhoven",
					"amount"   => 500,
					"notifications" => 0,
					"driver"     => array(
						"id"   => $session->user->id,
						"name" => $session->user->name,
					),
					"joined"   => true,
				),
				"def"=>	array(
					"fromcity" => "Amsterdam",
					"tocity"   => "Eindhoven",
					"amount"   => 700,
					"notifications" => 2,
					"driver"   => array(
						"id"     => 1,
						"name"   => "Francois",
					),
					"joined"   => false,
				),
			)
		);
	}

	public function needsIdentification()
	{
		return true;
	}	
}

?>