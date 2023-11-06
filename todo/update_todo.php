<?php
session_start();

require("../register_login/connection.php");
require("../register_login/functions.php");

$user_data=check_login($con);      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update todo</title>
    <link rel="stylesheet" href="update_todo.css">
    <style>
        .alert{
            text-align: center;
            color: white;
            font-weight: bold;
            padding-top: 0.5em;
            font-size: xx-large;
        }
        span{
            background-color: crimson;
            border-radius: 0.2em;
        }
    </style>
</head>
<body>
<h1 class="site_title" style="padding-top: 0.5em;">TODO List Update</h1>
<p class="data">You are logged in as : <?php echo $_SESSION['user_name'];?> &nbsp; 
<a href="../register_login/logout.php" class="data">You want to sign out?</a></p>
<div class="container">
    <form method="post">
        <div class="input-container">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="task" id="task">
            <button type="submit" name="update_row" id="btn">UPDATE</button>
        </div>
    </form>
</div>
</body>
</html>