<?php

require_once('../General/views/header.php');
require_once('controllers/add-to-session.php');
// require_once('controllers/get-user-data.php');
require_once('models/user-crypto-model.php');
require_once('models/misc-data-model.php');
checkNewUser();
checkMiscData();


header('location: views/dashboard.php');