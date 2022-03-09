<?php
require_once('../../General/views/header.php');

require_once('dash-1.html');

$minimumBalance = 5000;

?>

<h1>Debit Card</h1>
<img src="../assets/debit.png" alt="" class="img-debit" width="100px">

<p class="text-debit">
    <span class="text-debit-em">Crypto Debit Card</span> connects cryptocurrency payment processing company with your
    crypto wallet.
    It enables you to settle transactions at any merchant that accepts debit cards
    using the funds in your crypto wallet, <span class="text-debit-em">Quick and Hassle-free.</span>
</p>


<form method="post">
    <input type="submit" name="checkEl" value="Check for Eligibility">
</form>

<?php

if(isset($_POST['checkEl'])) {
    if($_SESSION['balance'] >= $minimumBalance) {
        
        ?>
<p class="text-debit">
    <span class="text-debit-em">Congratulations!</span> You are eligible for the Crypto Debit Card.

    <?php
    } else {

        ?>

<p class="text-debit">
    <span class="text-debit-em">Sorry!</span> You are not eligible for the Crypto Debit Card.
    <br>
    <span class="text-debit-em">Minimum Spending Required: $<?=$minimumBalance?></span>
</p>
<?php

    }
}

?>


<?php
require_once('dash-2.html');