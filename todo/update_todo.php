<?php
session_start();

require_once "../register_login/connection.php";
require_once "../register_login/functions.php";

$user_data=check_login($con);   

if(isset($_POST["update_row"]))
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $id = $_POST["id"];
    $update = $_POST["task"];
    $same_select = "SELECT tasks FROM todolist WHERE id='$id' AND user_id='$userid'";
    $same_result = $con->query($same_select);
    $same = mysqli_fetch_assoc($same_result);

    if(empty($update))
    {
        echo '<p class="alert"><span>Task field is empty!</span></p>';
    }
    else if($update==$same["tasks"])
    {
        echo '<p class="alert"><span>Given task is the same as before!</span></p>';
    }else{
        $check_if_db_contains ="SELECT tasks FROM todolist WHERE tasks='$update' AND user_id='$userid'";
        $db_contains = $con?->query($check_if_db_contains);
        if(!is_null($db_contains))
        {
            $same = $db_contains->fetch_assoc();
            if($update!=$same["tasks"])
            {
                $query = "UPDATE todolist set tasks='$update' WHERE id='$id'";
                $result = $con->query($query);
                header("Location:todo.php");
            }else{
                echo '<p class="alert"><span>Given task is in your list!</span></p>';
            }
        }
    }
}    
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
<a href="../register_login/logout.php" class="link">You want to sign out?</a></p>
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