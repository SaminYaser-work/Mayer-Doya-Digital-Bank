<?php

// require('../../General/views/header.php');


// $coins = [];

// require_once('fetch-price.php');
// $data = getPrice();
// foreach($data->data as $coin) {
//     array_push($coins, ['name' => $coin->name, 'symbol' => $coin->symbol, 'price' => $coin->quote->USD->price, 'change' => $coin->quote->USD->percent_change_24h]);
// }

// $_SESSION['coins'] = $coins;
// $_SESSION['count'] = count($coins);
// $_SESSION['crypto'] = array();
$_SESSION['time'] = time();
$_SESSION['balance'] = 0;