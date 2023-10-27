<?php
    session_start();
    include("connection.php");
    include("functions.php");

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
            header("Location: signup.php");
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