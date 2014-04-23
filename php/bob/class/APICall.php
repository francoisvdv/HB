<?php

/**
 * Description of APICall
 *
 * @author H. Donkers
 */
abstract class APICall
{
	public abstract function exec();
	
	public static function process(APICall $call)
	{
		if($r = $call->exec())
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

?>