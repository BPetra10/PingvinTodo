<body>
    <?php
    session_start();
    include_once("./templates/head.php");
    require("../register_login/connection.php");
    require("../register_login/functions.php");
    require_once("functions.php");
?>

<div class="econtainer my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form" action="actionHandler.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Your title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"> Description </label>
                        <textarea class="form-control" id="desc" rows="3" placeholder="Your content"
                            name="desc"></textarea>
                        <button type="submit" class="btn-btn-primary" name="addNote">Add note</button>
                </form>
            </div>
        </div>
    </div>
</body>