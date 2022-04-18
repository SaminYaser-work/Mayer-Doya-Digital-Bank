<?php
session_start();
require_once('../models/user-crypto-model.php');
$userData = getUserData();
$coinName = getCoinNames();

$out = array_slice($userData, 3);

echo json_encode($out);