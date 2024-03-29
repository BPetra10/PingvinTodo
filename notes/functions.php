<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "../register_login/connection.php";
require_once "../register_login/functions.php";

$user_data = check_login($con);


function get_notes()
{
    $con = make_connection();
    $uid = $_SESSION["uid"];
    $getQuery = "SELECT * FROM `notes` WHERE `userid`='$uid'";
    return $con->query($getQuery);
}

function add_note($title, $desc)
{
    $con = make_connection();
    $userid = $_SESSION['uid'];
    $insertQuery = "insert into notes (userid, title, description) VALUES ( '$userid', '$title', '$desc');";
    $result = mysqli_query($con, $insertQuery);
    if (!$result) {
        echo "no";
    }
}
function delete_note($id)
{
    $con = make_connection();
    $deleteQuery = "DELETE FROM `notes` WHERE id='$id';";
    $result = $con->query($deleteQuery);
}

function change_note($editTitle, $editDesc, $id) {
    $con = make_connection();
    $updateQuery="UPDATE `notes` SET `title`='$editTitle',`description`='$editDesc' WHERE `id`= '$id' ";
    $result = $con->query($updateQuery);
}
