<?php

$startingBalance = 10000;

function check_user_data($filePath) {
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
            break;
        }
        $arrUser = explode(',', $line);

        if($arrUser[0] == $username) {
            $_SESSION['balance'] = $arrUser[1];

            for($i = 2; $i < count($arrUser); $i++) {
                $_SESSION['crypto'][$i - 2] = $arrUser[$i];
            }
            $isFound = true;
            break;
        }
    }
    fclose($file);

    if(!$isFound) {
        write_new_user_data($filePath);
    }
}

function write_new_user_data($filePath) {
    $file = fopen($filePath, "a");
    fwrite($file, $_SESSION['username'] . "," . $GLOBALS['startingBalance'] .
             "," . write_zero($_SESSION['count']) . "\r\n");

    $_SESSION['balance'] = $GLOBALS['startingBalance'];
    fclose($file);
}

function write_zero($count) {
    $zero = "";
    for($i = 0; $i < $count; $i++) {
        $zero .= "0,";
    }
    return substr($zero, 0, -1);
}