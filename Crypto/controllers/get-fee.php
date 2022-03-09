<?php

require_once('../../General/views/header.php');

$fee = 0.0000;

if(isset($_POST['submit'])) {
    echo "<h1>Fee Calculator</h1>";
    $service = $_REQUEST['services'];
    $amount = $_REQUEST['amount'];
    echo "<script>alert('$service');</script>";

    switch($service) {
        case 'buy':
            $fee = $amount * 0.01;
            break;
        case 'sell':
            $fee = $amount * 0.05;
            break;
        case 'send':
            $fee = $amount * 0.02;
            break;
        case 'hodl':
            echo "There is no fee for hodling";
            break;
    }
}