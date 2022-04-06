<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');



?>

<h1>News</h1>


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
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_2omr5gpu.json" background="transparent" speed="1"
        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>

<div class="news-flex-container"></div>


<?php
require_once('dash-2.html');
?>

<script>
const newsContainer = document.getElementsByClassName('news-flex-container')[0];
// newsContainer.style.display = 'none';
const loading = document.getElementById('loading');

const http = new XMLHttpRequest();
http.open('GET', 'news-cards.php', true);
http.send();
http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        newsContainer.innerHTML = this.responseText;
        loading.style.display = 'none';
        // newsContainer.style.display = 'block';
    } else {
        console.log('not ok');
    }
}
</script>