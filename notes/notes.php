<link rel="stylesheet" href="stilus.css">

<body>
    <?php
    session_start();
    include_once("./templates/head.php");
    echo "<link rel='stylesheet' href='stilus.css'>";
    require_once "../register_login/connection.php";
    require_once "../register_login/functions.php";
    require_once "./editModal.php";
    require_once "functions.php";

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
    <div class="container">
        <div class="row justify-content-center"></div>
        <div class="col-lg-10">
            <h1>Your notes</h1>
            <?php
            $result = get_notes();
            $noNotes = true;
            while ($row = $result->fetch_assoc()) {
                $noNotes = false;
                echo '<div class="card my-3">
                    <div class="card-body">
                    <h5 class="card-title">' . $row["title"] . '</h5>
                    <p class="card-text">' . $row["description"] . '</p>
                    <form method="POST" action="actionHandler.php">
                    <button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal" id="'. $row["id"] .'">Edit</button>
                    <input type="hidden" name="noteId" value="'. $row["id"] .'"> <!-- Updated ID from "hidden" to "noteId" -->
                    <button type="submit" class="btn-btn-danger" name="deleteNote" value="'. $row["id"] .'">Delete</button>
                    </form>
                </div>
            </div>';
            }
            if ($noNotes) {
                echo '<div class="card my-3">
                <div class="card-body">
                <h5 class="card-title">You have no notes!</h5>
                <p class="card-text">Add some notes above! </p>
                </div>
                ';
            }
            ;
            ?>
        </div>
    </div>
</div>

<script>
const edit = document.querySelectorAll(".edit");
const editTitle = document.getElementById("editTitle"); 
const editDesc = document.getElementById("editDesc"); 
const hiddenInput = document.getElementById("hidden");
console.log(edit,editTitle,editDesc);
            edit.forEach(element =>{
                element.addEventListener("click",()=> {
                    console.log(element.parentElement.parentElement.children[0].innerHTML);
                    console.log(element.parentElement.parentElement.children[1].innerHTML);
                    const titleText=element.parentElement.parentElement.children[0].innerHTML
                    const descText=element.parentElement.parentElement.children[1].innerHTML
                    editTitle.value=titleText;
                    editDesc.value=descText;
                    hiddenInput.value=element.id;
                    console.log("hidden input:" + hiddenInput.value);
                });
            });

</script>
</body>