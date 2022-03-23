<?php

if(isset($_REQUEST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    if($pass == $repass) {
        require_once("../models/users-model.php");

        if(isUnique($username, $email)) {
            if(reg($firstname, $lastname, $username, $email, $pass)) {
                header("Location: ../views/registration.php?msg=regSuccess");
            } else {
                header("Location: ../views/registration.php?msg=regFailed");
            }
        } 
        else {
            header("Location: ../views/registration.php?msg=duplicate");
        }

        // echo "<script>alert('Registration successful');</script>";
        // echo "<a href='../views/login.php'>Log in to Your New Account.</a>";
        // header('Location: login.php');
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }

}