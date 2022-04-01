<?php
$msg = "";

if(isset($_GET['msg'])) {
    switch($_GET['msg']) {
        case "regFailed":
            // $msg = "<b style='color: red;'>Unable to insert into DB.</b>";
            echo "<script>alert('Unable to insert into DB.');</script>";
            break;
        case "regSuccess":
            $msg = "<b style='color: green;'>Registration successful!</b>
            <br>  <a href='../views/login.php'>Log in to Your New Account.</a>";
            break;
        case "duplicate":
            // $msg = "<b style='color: red;'>Username or Email already exists. Please use a different one.</b>";
            echo "<script>alert('Username or Email already exists. Please use a different one.');</script>";
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
    <link rel="stylesheet" href="login.css">
    <script src="reg.js" defer></script>
    <title>Registration</title>
</head>

<body>

    <img class="logo" src="../assets/logo2.png" alt="logo" width="500px">

    <div class="container">
        <div class="box">
            <form method="post" action="../controllers/regCheck.php">
                <div class="label"> First Name </div>
                <div class="input-container">
                    <input class="input-field" type="text" name="firstname">
                </div>

                <div class="label"> Last Name </div>
                <div class="input-container">
                    <input class="input-field" type="text" name="lastname">
                </div>

                <div class="label"> Username </div>
                <div class="input-container">
                    <input class="input-field" type="text" name="username">
                </div>

                <div class="label"> Email </div>
                <div class="input-container">
                    <input class="input-field" type="email" name="email">
                </div>

                <div class="label"> Password </div>
                <div class="input-container">
                    <input class="input-field" type="password" name="pass">
                </div>

                <div class="label"> Retype Password </div>
                <div class="input-container">
                    <input class="input-field" type="password" name="repass">
                </div>

                <input class="button" type="submit" name="submit" value="Register">
            </form>
            <br>
            <div><?= $msg ?></div>
            <div class="text-center">
                <p class="label label-sub">Already have an account? <a href="login.php">Log In</a></p>
            </div>
        </div>
    </div>
</body>

</html>