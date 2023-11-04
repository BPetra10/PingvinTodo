<?php
require("functions.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["add"]))
    {
        if($_POST["task"]!=NULL)
        {
            add_todos($_POST["task"]);
        }
    }
    else if(isset($_POST["checked"]))
    {
        status_update($_POST["checked"]);
    }
    else if(isset($_POST["deleted"]))
    {
       delete_todos($_POST["deleted"]);
    }
    else if(isset($_POST["marked"]))
    {
        mark_as_important($_POST["marked"]);
    }
    else if(isset($_POST["marked_off"]))
    {
        unmark($_POST["marked_off"]);
    }
    header("Location:todo.php");
}
?>