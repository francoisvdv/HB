<?php
require "../bootstrap.php";

$call = new RegisterAPICall($_GET['user'], $_GET['pass']);
$call->process();