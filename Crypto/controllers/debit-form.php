<?php
session_start();

$target_dir = "../models/nid/";
$target_file = $target_dir . basename($_FILES["nid"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $msg = "";
    $houseno = (int)$_REQUEST['houseno'];
    $street = trim($_REQUEST['street']);
    $city = $_REQUEST['city'];

    if ($_FILES["nid"]["size"] <= 500000) {
      $check = getimagesize($_FILES["nid"]["tmp_name"]);
      if($check !== false) {
          if($imageFileType == "jpg") {
            if (move_uploaded_file($_FILES["nid"]["tmp_name"], $target_file)) {
                require_once('../models/misc-data-model.php');
                updateMiscData($houseno, $street, $city) ? $msg = "success" : $msg = "dbUpdateError";
            } 
            else {
                $msg = "fileUploadError";
            }
          }
          else {
              $msg = "fileTypeError";
          }
      }
      else {
            $msg = "fileTypeError";
      }
    }
    else {
        $msg = "fileSizeError";
    }

    header("Location: ../views/debit.php?msg={$msg}");
}