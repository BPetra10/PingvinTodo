<?php


require("functions.php");
require("editModal.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addNote"])) {
        add_note($_POST["title"], $_POST["desc"]);
        header("Location: notes.php");
        die();
    } else if (isset($_POST["deleteNote"])) {
        $noteId = $_POST["noteId"];
        delete_note($noteId);
        header("Location: notes.php");
        die();
    } 
    else {
        $editdesc = $_POST['editDesc'];
        $edittitle = $_POST['editTitle'];
        $noteId = $_POST['editId'];
        change_note($edittitle, $editdesc, $noteId);
        header("Location: notes.php");
        die();
    } 
};
?>