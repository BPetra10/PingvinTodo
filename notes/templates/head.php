<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="templates\style.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</head>
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
                    <h1>You are logged in as :<?php echo $_SESSION['user_name'];?></h1>

                </div>
                <div class="sign-out">
                <a href="../register_login/logout.php">You want to sign out?</a>

                </div>
        </div>
        </div>
    </header>