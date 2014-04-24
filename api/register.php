<?php
require "../php/bob/bootstrap.php";

//$call = new \api\RegisterAPICall($_GET['user'], $_GET['pass']);
$call = new \api\RegisterAPICall("huib", "pass");

\api\APICall::process($call);