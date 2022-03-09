<?php

function getPrice($filePath) {
    //Requires curl enabled in php.ini
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
    // $url = 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/listings/latest'; // Sandbox Domain

    $parameters = [
      'start' => '1',
      'limit' => '10',
      'convert' => 'BDT'
    ];

    $myAPIKey = file_get_contents($filePath);
    
    $headers = [
      'Accepts: application/json',
      'X-CMC_PRO_API_KEY: ' . $myAPIKey
    //   'X-CMC_PRO_API_KEY: b54bcf4d-1bca-4e8e-9a24-22ff2c3d462c' // Test API key
    ];

    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL
    
    
    $curl = curl_init(); // Get cURL resource
    // Set cURL options
    curl_setopt_array($curl, array(
      CURLOPT_URL => $request,            // set the request URL
      CURLOPT_HTTPHEADER => $headers,     // set the headers 
      CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));
    
    $response = curl_exec($curl); // Send the request, save the response
    // print_r(json_decode($response)); // print json decoded response

    // $data = json_decode($response);

    curl_close($curl); // Close request
    return json_decode($response);
}

function callAPI($filePath) {

    static $lastRequest;
    $maxRequests = 1;
    if (isset($lastRequest)) {
        $delay = 600 / $maxRequests; // Do not make frequent API calls because me poor 😭
        if ((microtime(true) - $lastRequest) < $delay) {
            // Sleep until the delay is reached
            $sleepAmount = ($delay - microtime(true) + $lastRequest) * (1000 ** 2);
            usleep($sleepAmount);
        }
    }
    $lastRequest = microtime(true);

    return getPrice($filePath);
}
?>