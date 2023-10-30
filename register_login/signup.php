<?php
    session_start();
    include("connection.php");
    include("functions.php");
    check_logout($con);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name= $_POST["user_name"];
        $password=$_POST["password"];
        $password2=$_POST["password2"];

        if(!empty($user_name)&&!empty($password)&&!empty($password2)){
            $query = "select * from users where user_name= '$user_name'";
            $result = mysqli_query($con, $query);
            check_username($result, $user_name);
            check_password($password, $password2);

            $encrypted = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);
            $query="insert into users (user_name, password) values ('$user_name', '$encrypted')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        }else{
            $_SESSION['status']="All fields must be filled in!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>

<?php if(isset($_SESSION['status'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p class="warn">
                        <strong>Warning!</strong> 
                        <?php echo $_SESSION['status']; ?>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php unset($_SESSION['status']);}?>
<div id="box">
        <form method="post">
            <h2>Sign up</h2>

            <p style="display: inline">Username:</p>
            <span class="username_info">?</span>
            <div class="test">
               <p> Username can't contain any special characters or only numbers, 
                and it has to be between 6 and 16 characters!</p>
            </div>
            <input class="text" type="text" name="user_name" maxlength="16">

            <p style="display: inline">Password:</p>
            <span class="password_info">?</span>
            <div class="test2">
                <p>
                Password must be between 8 and 16 characters, and must contain (at least one of each):
                    <br>> Capital letter
                    <br>> Lowercase letter
                    <br>> Number
                    <br>> Special character
                </p>
            </div>
            <input class="text" type="password" name="password" maxlength="16">

            <p>Repeat password:</p>
            <input class="text" type="password" name="password2" maxlength="16">
            
            <input id="button" type="submit" value="Sign up!">

            <p style="text-align:center"><a href="login.php">Click here to log in!</a></p>
        </form>
    </div>  
</body>
</html>