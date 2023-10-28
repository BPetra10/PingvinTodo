<?php
    session_start();
    include("connection.php");
    include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Hello! </h1>
    <p>You are logged in as <?php echo $_SESSION['user_name'] ?></p>
</body>
</html>