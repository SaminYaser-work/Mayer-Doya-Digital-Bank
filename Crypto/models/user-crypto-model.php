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

// function check_user_data($filePath) {
//     if(!isset($_SESSION['username'])) {
//         echo "<script>username not set</script>";
//         exit();
//     }

//     $file = fopen($filePath, "r");
//     $username = $_SESSION['username'];
//     $isFound = false;

//     while(!feof($file)) {
//         $line = fgets($file);
//         if($line == "") {
//             continue;
//         }
//         $arrUser = explode(',', $line);

//         if($arrUser[0] == $username) {
//             $_SESSION['balance'] = $arrUser[1];
//             $_SESSION['userData'] = $arrUser;
//             $isFound = true;
//             break;
//         }
//     }
//     fclose($file);

//     if(!$isFound) {
//         write_new_user_data($filePath);
//     }
// }

// function write_new_user_data($filePath) {
//     $_SESSION['userData'] = [$_SESSION['username'], $GLOBALS['startingBalance']];
//     write_zero($_SESSION['count']);

//     $file = fopen($filePath, "a");
//     fwrite($file, implode(',', $_SESSION['userData']) . "\r\n");

//     $_SESSION['balance'] = $GLOBALS['startingBalance'];
//     fclose($file);
// }

// function write_zero($count) {
//     for($i = 0; $i < $count; $i++) {
//         array_push($_SESSION['userData'], 0);
//     }
// }

// function update_user_data($filePath, $userData) {
//     $file = fopen($filePath, "r");
//     $username = $_SESSION['username'];
//     $content = "";
//     while(!feof($file)) {
//         $line = fgets($file);
//         if($line == "") {
//             continue;
//         }

//         $arrUser = explode(',', $line);

//         if($arrUser[0] == $username) {
//             $line = implode(',', $userData);
//         }

//         $content .= $line;
//     }
//     fclose($file);

//     $file = fopen($filePath, "w");
//     fwrite($file, $content . "\r\n");
//     fclose($file);
// }

// function write_new_misc_data($filePath) {

//     if($_SESSION['hasCard'] == false) {
//         $file = fopen($filePath, "a");
//         fwrite($file, implode(',', $_SESSION['miscData']) . "\r\n");
//         fclose($file);
//         $_SESSION['hasCard'] = true;
//     }
//     else {
//         echo "<script>alert('You already have a card.')</script>";
//     }
// }

// function check_misc_user_data($filePath) {
//     if(!isset($_SESSION['username'])) {
//         echo "<script>username not set</script>";
//         exit();
//     }

//     $file = fopen($filePath, "r");
//     $username = $_SESSION['username'];
//     $isFound = false;

//     while(!feof($file)) {
//         $line = fgets($file);
//         if($line == "") {
//             continue;
//         }
//         $arrUser = explode(',', $line);

//         if($arrUser[0] == $username) {
//             $_SESSION['miscData'] = $arrUser;
//             $_SESSION['hasCard'] = true;
//             break;
//         }
//     }
//     fclose($file);
// }