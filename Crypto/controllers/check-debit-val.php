<?php
session_start();
require_once('../models/user-crypto-model.php');
require_once('../models/misc-data-model.php');

sleep(3);

if(hasCard()) {
    echo <<<END
    <p class="text-debit">
        <span class="text-debit-em">Sorry! </span>You already have a <span class="text-debit-em">Crypto Debit Card.</span>
    </p>
    END;
}
else if(getBalance() >= 5000) {
    $firstname = $_SESSION['userData']['FIRSTNAME'];
    $lastname = $_SESSION['userData']['LASTNAME'];
    $username = $_SESSION['userData']['USERNAME'];
    $email = $_SESSION['userData']['EMAIL'];


    echo <<<END
    <p class="text-debit">
        <span class="text-debit-em">Congratulations!</span> You are eligible for the Crypto Debit Card. Provide
        necessary infomation below to get your <span class="text-debit-em">Crypto Debit Card.</span>
    </p>

<fieldset align="middle">
    <legend>Information for Crypto Debit Card</legend>
    <form id="main-form" action="../controllers/debit-form.php" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="firstname" value="${firstname}" disabled>
</td>
<th>
    Last Name
</th>
<td>
    <input type="text" name="lastname" value="${lastname}" disabled>
</td>
</tr>

<tr>
    <th>
        User Name
    </th>
    <td>
        <input type="text" name="username" value="${username}" disabled>
</td>
<th>
    Email
</th>
<td>
    <input type="text" name="email" value="${email}" disabled>
</td>
</tr>

<tr>
    <th>House Number</th>
    <td>
        <input id="houseno" type="number" name="houseno" min="0">
    </td>
    <th>
        Street Name
    </th>
    <td>
        <input type="text" name="street" id="street">
    </td>
</tr>

<tr>
    <th>
        City
    </th>
    <td>
        <select name="city" id="city">
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

<script src="../views/debit2.js" defer></script>

END;
}
else {
    echo <<<END
<p class="text-debit">
    <span class="text-debit-em">Sorry!</span> You are not eligible for the Crypto Debit Card.
    <br>
    <span class="text-debit-em">Minimum Balance Required: 5000></span>
</p>
END;
}