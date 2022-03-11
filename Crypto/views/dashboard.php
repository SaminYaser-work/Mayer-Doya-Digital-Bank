<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

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
            <th class="trend-header trend-change">Change [1h]</th>
            <th></th>
        </tr>

        <?php

            require_once('../controllers/fetch-price.php');
            $data = getPrice('../models/price-api.txt');

            foreach($data as $coin) {
              $class = "";
              if($coin->{'1h'}->price_change_pct >= 0) {
                $class = "change-up";
              } else {
                $class = "change-down";
              }
                  ?>
        <tr>
            <td class="trend-name" style="height: 40px;">
                <img src="<?=$coin->logo_url?>" alt="logo" width="20px" style="vertical-align: baseline;">
                <?=$coin->name . " "?>
                <span class="symbol"><?=$coin->symbol?></span>
            </td>
            <td><?="৳" . number_format($coin->price, 2, '.', ',')?></td>
            <td class="<?=$class?>"><?=number_format($coin->{'1h'}->price_change_pct, 4, '.', ',') . "%"?></td>
            <form action="buy_crypto.php?sym=<?=$coin->symbol?>" method="post">
                <td class="trend-buy"><input type="submit" name="buy" value="Buy" class="button-buy"></td>
            </form>
        </tr>
        <?php
            }
            ?>


    </table>
</div>

<?php
require_once('dash-2.html');