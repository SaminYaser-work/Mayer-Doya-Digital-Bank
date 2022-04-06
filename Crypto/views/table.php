<?php
echo '
<div class="trend">
    <table>
        <tr>
            <th class="trend-header trend-name">Name</th>
            <th class="trend-header trend-price">Last Price</th>
            <th class="trend-header trend-change">Change [1h]</th>
            <th></th>
        </tr>
        ';

            require_once('../controllers/fetch-price.php');
            $data = getPrice('../models/price-api.txt');

            foreach($data as $coin) {
              $class = "";
              if($coin->{'1h'}->price_change_pct >= 0) {
                $class = "change-up";
              } else {
                $class = "change-down";
              }
                $logo =  $coin->logo_url;
                $name = $coin->name . " ";
                $symbol = $coin->symbol;
                $price = "৳" . number_format($coin->price, 2, '.', ',');
                $change = number_format($coin->{'1h'}->price_change_pct, 4, '.', ',') . "%";
        echo <<<END
        <tr>
            <td class="trend-name" style="height: 40px;">
                <img src="${logo}" alt="logo" width="20px" style="vertical-align: baseline;">
                {$name}
                <span class="symbol">${symbol}</span>
        </td>

<td>${price}</td>
<td class="${class}">${change}</td>
<form action="buy_crypto.php?sym=${symbol}" method="post">
    <td class="trend-buy"><input type="submit" name="buy" value="Buy" class="button-buy"></td>
</form>
</tr>
END;
}
echo '
</table>
</div>
';


echo '
<fieldset>
    <legend>News</legend>
';
        require_once('../controllers/fetch-news.php');
    
        $data = getNews("../models/news-api.txt");
    
echo <<<END
<div class="news-flex-container">
END;
        $limit = 0;
    foreach($data->articles as $article) {
        $url = $article->url;
        $title = $article->title;
        $description = $article->description;
        $image = $article->urlToImage;


echo <<<END
<div class="card-wrapper">
    <div class="card">
        <div class="image-wrapper">
            <a class="image-link" href="${url}">
<img class="news-img" src='${image}' alt='news image'>
<a />
</div>
<div class="text-box-wrapper">
    <div class="text-box">
        <h2 class="heading">
            ${title}
        </h2>
<div class="heading-line">

</div>

<p class="text">
    ${description}
</p>
</div>
</div>

<div class="button-wrapper">
    <a class="button" target="_blank" href="${url}">
Read More
</a>
</div>
</div>
</div>
END;

        $limit++;
        if($limit >= 5) {
            $limit = 0;
            break;
        }
    }

echo <<<END
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
END;