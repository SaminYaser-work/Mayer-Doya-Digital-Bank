<?php
$msg = "";

if(isset($_GET['msg'])) {
    switch($_GET['msg']) {
        case "regFailed":
            $msg = "<b style='color: red;'>Unable to insert into DB.</b>";
            break;
        case "regSuccess":
            $msg = "<b style='color: green;'>Registration successful!</b>
            <br>  <a href='../views/login.php'>Log in to Your New Account.</a>";
            break;
        case "duplicate":
            $msg = "<b style='color: red;'>Username or Email already exists. Please use a different one.</b>";
            break;
        default:
            $msg = "";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <form method="post" action="../controllers/regCheck.php">

        <label> Firstname </label>
        <input type="text" name="firstname" required> <br>
        <label> Lastname: </label>
        <input type="text" name="lastname" requried> <br>
        <label> Username: </label>
        <input type="text" name="username" requried> <br>
        Email:
        <input type="email" name="email" requried> <br>
        Password:
        <input type="password" name="pass" required> <br>
        Re-type password:
        <input type="password" name="repass" required> <br> <br>

        <input type="submit" name="submit" value="Submit">

    </form>
    <br>
    <div><?= $msg ?></div>
    <p>Already have an account? <a href="login.php">Log In</a></p>
</body>

</html>