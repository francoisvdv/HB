<?php

/**
 * Description of APICall
 *
 * @author H. Donkers
 */
namespace api;

abstract class APICall
{
	public abstract function exec(\model\Session $session);
	public abstract function needsIdentification();
	
	public static function process(APICall $call, $sid = null)
	{
		$sess = null;
		
		if($call->needsIdentification() and !\model\Session::exists($sid))
		{
			http_response_code(502);
			echo json_encode(array("error"=>"user not identified"));
		}
		else
		{
			if(\model\Session::exists($sid))
			{
				$sess = \model\Session::get($sid);
			}
			else
			{
				$sess = new \model\Session();
			}
			
			if(($r = $call->exec($sess)) !== false)
			{
				http_response_code(200);
				echo json_encode($r);
			}
			else
			{
				http_response_code(502);
				echo json_encode($r);
			}
		}
	}
}

?>