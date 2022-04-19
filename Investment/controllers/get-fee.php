<?php

require_once('../../General/views/header.php');

sleep(3);

$fee = 0.0000;
$amount = 0.0000;

$service = $_REQUEST['services'];
$amount = $_REQUEST['amount'];
switch($service) {
    case 'buy':
        $fee = $amount * $_SESSION['rBuy'];
        break;
    case 'sell':
        $fee = $amount * $_SESSION['rSell'];
        break;
    case 'send':
        $fee = $amount * $_SESSION['rSend'];
        break;
    case 'hodl':
        $fee = 'HODL is free!';
        break;
}

echo $fee;