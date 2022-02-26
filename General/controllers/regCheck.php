<?php

if(isset($_REQUEST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    if($pass == $repass) {
        $file = fopen('../models/users.txt', 'a');
        $write = $username . ',' . $pass . ',' . $firstname . ',' . $lastname . ',' . $email . "\r\n";
        fwrite($file, $write);
        fclose($file);
        echo "<script>alert('Registration successful');</script>";
        echo "<a href='../views/login.php'>Log In</a>";
        // header('Location: login.php');
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }

}