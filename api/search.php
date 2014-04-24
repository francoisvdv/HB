<?php
require "../php/bob/bootstrap.php";

//$call = new \api\SearchAPICall($_GET['sid'], $_GET['cityfrom'], $_GET['cityto']);
//\api\APICall::process($call, $_GET['sid']);

$call = new \api\SearchAPICall("Amtserdam", "Eindhoven");

\api\APICall::process($call, "56caacb1dd6f602cbc0d66563136aeb41e69d357");