<?php

require_once('../controllers/fetch-news.php');
$data = getNews("../models/news-api.txt");
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
if($limit >= 10) {
$limit = 0;
break;
}
}