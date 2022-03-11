<?php
function getPrice($filePath) {
    
  $myAPIKey = file_get_contents($filePath);

  // $crypto = "";

  // foreach($_SESSION['crypto'] as $coin) {
  //   echo $coin;
  //   $crypto .= $coin . ",";
  // }
  // echo $crypto;
  // $crypto = substr($crypto, 0, -1);
  // echo $crypto;

  $crypto = 'BTC,ETH,XRP,LTC,BCH,DOGE,XMR,ADA,DOT,USDT';

  $request= "https://api.nomics.com/v1/currencies/ticker?key=" . $myAPIKey . "&ids=". $crypto . "&interval=1h&convert=BDT&per-page=100&page=1";

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $request,
    CURLOPT_RETURNTRANSFER => 1
  ));
  
  $response = curl_exec($curl); 
  curl_close($curl); 


  return json_decode($response);
}

?>