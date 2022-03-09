<?php

// require('../../General/views/header.php');

$coins =[
['name' => 'Bitcoin', 'symbol' => 'BTC', 'price' => '', 'change' => ''],
['name' => 'Ethereum', 'symbol' => 'ETH', 'price' => '', 'change' => ''],
['name' => 'Litecoin', 'symbol' => 'LTC', 'price' => '', 'change' => ''],
['name' => 'Bitcoin Cash', 'symbol' => 'BCH', 'price' => '', 'change' => ''],
['name' => 'Ripple', 'symbol' => 'XRP', 'price' => '', 'change' => ''],
['name' => 'Cardano', 'symbol' => 'ADA', 'price' => '', 'change' => ''],
];

$_SESSION['coins'] = $coins;
$_SESSION['count'] = count($coins);
$_SESSION['crypto'] = array();
$_SESSION['balance'] = 0;