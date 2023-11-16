<?php
require_once("./functions.php");

$hiddenValue = isset($_POST['hiddenInput']) ? $_POST['hiddenInput'] : '';
$editDescValue = isset($_POST['editDesc']) ? $_POST['editDesc'] : '';
$editTitleValue = isset($_POST['editTitle']) ? $_POST['editTitle'] : '';

echo '
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form" method="POST" action="actionHandler.php">
                <input type="hidden" name="editId" value="' . $hiddenValue . '">

                <div class="mb-3">
                    <input type="hidden" id="hidden" name="hiddenInput" value="' . $hiddenValue . '">
                    <label for="editTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="editTitle" name="editTitle" value="' . $editTitleValue . '">
                </div>
                <div class="mb-3">
                    <label for="editDesc">Description</label>
                    <textarea class="form-control" id="editDesc" rows="3" placeholder="Your content" name="editDesc">' . $editDescValue . '</textarea>
                    <button type="submit" class="btn btn-primary" name="confirmChange">Confirm change</button>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>';
?>