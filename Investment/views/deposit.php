<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
require_once('../models/investment_model.php');

?>
<?php

$con = mysqli_connect("localhost", "root", "", "wtProjectDB");
$sql = "SELECT * FROM `investment` WHERE USERNAME = '{$_SESSION['username']}'";
$result = mysqli_query(getCon(), $sql);

echo "<table border = '10' align='right'  >";
while ($data = mysqli_fetch_row($result)) {

    echo "<tr>";
    echo "<td> ID </td> <td> USERNAME </td><td> DEPOSIT </td><td> WITHDRAW </td><td> TRANSFAR </td><td> MOBILE BANKING </td>  ";
    echo "</tr>";

    echo "<tr>";
    echo "<td> $data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td>";

    echo "</tr>";
}
echo "</table>";

?>
<h1>Deposit</h1>
<?php
echo "<h1> " . $_SESSION['username'] . "</h1>";
echo "<h2>Account Balance: $" . getBalance() . "</h2>";
?>


<?php


$account = $transaction = $amount = "";
$emptyaccount = $emptytransaction = $emptyamount = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST['account'])) {

        $emptyaccount =   "Please Fill up the account!";
    } else if (empty($_POST['transaction'])) {
        $emptytransaction =   "Please Fill up the transaction!";
    } else if (empty($_POST['amount'])) {
        $emptyamount =   "Please Fill up the amount!";
    } else {

        $account = $_POST['account'];
        $transaction = $_POST['transaction'];
        $amount = $_POST['amount'];


        echo "Succesfully Deposited amount  " . $amount;
    }

    $sql = "INSERT INTO `deposit`(`ID`, `TRANSACTION`, `AMOUNT`) VALUES ('{$account}','{$transaction}','{$amount}')";
    mysqli_query(getCon(), $sql);

    $sql1 = "UPDATE `user-crypto` SET Balance=Balance+'$amount' WHERE USERNAME = '{$_SESSION['username']}'";
    mysqli_query(getCon(), $sql1);

    $sql2 = "UPDATE `investment` SET DEPOSIT=DEPOSIT+'$amount' WHERE USERNAME = '{$_SESSION['username']}'";
    mysqli_query(getCon(), $sql2);

    $sql3 = "INSERT INTO `investment_log`(`date`, `deposit`) VALUES (now(),'{$amount}')";
    mysqli_query(getCon(), $sql3);

    header("Location: deposit.php");
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <style>
        .label {
            position: relative;
            top: -90px;
            right: -630px;
            width: 200px;
            height: 28px;

        }

        .butoon {

            position: relative;
            top: -30px;
            right: -150px;
            width: 200px;
            height: 28px;




        }
    </style>
    <div class="label">
        <label for="serial">Account Id: </label>
        <input type="text" name="account" id="account" class="butoon">
        <?php echo $emptyaccount; ?>


    </div>
    <br>

    <div class="label">

        <label for="testname">Transectaion Code:</label>
        <input type="text" name="transaction" id="transaction" class="butoon">
        <?php echo $emptytransaction; ?>

    </div>

    <br>

    <div class="label">
        <label for="price">Amount:</label>

        <input type="text" name="amount" id="amount" class="butoon">

        <?php echo $emptyamount; ?>
    </div>


    <style>
        .but {
            position: relative;
            top: -70px;
            right: -780px;
            width: 80px;
            height: 28px;

        }
    </style>

    <br>

    <input type="submit" value="Deposit" class="but">

    </div>
</form>




<?php

require_once('dash-2.html');
?>