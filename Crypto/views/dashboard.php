<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

$coins = [];

?>

<h1>Home</h1>
<?php
echo "<h2>Welcome, ".$_SESSION['username']."</h2>";
echo "<h2>Your balance is: ".$_SESSION['balance']."</h2>";

?>


<div class="trend">
    <table>
        <tr>
            <th class="trend-header trend-name">Name</th>
            <th class="trend-header trend-price">Last Price</th>
            <th class="trend-header trend-change">Change</th>
            <th></th>
        </tr>

        <form action="" method="post">
            <?php

            require_once('../controllers/fetch-price.php');
            $data = callAPI("../models/api-key.txt");
            foreach($data->data as $coin) {
                array_push($coins, ['name' => $coin->name, 'symbol' => $coin->symbol, 'price' => $coin->quote->BDT->price, 'change' => $coin->quote->BDT->percent_change_24h]);
            }
            
            $_SESSION['coins'] = $coins;
            $_SESSION['count'] = count($coins);
            $_SESSION['crypto'] = array();
            foreach($_SESSION['coins'] as $coin) {
              $class = "";
              if($coin['change'] >= 0) {
                $class = "change-up";
              } else if($coin['change'] < 0) {
                $class = "change-down";
              }
                  ?>
            <tr>
                <td class="trend-name"><?=$coin['name'] . " "?><span class="symbol"><?=$coin['symbol']?></span>
                </td>
                <td><?="৳" . number_format($coin['price'], 2, '.', ',')?></td>
                <td class="<?=$class?>"><?=number_format($coin['change'], 2, '.', ',') . "%"?></td>
                <td class="trend-buy"><a href="" class="button-buy">Buy</a></td>
            </tr>
            <?php
                  }
            ?>
        </form>


    </table>
</div>

<?php
require_once('dash-2.html');