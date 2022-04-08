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
        default:
            break;
    }
}


?>
<script src="debit.js" defer></script>

<h1>Debit Card</h1>
<img src="../assets/debit.png" alt="" class="img-debit" width="100px">

<p class="text-debit">
    <span class="text-debit-em">Crypto Debit Card</span> connects
    cryptocurrency payment processing company with your crypto wallet.
    It enables you to settle transactions at any merchant that accepts debit cards
    using the funds in your crypto wallet, <span class="text-debit-em">Quick and Hassle-free.</span>
</p>


<div style="margin: 1rem auto; width: 10rem;">
    <input style="margin: 1rem auto; width: 10rem;" id="check-validity" type="submit" class="button-main" name="checkEl"
        value="Check for Eligibility">
</div>

<div class="msg"></div>

<?php
require_once('dash-2.html');