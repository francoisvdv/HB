<?php

require("bootstrap.php");
session_start();

$payment = new Payment();
$payment->setIntent("Sale");

$create = $payment->create($apiContext);
?>