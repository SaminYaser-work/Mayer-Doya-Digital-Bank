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

<style>
#loading {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}
</style>

<div id="loading">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_sryowwkv.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>

<div id="content">

</div>



<?php
require_once('dash-2.html');
?>

<script type="text/javascript">
const content = document.getElementById('content');
content.style.display = 'none';
const loading = document.getElementById('loading');


const http = new XMLHttpRequest();
http.open('GET', 'table.php', true);
http.send();
http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        content.innerHTML = this.responseText;
        loading.style.display = 'none';
        content.style.display = 'block';
        console.log('ok');
    } else {
        console.log('not ok');
    }
}
</script>