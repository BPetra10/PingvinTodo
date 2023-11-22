<?php
function check_username($result, $user_name){
        if($result && mysqli_num_rows($result) > 0){
            $_SESSION["status"] = "Username already exists";
            reload_signup_page();
        }
        if(strlen($user_name)<6){
            $_SESSION["status"] = "The username must be at between 6 and 16 characters long!";
            reload_signup_page();
        }
        if(is_numeric($user_name)){
            $_SESSION["status"] = "Username can't be all numbers!";
            reload_signup_page();
        }
        if(preg_match('/[\W]/',$user_name)){
            $_SESSION["status"] = "Username can't contain special characters!";
            reload_signup_page();
        }

    }

    function check_password($password, $password2){
        if(strlen($password)<8){
            $_SESSION["status"] = "The password must be at betweet 8 and 16 characters long!";
            reload_signup_page();
        }
        if(!preg_match('/[A-Z]/', $password)){
            $_SESSION["status"] = "The password must contain at least one capital letter!";
            reload_signup_page();
        }
        if(!preg_match('/[a-z]/', $password)){
            $_SESSION["status"] = "The password must contain at least one lowercase letter!";
            reload_signup_page();
        }
        if(!preg_match('/[0-9]/', $password)){
            $_SESSION["status"] = "The password must contain at least one number!";
            reload_signup_page();
        }
        if(!preg_match('/[\W]/', $password)){
            $_SESSION["status"] = "The password must contain at least one special character!";
            reload_signup_page();
        }
        if($password!=$password2){
            $_SESSION["status"] = "The passwords must be the same!";
            reload_signup_page();
        }
    }


    function reload_signup_page(){
        header("location:signup.php");
        die;
    }


    function check_login($con)
    {

        if(isset($_SESSION['user_name']))
        {

            $id = $_SESSION['user_name'];
            $query = "select * from users where user_name = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);

                return $user_data;
            }
        }

        //redirect to login
        header("Location: login.php");
        die;
    }


    function check_logout($con){
        if(isset($_SESSION['user_name'])){
            header("Location: index.php");
            die;
        }
    }
