<?php

session_start();

require("../register_login/connection.php");
require("../register_login/functions.php");

$user_data=check_login($con);    
    
function add_todos($value)
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $check_if_db_contains ="SELECT tasks FROM todolist WHERE tasks='$value' AND user_id='$userid'";
    $db_contains = $con?->query($check_if_db_contains);
    if(!is_null($db_contains))
    {
        $same = $db_contains->fetch_assoc();
        if($value!=$same["tasks"])
        {
            $query = "INSERT INTO todolist(id,user_id,tasks,status,important) VALUES(NULL,'$userid','$value','0','0')";
            $con->query($query);
        }  
    }
}
function get_todos()
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $query = "SELECT id,tasks FROM todolist WHERE status='0' AND important='0' AND user_id='$userid'";
    $result = $con->query($query);
    return $result;
}

?>