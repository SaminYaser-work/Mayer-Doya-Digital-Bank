<?php
require_once('../../General/views/header.php');
require_once('dash-1.html');
?>

<script src="fee.js" defer></script>

<h1>Fee Calculator</h1>

<br>
<form method="POST" action="">
    <br>
    <br>
    <table style="font-size: 1.5rem;">
        <tr>
            <td colspan="2">
                Services<br>
                <select id="services" name="services" style="width: 245px;" required>
                    <option selected="true" disabled="disabled" value="0">Select Service</option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                    <option value="send">Send</option>
                    <option value="hodl">Hodl</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td>
                Amount ($) <br>
                <input id="amount" style="margin-right: 20px;" type="number" name="amount" required>
            </td>
            <td>
                Fee ($) <br>
                <input id="fee" type="text" size="20">
            </td>
            <td id="loading">
                <br>
                <span>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_Stt1R6.json"
                        background="transparent" speed="1" style="width: 30px; height: 30px;" loop autoplay>
                    </lottie-player>
                </span>
            </td>
        </tr>

        <tr>
            <td>
                <input class="button-main" type="submit" name="submit" value="Calculate">
            </td>
        </tr>
    </table>
</form>


<?php
require_once('dash-2.html');