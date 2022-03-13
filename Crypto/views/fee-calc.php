<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

$fee = 0.0000;
$amount = 0.0000;

if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['services'])) {
        $service = $_REQUEST['services'];
        $amount = $_REQUEST['amount'];
    
        switch($service) {
            case 'buy':
                $fee = $amount * $_SESSION['rBuy'];
                break;
            case 'sell':
                $fee = $amount * $_SESSION['rSell'];
                break;
            case 'send':
                $fee = $amount * $_SESSION['rSend'];
                break;
            case 'hodl':
                $fee = 0.0000;
                echo "<script>alert('HODL is free!');</script>";
                break;
        }
    }
    else {
        echo "<script>alert('Please select a service.')</script>";
    }
}
?>

<h1>Fee Calculator</h1>

<br>
<form method="POST" action="">
    <br>
    <br>
    <table style="font-size: 1.5rem;">
        <tr>
            <td colspan="2">
                Services<br>
                <select name="services" style="width: 245px;" required>
                    <option selected="true" disabled="disabled" value="0">Select Service</option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                    <option value="send">Send</option>
                    <option value="hodl">Hodl</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td>
                Amount ($) <br>
                <input style="margin-right: 20px;" type="number" name="amount" value="<?=$amount?>" required>
            </td>
            <td>
                Fee ($) <br>
                <input type="text" value="<?=$fee?>" size="20">
            </td>
        </tr>

        <tr>
            <td>
                <input class="button-main" type="submit" name="submit" value="Calculate">
            </td>
        </tr>
    </table>
</form>


<?php
require_once('dash-2.html');