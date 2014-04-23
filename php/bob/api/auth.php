<?php
require "../bootstrap.php";

//$call = new \api\AuthAPICall($_GET['user'], $_GET['pass']);
$call = new \api\AuthAPICall("huib", "pass");

\api\APICall::process($call);
