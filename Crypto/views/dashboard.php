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
            <th class="trend-header trend-change">Change</th>
            <th></th>
        </tr>

        <form action="" method="post">
            <?php
                  // while(true) {
                    foreach($_SESSION['coins'] as $coin) {
                      $coin['price'] = "$" . rand(100, 10000);
                      $class = "";
                      if(rand(0, 1)) {
                        $coin['change'] = "+" . rand(1, 10) . "." . rand(1,50) . "%";
                        $class = "change-up";
                      } else {
                        $coin['change'] = "-" . rand(1, 10) . "." . rand(1,50) . "%";
                        $class = "change-down";
                      }
                  ?>
            <tr>
                <td class="trend-name"><?=$coin['name'] . " "?><span class="symbol"><?=$coin['symbol']?></span>
                </td>
                <td><?=$coin['price']?></td>
                <td class="<?=$class?>"><?=$coin['change']?></td>
                <td class="trend-buy"><a href="" class="button-buy">Buy</a></td>
            </tr>
            <?php
                    // }
                    // sleep(100);
                  }
                  ?>
        </form>


    </table>
</div>

<?php
require_once('dash-2.html');