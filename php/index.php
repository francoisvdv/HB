<?php
require("PayPal.php");

$apiContext = getApiContext();

$payment = new Payment();
$payment->setIntent("Sale");

$create = $payment->create($apiContext);
?>