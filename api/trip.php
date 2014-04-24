<?php
require "../php/bob/bootstrap.php";

//$call = new \api\TripAPICall($_GET['tripid']);
//\api\APICall::process($call, $_GET['sid']);

$call = new \api\TripAPICall("abc");
\api\APICall::process($call, "56caacb1dd6f602cbc0d66563136aeb41e69d357");