<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Username: <input type="text" name="username" id=""> <br>
        Password: <input type="password" name="password" id=""> <br>
        Account Type:
        <select>
            <option value="1">Regular</option>
            <option value="2">Investment</option>
            <option value="3">Insurance</option>
            <option value="4.Tech">Crypto</option>
        </select><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <p>Don't have an account? <a href="registration.php">Register Now!</a></p>

</body>

</html>