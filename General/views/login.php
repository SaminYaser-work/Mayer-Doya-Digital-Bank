<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body>
    <form action="../controllers/loginCheck.php" method="post">

        Username: <input type="text" name="username" required> <br>
        Password: <input type="password" name="password" required> <br>

        Account Type:
        <select name="accountType">
            <option value="1">Regular</option>
            <option value="2">Investment</option>
            <option value="3">Insurance</option>
            <option value="4">Crypto</option>
        </select>
        <br>

        <input type="submit" name="submitLogin" value="Submit">
    </form>

    <p>Don't have an account? <a href="registration.php">Register Now!</a></p>

</body>

</html>