<?php
session_start();

    require("connection.php");
    require("functions.php");
    
    $user_data=check_login($con);    
?>
<!DOCTYPE html>
<html>
<head>
    <title>PenguinTODO</title>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-main">
                <div class="header-icon">
                    <img src="https://i.ibb.co/YNppMLd/pingvin.png" alt="Penguin Button">
                </div>
                <div class="header-title">
                    <h1>PenguinTODO</h1>
                </div>
            </div>
            <div class ="userinfo">
                <div class="logged-in">
                    <h1>You are logged in as : <?php echo $_SESSION['user_name'];?></h1>

                </div>
                <div class="sign-out">
                <a href="logout.php">You want to sign out?</a>
                </div>
        </div>
        </div>
    </header>
    <div class="container">
        <h1>Create TODO</h1>
        <h1>Create Note</h1>
    </div>
    <div class="button-container">
        <div class="button">
            <a href="../todo/todo.php">+</a>
        </div>
        <div class="button">
            <a href="#">+</a>
        </div>
    </div>
</body>
</html>