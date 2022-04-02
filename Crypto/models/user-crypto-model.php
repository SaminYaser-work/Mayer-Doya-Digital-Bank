<?php

$startingBalance = 50000;

function getCon() {
    $con = mysqli_connect("localhost", "root", "", "wtProjectDB");
    return $con;
}

function getTable() {
    return "`user-crypto`";
}

function getUserData(){
    $sql = "SELECT * FROM" . getTable() . "WHERE `USERNAME` = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function checkNewUser() {
    if(isNewUser()) {
        insertNewUserData();
    }
}

function getBalance() {
    return getUserData()['BALANCE'];
}

function getCrypto($coin) {
    $row = getUserData();
    return $row[$coin];
}

function getCoinNames() {
    $coins = ["BTC","ETH","XRP","LTC","BCH","DOGE","XMR","ADA","DOT","USDT"];
    return $coins;
}

function updateCrypto($coin, $amount, $isBuy) {
    $total = $isBuy ? getCrypto($coin) + $amount : getCrypto($coin) - $amount;

    $sql = "UPDATE" . getTable() .  "SET " . $coin . " = " . $total . 
           " WHERE USERNAME = '" . $_SESSION['username'] . "'";

    mysqli_query(getCon(), $sql);
}

function updateBalance($balance){
    $sql = "UPDATE" . getTable() .  "SET `BALANCE` = '" . $balance . 
           "' WHERE username = '" . $_SESSION['username'] . "'";
    mysqli_query(getCon(), $sql);
}

function isNewUser() {
    $sql = "SELECT * FROM" . getTable() .  "WHERE USERNAME = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    return mysqli_num_rows($result) == 0;
}

function insertNewUserData() {
    $sql = "INSERT INTO" . getTable() . "VALUES (DEFAULT, '" . $_SESSION['username'] .
            "', " . $GLOBALS['startingBalance'] . "
            ,0,0,0,0,0,0,0,0,0,0)";

    mysqli_query(getCon(), $sql);
}