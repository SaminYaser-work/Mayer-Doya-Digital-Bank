<?php

function show_alert($message, $redirect) {
    echo "<script>alert('$message');
    window.location.href = '$redirect';
    </script>";
}