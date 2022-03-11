<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');

require_once('../controllers/fetch-news.php');

$data = getNews("../models/news-api.txt");

?>

<h1 class="css-test">News</h1>


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
                <a class="button" href="<?=$article->url?>">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <?php

    $limit++;
    if($limit >= 12) {
        $limit = 0;
        break;
    }
}
?>




</div>


<?php
require_once('dash-2.html');