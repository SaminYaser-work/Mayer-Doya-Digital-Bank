<?php

$startingBalance = 50000;

function check_user_data() {
    if(isNewUser()) insertNewUserData();
}

function write_new_user_data($filePath) {
    $_SESSION['userData'] = [$_SESSION['username'], $GLOBALS['startingBalance']];
    write_zero($_SESSION['count']);

    $file = fopen($filePath, "a");
    fwrite($file, implode(',', $_SESSION['userData']) . "\r\n");

    $_SESSION['balance'] = $GLOBALS['startingBalance'];
    fclose($file);
}

function write_zero($count) {
    for($i = 0; $i < $count; $i++) {
        array_push($_SESSION['userData'], 0);
    }
}

function update_user_data($filePath, $userData) {
    $file = fopen($filePath, "r");
    $username = $_SESSION['username'];
    $content = "";
    while(!feof($file)) {
        $line = fgets($file);
        if($line == "") {
            continue;
        }

        $arrUser = explode(',', $line);

        if($arrUser[0] == $username) {
            $line = implode(',', $userData);
        }

        $content .= $line;
    }
    fclose($file);

    $file = fopen($filePath, "w");
    fwrite($file, $content . "\r\n");
    fclose($file);
}

function write_new_misc_data($filePath) {

    if($_SESSION['hasCard'] == false) {
        $file = fopen($filePath, "a");
        fwrite($file, implode(',', $_SESSION['miscData']) . "\r\n");
        fclose($file);
        $_SESSION['hasCard'] = true;
    }
    else {
        echo "<script>alert('You already have a card.')</script>";
    }
}

function check_misc_user_data($filePath) {
    if(!isset($_SESSION['username'])) {
        echo "<script>username not set</script>";
        exit();
    }

    $file = fopen($filePath, "r");
    $username = $_SESSION['username'];
    $isFound = false;

    while(!feof($file)) {
        $line = fgets($file);
        if($line == "") {
            continue;
        }
        $arrUser = explode(',', $line);

        if($arrUser[0] == $username) {
            $_SESSION['miscData'] = $arrUser;
            $_SESSION['hasCard'] = true;
            break;
        }
    }
    fclose($file);
}