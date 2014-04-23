<?php
require "../bootstrap.php";

$call = new AuthAPICall($_GET['user'], $_GET['pass']);

APICall::process($call);