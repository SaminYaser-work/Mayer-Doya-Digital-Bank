<?php

function showAlert1($message, $redirect) {
    echo "<script>alert('$message');
    window.location.href = '$redirect';
    </script>";
}

function showAlert2($message) {
    echo "<script>alert('$message')</script>";
}