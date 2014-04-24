<?php

/**
 * Description of TripAPICall
 *
 * @author H. Donkers
 */
namespace api;

class TripAPICall extends APICall
{
	protected $tripid;
	
	public function __construct($tripid)
	{
		$this->tripid = $tripid;
	}
	
	public function exec(\model\Session $session)
	{
		return array(
			"id"     => $this->tripid,
			"driver" => array(
				"id"   => 1,
				"name" => "menno",
			),
			"fromcity" => "Amsterdam",
			"tocity"   => "Eindhoven",
			"amount"   => 500,
			"joined"   => false,
			"matches"  => array(
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
			),
			"messages" => array(
				array(
					"time"    => date("Y-m-d H:i:s"),
					"user"    => array(
						"id"     => 1,
						"name"   => "Francois",
					),
					"message" => "I wil mee!",
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