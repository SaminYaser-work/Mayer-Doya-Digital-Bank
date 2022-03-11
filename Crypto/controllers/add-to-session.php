<?php

$coins = array();
$coins = ["BTC","ETH","XRP","LTC","BCH","DOGE","XMR","ADA","DOT","USDT"];
$GLOBALS['coins'] = $coins;
$_SESSION['crypto'] = $coins;
$_SESSION['count'] = count($coins);
$_SESSION['time'] = time();
$_SESSION['balance'] = 0;
$_SESSION['rBuy'] = 0.01;
$_SESSION['rSell'] = 0.05;
$_SESSION['rSend'] = 0.02;
$_SESSION['total'] = 0;
$_SESSION['userData'] = array();
$_SESSION['sym'] = "";
$_SESSION['amount'] = 0;