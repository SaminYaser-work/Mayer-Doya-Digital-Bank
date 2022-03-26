<?php

function getCon() {
    $con = mysqli_connect("localhost", "root", "", "wtProjectDB");
    return $con;
}

function login($username, $password) {
    $sql = "SELECT * FROM general WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['username'] = $username;
        $_SESSION['userData'] = $row;
        foreach($row as $key => $value) {
            array_push($_SESSION['userInfo'], $value);
        }
        return true;
    }
    return false;
}

function reg($firstname, $lastname, $username, $email, $password) {
    $sql = "INSERT INTO `general`(`ID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`)
            VALUES (DEFAULT,'{$username}','{$password}','{$firstname}','{$lastname}','{$email}')";

    if($result = mysqli_query(getCon(), $sql)) {
        return true;
    }
    return false;
}

function isUnique ($username, $email) {
    $sql = "SELECT * FROM general WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query(getCon(), $sql);
    return mysqli_num_rows($result) ? false : true;
}

function getUserData() {
    $sql = "SELECT * FROM general WHERE username = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}