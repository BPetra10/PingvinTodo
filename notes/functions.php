<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once("../register_login/connection.php");
require_once("../register_login/functions.php");

$user_data = check_login($con);




function get_notes()
{
    $con = make_connection();
    $uid = $_SESSION["uid"];
    $getQuery = "SELECT * FROM `notes` WHERE `userid`='$uid'";
    $result = $con->query($getQuery);
    return $result;
}