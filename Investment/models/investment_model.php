<?php

$startingBalance = 50000;

function getCon()
{
    $con = mysqli_connect("localhost", "root", "", "wtProjectDB");
    return $con;
}

function getTable()
{
    return "`investment`";
}
function getTable1()
{
    return "`user-crypto`";
   // return "`investment_log`";
}


function getBalance()
{
    return getUserData1()['BALANCE'];
}



function getUserData1()
{
    $sql = "SELECT * FROM" . getTable1() . "WHERE `USERNAME` = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getUserData()
{
    $sql = "SELECT * FROM" . getTable() . "WHERE `USERNAME` = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}


function checkNewUser()
{
    if (isNewUser()) {
        insertNewUserData();
    }
}




function isNewUser()
{
    $sql = "SELECT * FROM" . getTable() .  "WHERE USERNAME = '{$_SESSION['username']}'";
    $result = mysqli_query(getCon(), $sql);
    return mysqli_num_rows($result) == 0;
}

function insertNewUserData()
{

    $sql = "INSERT INTO `investment`(`ID`, `USERNAME`, `DEPOSIT`, `WITHDRAW`, `TRANSFER`, `MB`) VALUES (DEFAULT,'{$_SESSION['username']}',0,0,0,0)";



    mysqli_query(getCon(), $sql);
}

function getLog(){

    $sql = "SELECT * FROM investment_log";
    $result = mysqli_query(getCon(), $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
