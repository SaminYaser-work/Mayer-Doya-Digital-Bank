<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
require_once('../models/investment_model.php');

?>

<h1>Mobile Banking</h1>
<?php
echo "<h1>" . $_SESSION['username'] . "</h1>";
echo "<h2>Account balance: $" . getBalance() . "</h2>";
?>


<?php
require_once('dash-2.html');
?>