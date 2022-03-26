<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
require_once('../models/user-crypto-model.php');

?>

<h1>Home</h1>
<?php
echo "<h2>Welcome, ".$_SESSION['username']."</h2>";
echo "<h2>Your balance is: ". getBalance() ."</h2>";

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

<fieldset>
    <legend>News</legend>
    <?php
    require_once('../controllers/fetch-news.php');

    $data = getNews("../models/news-api.txt");

    ?>
    <div class="news-flex-container">
        <?php
    $limit = 0;
foreach($data->articles as $article) {
    ?>
        <div class="card-wrapper">
            <div class="card">
                <div class="image-wrapper">
                    <a class="image-link" href="<?=$article->url?>">
                        <img class="news-img" src='<?=$article->urlToImage?>' alt='news image'>
                        <a />
                </div>
                <div class="text-box-wrapper">
                    <div class="text-box">
                        <h2 class="heading">
                            <?=$article->title?>
                        </h2>
                        <div class="heading-line">

                        </div>

                        <p class="text">
                            <?=$article->description?>
                        </p>
                    </div>
                </div>

                <div class="button-wrapper">
                    <a class="button" target="_blank" href="<?=$article->url?>">
                        Read More
                    </a>
                </div>
            </div>
        </div>
        <?php
    $limit++;
    if($limit >= 3) {
        $limit = 0;
        break;
    }
}
?>
    </div>
    <br>
    <style>
    .more-news {
        width: 100%;
        text-align: center;
    }
    </style>
    <div class="more-news"><a href="news.php" class="button-main">More News</a></div>
    <br>
</fieldset>

<?php
require_once('dash-2.html');