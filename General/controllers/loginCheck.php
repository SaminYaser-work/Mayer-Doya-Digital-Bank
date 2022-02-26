<?php

if(isset($_REQUEST['submitLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $accountType = trim($_POST['accountType']);

    $file = fopen('../models/users.txt', 'r');
    while(!feof($file)) {
        $line = fgets($file);
        $user = explode(',', $line);
        if(trim($user[0]) == $username && trim($user[1]) == $password) {

            // $_SESSION['username'] = $username;
            // $_SESSION['accountType'] = $accountType;

            setcookie('status', 'true', time() + 3600, "/");
            fclose($file);
            $location = "../../" .  getAccountType($accountType) . "/index.php";
            // echo "<script>alert('Login successful');</script>";
            header("location: " . $location);
        }
    }
    fclose($file);

    echo "<script>alert('Invalid username or password');</script>";
    echo "Invalid username or password<br>";
    echo "<a href='../views/login.php'>Try again</a>";

}

function getAccountType($accountType) {
    switch($accountType) {
        case 1:
            return 'Regular';
        case 2:
            return 'Investment';
        case 3:
            return 'Insurance';
        case 4:
            return 'Crypto';
    }
}