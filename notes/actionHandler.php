<?php

require_once "functions.php";
require_once "editModal.php";

define("LOCATION", "Location: notes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addNote"])) {
        add_note($_POST["title"], $_POST["desc"]);
        header(LOCATION);
        die();
    } else if (isset($_POST["deleteNote"])) {
        $noteId = $_POST["noteId"];
        delete_note($noteId);
        header(LOCATION);
        die();
    }
    else {
        $editdesc = $_POST['editDesc'];
        $edittitle = $_POST['editTitle'];
        $noteId = $_POST['hiddenInput'];

        change_note($edittitle, $editdesc, $noteId);
        header(LOCATION);
        die();
    }
};

