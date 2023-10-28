<?php
    session_start();
    include("connection.php");
    include("functions.php");
    check_logout($con);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name= $_POST["user_name"];
        $password=$_POST["password"];

        if(!empty($user_name)&&!empty($password)&&!is_numeric($user_name)){
            $query="select * from users where user_name = '$user_name' limit 1";
            
            
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0)
                {
    
                    $user_data = mysqli_fetch_assoc($result);
                    if(password_verify($password, $user_data['password'])){
                        $_SESSION['user_name']=$user_data['user_name'];
                        $_SESSION['uid']=$user_data['uid'];
                        header("Location: index.php");
                        die;
                    }
                }
            }

            $_SESSION['status']= "Wrong username or password!";
        }else{
            $_SESSION['status']= "Please enter some valid information!";
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h2>Login</h2>
            <p>Username:</p>
            <input class="text" type="text" name="user_name">
            <p>Password:</p>
            <input class="text" type="password" name="password">

            <input id="button" type="submit" value="Login">

            <p style="text-align:center"><a href="signup.php"> Click to sign up!</a></p>
        </form>
    </div>
</body>
</html>