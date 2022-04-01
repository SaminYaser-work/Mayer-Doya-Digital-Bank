<?php
$msg = "";

if(isset($_GET['msg'])) {
    switch($_GET['msg']) {
        case "loginFailed":
            // $msg = "<b style='color: red; font-size: 15px;'>Invalid username or password. Please try again.</b>";
            echo "<script>alert('Invalid username or password. Please try again.');</script>";
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
    <script src="login.js" defer></script>
    <title>Log In</title>
</head>

<body>

    <img class="logo" src="../assets/logo2.png" alt="logo">

    <div class="container">
        <div class="box">
            <form action="../controllers/loginCheck.php" method="post">

                <div class="label">Username</div>
                <div class="input-container">
                    <input class="input-field" type="text" name="username">
                </div>

                <div class="label">Password</div>
                <div class="input-container">
                    <input class="input-field" type="password" name="password"> <br>
                </div>


                <div class="drop-down">
                    <div class="label">Account Type</div>
                    <select name="accountType">
                        <option value="Crypto">Crypto</option>
                        <option value="Regular">Regular</option>
                        <option value="Investment">Investment</option>
                        <option value="Insurance">Insurance</option>
                    </select>
                </div>

                <input class="button" type="submit" name="submitLogin" value="Login">

            </form>
            <br>
            <div><?= $msg ?></div>

            <div class="text-center">
                <p class="label label-sub">Don't have an account? <a href="registration.php">Register Now!</a></p>
            </div>

        </div>
    </div>

</body>

</html>