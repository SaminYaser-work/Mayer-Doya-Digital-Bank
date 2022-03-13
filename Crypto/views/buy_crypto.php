<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

$coins = ["BTC","ETH","XRP","LTC","BCH","DOGE","XMR","ADA","DOT","USDT"];

$sym = "";
if(isset($_POST['buy'])) {
    $sym = $_REQUEST['sym'];
}

$bResult = "";
$sResult = "";
$price = 0;
$fee = 0;


if(isset($_POST['bcalc'])) {
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
            <div class="table-controls">
                <input type="submit" class="button-main" name="bconfirm" value="Confirm">
                <input type="submit" class="button-cancel" name="bcancel" value="Cancel">
            </div>
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
    $sResult = "";
    $_SESSION['sym'] = "";
    $_SESSION['total'] = 0;
}

if(isset($_POST['bsell'])) {
    $sym = $_REQUEST['coins'];
    $amount = $_REQUEST['amount'];
    $_SESSION['amount'] = $amount;

    for ($i=0; $i < $_SESSION['count']; $i++) { 
        if($coins[$i] == $sym) {
            if($amount > $_SESSION['userData'][$i + 2]) {
                echo "<script>alert('Amount is larger than your inventory.')</script>";
                reset_data();
                sleep(1);
                header('location: ' . $_SERVER['PHP_SELF']);
            }
        }
    }

    require_once('../controllers/fetch-price.php');
    $data = getPrice("../models/price-api.txt");

    foreach($data as $coin) {
        if($coin->symbol == $sym) {
            $price = $coin->price * $amount;
        }
    }

    $fee = $price * $_SESSION['rSell'];
    $_SESSION['total'] = $price - $fee;

    $_SESSION['sym'] = $sym;
    $sResult = '
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
            <div class="table-controls">
                <input class="button-main" type="submit" name="sconfirm" value="Confirm">
                <input class="button-cancel" type="submit" name="bcancel" value="Cancel">
            </div>
        </form>
    ';
}

if(isset($_POST['sconfirm'])) {
    $_SESSION['balance'] += $_SESSION['total'];
    $_SESSION['userData'][1] = $_SESSION['balance'];

    for ($i=0; $i < $_SESSION['count']; $i++) { 
        if($coins[$i] == $_SESSION['sym']) {
            $_SESSION['userData'][$i + 2] = $_SESSION['userData'][$i + 2] - $_SESSION['amount'];
        }
    }
    reset_data();
    require_once('../controllers/get-user-data.php');
    update_user_data("../models/user-crypto.txt", $_SESSION['userData']);
}

?>

<h1>Buy & Sell</h1>

<Fieldset>
    <legend>Your Wallet</legend>

    <table class="table-fee">
        <tr>
            <th width="320px">Coin</th>
            <th width="320px">Amount</th>
        </tr>
        <?php
    for ($i=0; $i < $_SESSION['count']; $i++) { 
    ?>

        <tr>
            <td align="middle" style="font-weight: bold;"><?=$coins[$i]?></td>
            <td align="middle"><?=$_SESSION['userData'][$i + 2]?></td>
        </tr>

        <?php
    }
    ?>
    </table>
</Fieldset>

<fieldset>
    <legend>Buy</legend>
    <form action="" method="post">
        <table class="table-controls">
            <tr>
                <th>
                    Currency
                </th>
                <td>
                    <select name="coins" id="">
                        <?php
                        foreach($coins as $coin) {
                            ?>
                        <option value="<?=$coin?>" <?php if($coin == $sym){echo "selected";}?>><?=$coin?></option>
                        <?php
                        }
            
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th>
                    Amount
                </th>
                <td>
                    <input type="number" name="amount" step="0.001" placeholder="0.000" min="0.001" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="middle">
                    <input style="margin: 1rem 0;" type="submit" class="button-main" name="bcalc" value="Buy">
                </td>
            </tr>
        </table>
        <!-- <br> -->
        <!-- <br> -->
    </form>
    <?php echo $bResult; ?>
</fieldset>

<fieldset>
    <legend>Sell</legend>
    <form action="" method="post">
        <table class="table-controls">
            <tr>
                <th>
                    Currency
                </th>
                <td>
                    <select name="coins" id="" required>
                        <option disabld selected hidden value="">--- Select a Currency ---</option>
                        <?php
                        for ($i=0; $i < $_SESSION['count']; $i++) { 
                            if($_SESSION['userData'][$i + 2] > 0) {
                        ?>
                        <option value="<?=$coins[$i]?>"><?=$coins[$i]?></option>
                        <?php  
                           }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th>
                    Amount
                </th>
                <td>
                    <input type="number" name="amount" step="0.001" placeholder="0.000" min="0.001" required>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="middle">
                    <input style="margin: 1rem 0;" type="submit" class="button-main" name="bsell" value="Sell">
                </td>
            </tr>
        </table>
    </form>
    <?php echo $sResult; ?>
</fieldset>



<?php
require_once('dash-2.html');