<?php

session_start();
$_SESSION['username'] = "";
$_SESSION['userInfo'] = array();

if(isset($_REQUEST['submitLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $accountType = $_POST['accountType'];

    require_once("../models/users-model.php");

    if(login($username, $password)) {
        setcookie('status', 'true', time() + 3600, "/");
        $location = "../../" .  $accountType . "/index.php";
        header("location: " . $location);
    } else {
        header("Location: ../views/login.php?msg=loginFailed");
    }

    // echo "<script>alert('Invalid username or password');</script>";
    // echo "Invalid username or password<br>";
    // echo "<a href='../views/login.php'>Try again</a>";

}