<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
require_once('../models/user-crypto-model.php');
require_once('../controllers/show_alert.php');

$msg = "";

if(isset($_GET['msg'])) {
    switch($msg) {
        case 'amountLarger':
            showAlert2("Amount must be larger than 0.");
            break;
    }
}

$coins = getCoinNames();

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
    if(getBalance() >= $_SESSION['total']){
        // $_SESSION['balance'] -= $_SESSION['total'];
        updateBalance(getBalance() - $_SESSION['total']);

        $_SESSION['userData'][1] = $_SESSION['balance'];
    

        updateCrypto($_SESSION['sym'], $_SESSION['amount'], true);

        reset_data();

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

    if(getCrypto($sym) < $amount) {
        $a = getCrypto($sym);
        reset_data();
        showAlert1("Amount is larger than what you own! {$a}, {$sym}, {$amount}.", $_SERVER['PHP_SELF']);
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

    updateBalance(getBalance() + $_SESSION['total']);


    updateCrypto($_SESSION['sym'], $_SESSION['amount'], false);

    reset_data();
}

?>

<h1>Buy & Sell</h1>
<?php
echo "<h2>Your balance is: ". getBalance() ."</h2>";
?>

<!-- Wallet -->
<Fieldset>
    <legend>Your Wallet</legend>

    <table class="table-fee">
        <tr>
            <th width="320px">Coin</th>
            <th width="320px">Amount</th>
        </tr>
        <?php
        $userData = getUserData();
        $coinName = getCoinNames();
        foreach($coinName as $coin) {
        ?>

        <tr>
            <td align="middle" style="font-weight: bold;"><?=$coin?></td>
            <td align="middle"><?=$userData[$coin]?></td>
        </tr>

        <?php
    }
    ?>
    </table>
</Fieldset>

<!-- Buy -->
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
    </form>
    <?php echo $bResult; ?>
</fieldset>


<!-- Sell -->
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
                        foreach($coinName as $coin) {
                            if($userData[$coin] > 0) {
                        ?>
                        <option value="<?=$coin?>"><?=$coin?></option>
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