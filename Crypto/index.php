<?php

require_once('../General/views/header.php');
require_once('controllers/add-to-session.php');
require_once('controllers/get-user-data.php');
check_user_data("models/user-crypto.txt");
check_misc_user_data("models/misc-data.txt");


header('location: views/dashboard.php');