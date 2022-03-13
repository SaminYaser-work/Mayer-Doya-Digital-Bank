<?php
require_once('../../General/views/header.php');

require_once('dash-1.html');

$minimumBalance = 50000;

function checkFile() {
    if($_FILES['file']['size'] <= 102400) {
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if($ext == "jpg") {
            return true;
        } else {
            return -1;
        }
    }
    else return -2;
}

if(isset($_POST['submit'])) {
    $result = checkFile();
    if ($result == -2) {
        echo "<script>alert('File is too large!')</script>";
    }
    else if ($result == -1) {
        echo "<script>alert('File must be a jpg!')</script>";
    }
    else {
        $_SESSION['miscData'] = [$_SESSION['username'], $_REQUEST['houseno'], $_REQUEST['street'], $_REQUEST['city']];
        $_SESSION['hasCard'] = true;

        require_once('../controllers/get-user-data.php');
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
    if($_SESSION['balance'] >= $minimumBalance) {
?>
<p class="text-debit">
    <span class="text-debit-em">Congratulations!</span> You are eligible for the Crypto Debit Card. Provide
    necessary infomation below to get your <span class="text-debit-em">Crypto Debit Card.</span>

<fieldset align="middle">
    <legend>Information for Crypto Debit Card</legend>
    <form action="" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="firstname" value="<?=$_SESSION['userInfo'][2]?>" disabled>
                </td>
                <th>
                    Last Name
                </th>
                <td>
                    <input type="text" name="lastname" value="<?=$_SESSION['userInfo'][3]?>" disabled>
                </td>
            </tr>

            <tr>
                <th>
                    User Name
                </th>
                <td>
                    <input type="text" name="username" value="<?=$_SESSION['userInfo'][0]?>" disabled>
                </td>
                <th>
                    Email
                </th>
                <td>
                    <input type="text" name="email" value="<?=$_SESSION['userInfo'][4]?>" disabled>
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
                    <sub>(JPG Files only. Not more than 100KB.)</sub>
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