<?php

session_start();

require_once "../register_login/connection.php";
require_once "../register_login/functions.php";

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
    return $con->query($query);
}
function get_todos_important()
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $query = "SELECT id,tasks FROM todolist WHERE status='0' AND important='1' AND user_id='$userid'";
    return $con->query($query);
}
function get_todos_checked()
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $query = "SELECT id,tasks FROM todolist WHERE status='1' AND user_id='$userid'";
    return $con->query($query);
}
function status_update($id)
{
    $con = make_connection();
    $query = "UPDATE todolist SET status='1' WHERE id='$id'";
    $result = $con->query($query);
}

function delete_todos($id)
{
    $con = make_connection();
    $query = "DELETE FROM todolist WHERE id='$id'";
    $result = $con->query($query);
}

function update_todos($id)
{
   header("Location: update_todo.php?id=".$id);
   die();
}

function mark_as_important($id){
    $con = make_connection();
    $query = "UPDATE todolist SET important='1' WHERE id='$id'";
    $result = $con->query($query);
}

function unmark($id){
    $con = make_connection();
    $query = "UPDATE todolist SET important='0' WHERE id='$id'";
    $result = $con->query($query);
}
