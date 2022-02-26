<?php

session_start();

if(!isset($_COOKIE['status'])) {

    echo "<script>alert('You must login first');
    window.location.href = '../../index.php';
    </script>";
    // header("location: ../../index.php");
}