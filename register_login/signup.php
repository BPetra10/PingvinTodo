<?php
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div id="box">
        <form method="post">
            <h2>Sign up</h2>

            <p>Username:</p>
            <input class="text" type="text" name="user_name" maxlength="16">

            <p>Password:</p>
            <input class="text" type="password" name="password" maxlength="16">

            <p>Repeat password:</p>
            <input class="text" type="password" name="password2" maxlength="16">
            
            <input id="button" type="submit" value="Sign up!">

        </form>
    </div>  
</body>
</html>