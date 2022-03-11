<?php

function getNews($filePath) {

    $myAPIKey = file_get_contents($filePath);
    // $myAPIKey = 'eb2d9931bab643599786bfb1ef37ed6e';

    $request = 'https://newsapi.org/v2/everything?q=Cryptocurrency&apiKey=' . $myAPIKey;
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $request,     
      CURLOPT_RETURNTRANSFER => 1  
    ));
    
    $response = curl_exec($curl);


    curl_close($curl);
    return json_decode($response);

    // Testing
    // print_r(json_decode($response));
    // $data = json_decode($response);
    // foreach($data->articles as $article) {
    //     echo $article->title;
    //     echo "\n";
    //     echo $article->description;
    //     echo "\n";
    //     echo $article->url;
    //     echo "\n";
    //     echo $article->urlToImage;
    //     echo "\n";
    //     echo $article->publishedAt;
    //     echo "\n";
    //     echo "\n";
    // }
}
?>