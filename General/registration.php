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
    <Html>

    <head>
        <title>
            Registration Page
        </title>
    </head>

    <br>
    <br>
    <form>

        <label> Firstname </label>
        <input type="text" name="firstname" size="15" /> <br> <br>
        <label> Lastname: </label>
        <input type="text" name="lastname" size="15" /> <br> <br>

        <label>
            Course :
        </label>
        <select>
            <option value="Course">Course</option>
            <option value="BCA">BCA</option>
            <option value="BBA">BBA</option>
            <option value="B.Tech">B.Tech</option>
            <option value="MBA">MBA</option>
            <option value="MCA">MCA</option>
            <option value="M.Tech">M.Tech</option>
        </select>

        <br>
        <br>

        <br> <br>
        Email:
        <input type="email" id="email" name="email" /> <br>
        <br> <br>
        Password:
        <input type="Password" id="pass" name="pass"> <br>
        <br> <br>
        Re-type password:
        <input type="Password" id="repass" name="repass"> <br> <br>
        <input type="button" name="submit" value="Submit" />
    </form>


</body>

</html>