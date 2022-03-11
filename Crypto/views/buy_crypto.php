<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

$coins = ["BTC","ETH","XRP","LTC","BCH","DOGE","XMR","ADA","DOT","USDT"];

$sym = "";
if(isset($_POST['buy'])) {
    $sym = $_REQUEST['sym'];
    // $coins = $_SESSION['crypto'];
    // $count = $_SESSION['count'];
    // $balance = $_SESSION['balance'];
    // $time = $_SESSION['time'];
    // $coins[$count] = $sym;
    // $count++;
    // $balance += $data->$sym->price;
}

$bResult = "";
$price = 0;
$fee = 0;


if(isset($_POST['bcalc'])) {
    // $bResult = '<img src="../assets/loading.gif" alt="loading_gif">';

    $sym = $_REQUEST['coins'];
    $amount = $_REQUEST['amount'];
    $_SESSION['amount'] = $amount;

    require_once('../controllers/fetch-price.php');
    $data = getPrice("../models/price-api.txt");

    foreach($data as $coin) {
        if($coin->symbol == $sym) {
            $price = $coin->price * $amount;
        }
    }

    $fee = $price * $_SESSION['rBuy'];
    $_SESSION['total'] = $price + $fee;

    $_SESSION['sym'] = $sym;
    $bResult = '
        <form action="" method="post">
            <table class="table-fee">
            <tr>
                <th>Price</th>
                <th>Fee</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>' . " ৳ " . $price . " " . '</td>
                <td>' . " ৳ " . $fee . " " . '</td>
                <td>' . " ৳ " . $_SESSION['total'] . " " . '</td>
            </tr>
            </table>
            <input type="submit" name="bconfirm" value="Confirm">
            <input type="submit" name="bcancel" value="Cancel">
        </form>
    ';
}

if(isset($_POST['bconfirm'])) {
    if($_SESSION['balance'] >= $_SESSION['total']){
        $_SESSION['balance'] -= $_SESSION['total'];

        $_SESSION['userData'][1] = $_SESSION['balance'];
    
        for ($i=0; $i < $_SESSION['count']; $i++) { 
            if($coins[$i] == $_SESSION['sym']) {
                $_SESSION['userData'][$i + 2] = $_SESSION['userData'][$i + 2] + $_SESSION['amount'];
            }
        }

        reset_data();

        require_once('../controllers/get-user-data.php');
        update_user_data("../models/user-crypto.txt", $_SESSION['userData']);
    }
    else {
        echo "<script>alert('Insufficient Balance')</script>";
    }
}

if(isset($_POST['bcancel'])) {
    reset_data();
}

function reset_data() {
    $bResult = "";
    $_SESSION['sym'] = "";
    $_SESSION['total'] = 0;
}

?>

<h1>Buy & Sell</h1>

<fieldset>
    <legend>Buy</legend>
    <form action="" method="post">
        Currency
        <select name="coins" id="">
            <?php
            foreach($coins as $coin) {
                ?>
            <option value="<?=$coin?>" <?php if($coin == $sym){echo "selected";}?>><?=$coin?></option>
            <?php
            }

            ?>
        </select>
        <br>
        Amount
        <input type="number" name="amount" step="0.001" placeholder="0.000" min="0" required>
        <br>
        <input type="submit" name="bcalc" value="Buy">
    </form>
    <?php echo $bResult; ?>
    <!-- <form action="" method="post">
        <table>
            <tr>
                <th>Price</th>
                <th>Fee</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>$price</td>
                <td>$fee</td>
                <td>$total</td>
            </tr>
            <tr>
                <td><input type="submit" name="bconfirm" value="Confirm"></td>
                <td><button>Cancel</button></td>
            </tr>
        </table>
    </form> -->
</fieldset>



<?php
require_once('dash-2.html');