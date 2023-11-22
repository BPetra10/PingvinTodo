<?php
session_start();

    require_once "connection.php";
    require_once "functions.php";
    
    $user_data=check_login($con);    
?>
<!DOCTYPE html>
<html>
<head>
    <title>PenguinTODO</title>
    <style>
        body {
            background-color: #007991;
             }

        header {
            background-color:#222E50;
            text-align: center;
            padding: 20px 0px 10px 20px;
            border-radius: 30px;
        }

        .header-main {
            display: flex;
        }

        .header-icon {
            width: 150px;
            height: 150px;
            margin-right: 10px;
        }

        .header-icon img {
            width: 100px;
            border-radius: 50%;
        }

        .header-title h1 {
            font-size: 82px;
            font-family: Impact;
            color: #E9D985;
            margin: 0;
            text-decoration: overline;
            padding-left: 20px;
        }
        .userinfo{
            display:grid;
            justify-content: left;
        }
        .logged-in h1{
            font-size: 22px;
            font-family:Georgia, 'Times New Roman', Times;
            color: #E9D985;
        }
        .sign-out{
            justify-self: right;
        }
        .sign-out a{
            font-size: 15px;
            font-family:Georgia, 'Times New Roman', Times;
            color:#fff;
        }

        .container {
            display: flex;
            justify-content: space-evenly;
            background-color: #007991;
        }
        .container h1{
            color: #E9D985;
            font-size: 42px;
            font-family: Impact, fantasy;
            font-weight: 100;
        }

        .button-container {
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            background-color: #007991;

        }

        .button a{
            font-family: Impact, fantasy;
            display: block;
            background-color: #222E50;
            color: #fff;
            padding:50px 100px 50px 100px ;
            text-decoration: none;
            font-size: 150px;
            border-radius: 30px;
        }
    </style>
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
            <a href="../notes/notes.php">+</a>
        </div>
    </div>
</body>
</html>