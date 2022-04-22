<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
require_once('../models/investment_model.php');

$sql = "SELECT * FROM investment_log";
$result = mysqli_query(getCon(), $sql);
//var_dump($result);
$row = mysqli_fetch_assoc($result);
var_dump($row);
//$data = getLog();
//var_dump($data);

//    foreach ($data as $row){
//        echo $row;
//    }

?>
<!--<html>-->
<home>
    <h1>Transaction Log</h1>
</home>

<table class="table">
    <thead>
    <tr>
        <th scope="col">SL</th>
        <th scope="col">Date</th>
        <th scope="col">Deposit</th>
        <th scope="col">Withdraw</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "wtProjectDB");

    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    
    $sql = "SELECT * FROM investment_log";
    $result = $mysqli -> query($sql);
    
    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);
    
    // Free result set
    foreach($result as $row){

        echo
        '<tr>
        <th scope="row">' . $row['id'] . " " . '</th>
       <td>' . $row['date'] . " " . '</td>
        <td>' . $row['deposit'] . " " . '</td>
        <td>' . $row['withdraw'] . " " . '</td>
           </tr>';
     }
    
    $mysqli -> close();
    

    ?>


    </tbody>
</table>
</html>
<style>
    #loading {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>

<!-- <div id="loading">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_sryowwkv.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>

<div id="content"></div> -->

<?php
require_once('dash-2.html');
?>

<!-- <script type="text/javascript">
    const content = document.getElementById('content');
    const loading = document.getElementById('loading');


    const http = new XMLHttpRequest();
    http.open('GET', 'table.php', true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            content.innerHTML = this.responseText;
            loading.style.display = 'none';
        } else {
            console.log('not ok');
        }
    }
</script> -->