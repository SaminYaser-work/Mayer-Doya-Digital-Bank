<?php

function getMiscCon() {
    $con = mysqli_connect('localhost', 'root', '', 'wtProjectDB');
    return $con;
}

function getMiscData() {
    $sql = "SELECT * FROM misc WHERE username = '" . $_SESSION['username'] . "'";
    $result = mysqli_query(getMiscCon(), $sql);
    return mysqli_num_rows($result) ? mysqli_fetch_assoc($result) : false;
}

function hasCard() {
    if($data = getMiscData()) {
        return $data['HASCARD'] == 1;
    }
    else {
        return false;
    }
}

function insertMiscData($houseno, $street, $city) {
    $sql = "INSERT INTO `misc`(`ID`, `USERNAME`, `HOUSE`, `STREET`, `CITY`, `HASCARD`) VALUES (DEFAULT,'{$_SESSION['username']}','{$houseno}','{$street}','{$city}',0)";
    mysqli_query(getMiscCon(), $sql);
}

function updateMiscData($houseno, $street, $city) {
    $sql = "UPDATE `misc` SET `HOUSE`={$houseno},`STREET`='{$street}',`CITY`='{$city}', `HASCARD`=1 WHERE `USERNAME`='{$_SESSION['username']}'";
    if($houseno != 0 && $street != '' && $city != '') {
        return mysqli_query(getMiscCon(), $sql) ? true : false;
    }
    return false;
}

function checkMiscData() {
    if(!getMiscData()){
        insertMiscData(0,"", "");
    }
}