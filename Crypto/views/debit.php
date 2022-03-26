<?php
require_once('../../General/views/header.php');

require_once('dash-1.html');

$minimumBalance = 5000;

$msg = "";

if(isset($_GET['msg'])) {
    switch($_GET['msg']) {
        case 'success':
            echo "<script>alert('Successfully updated your data.')</script>";
            break;
        case 'fileUploadError':
            echo "<script>alert('Error uploading file.')</script>";
            break;
        case 'fileTypeError':
            echo "<script>alert('File type not supported.')</script>";
            break;
        case 'fileSizeError':
            echo "<script>alert('File size too large.')</script>";
            break;
        case 'dbUpdateError':
            echo "<script>alert('Error updating database.')</script>";
            break;
        case 'duplicate':
            echo "<script>alert('You already have a card!')</script>";
            break;
        default:
            break;
    }
}


?>

<h1>Debit Card</h1>
<img src="../assets/debit.png" alt="" class="img-debit" width="100px">

<p class="text-debit">
    <span class="text-debit-em">Crypto Debit Card</span> connects
    cryptocurrency payment processing company with your crypto wallet.
    It enables you to settle transactions at any merchant that accepts debit cards
    using the funds in your crypto wallet, <span class="text-debit-em">Quick and Hassle-free.</span>
</p>


<form method="post" style="margin: 1rem auto; width: 10rem;">
    <input type="submit" class="button-main" name="checkEl" value="Check for Eligibility">
</form>

<?php

if(isset($_POST['checkEl'])) {
    require_once('../models/user-crypto-model.php');
    require_once('../models/misc-data-model.php');

    if(hasCard()) {
        $msg = "duplicate";
        header("Location: debit.php?msg={$msg}");
    }
    else if(getBalance() >= $minimumBalance) {
?>
<p class="text-debit">
    <span class="text-debit-em">Congratulations!</span> You are eligible for the Crypto Debit Card. Provide
    necessary infomation below to get your <span class="text-debit-em">Crypto Debit Card.</span>

<fieldset align="middle">
    <legend>Information for Crypto Debit Card</legend>
    <form action="../controllers/debit-form.php" method="post" enctype="multipart/form-data">
        <table style="margin: 0 auto;">
            <style>
            th {
                text-align: left;
            }
            </style>

            <tr>
                <th>
                    First Name
                </th>
                <td>
                    <input type="text" name="firstname" value="<?=$_SESSION['userData']['FIRSTNAME']?>" disabled>
                </td>
                <th>
                    Last Name
                </th>
                <td>
                    <input type="text" name="lastname" value="<?=$_SESSION['userData']['LASTNAME']?>" disabled>
                </td>
            </tr>

            <tr>
                <th>
                    User Name
                </th>
                <td>
                    <input type="text" name="username" value="<?=$_SESSION['userData']['USERNAME']?>" disabled>
                </td>
                <th>
                    Email
                </th>
                <td>
                    <input type="text" name="email" value="<?=$_SESSION['userData']['EMAIL']?>" disabled>
                </td>
            </tr>

            <tr>
                <th>House Number</th>
                <td>
                    <input type="number" name="houseno" min="0" required>
                </td>
                <th>
                    Street Name
                </th>
                <td>
                    <input type="text" name="street" id="" required>
                </td>
            </tr>

            <tr>
                <th>
                    City
                </th>
                <td>
                    <select name="city" id="" required>
                        <option disabled selected>--- Select City ---</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Sylhet">Sylhet</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>Scan of NID</th>
                <td>
                    <input type="file" name="nid" accept="image/jpeg" required>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <sub>(JPG Files only. Not more than 500KB.)</sub>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <input class="button-submit" type="submit" name="submit" value="Submit">
    </form>
</fieldset>

<?php
    } else {

?>

<p class="text-debit">
    <span class="text-debit-em">Sorry!</span> You are not eligible for the Crypto Debit Card.
    <br>
    <span class="text-debit-em">Minimum Balance Required: $<?=$minimumBalance?></span>
</p>

<?php
    }
}

?>


<?php
require_once('dash-2.html');