<?php
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="update_todo.css"> 
    <link rel="stylesheet" href="todo.css"> 
</head>
<body>
    <div class="container">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="task" id="task">
                <button type="submit" name="add" id="btn">ADD</button>
            </div>
            <ul class="list">
                <li class="item" style="background-color:crimson">
                <p>Testszöveg</p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check"><i class="icon fa fa-check-square-o"></i></button>
                        <button type="submit" name="deleted" id="delete"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" name="updated" id="update"><i class="icon fa fa-pencil-square-o"></i></button>
                        <button type="submit" name="marked_off"><i class="icon fa fa-exclamation"></i></button>
                    </div>
                </li>
            </ul>
            <hr>
            <ul class="list">
                <?php 
                    $itemList = get_todos();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item">
                <p><?php echo $row["tasks"]; ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check"><i class="icon fa fa-check-square-o"></i></button>
                        <button type="submit" name="deleted" id="delete"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" name="updated" id="update"><i class="icon fa fa-pencil-square-o"></i></button>
                        <button type="submit" name="marked"><i class="icon fa fa fa-exclamation"></i></button>
                    </div>
                    <?php } ?>
                </li>
            </ul>
            <hr>
            <ul class="list">
                <li class="item fade">
                <p class="deleted-text"><span>Törölt szöveg teszt</span></p>
                    <div class="icon-container">
                        <button type="submit" id="check"><i class="icon fa fa-check-square-o hidden"></i></button>
                        <button type="submit" name="deleted" id="delete"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" id="update"><i class="icon fa fa-pencil-square-o hidden"></i></button>
                        <button type="submit" name="marked"><i class="icon fa fa-exclamation hidden"></i></button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>