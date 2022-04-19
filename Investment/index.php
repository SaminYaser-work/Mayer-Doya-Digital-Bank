<?php

require_once('../General/views/header.php');
require_once('controllers/add-to-session.php');
//require_once('controllers/get-user-data.php');
//require_once('models/user-crypto-model.php');
//require_once('models/misc-data-model.php');
require_once('models/investment_model.php');
checkNewUser();



header('location: views/dashboard.php');
