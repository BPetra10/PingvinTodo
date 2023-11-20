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
    <div class='parent'>
        <div class='child'>
            <a href="../register_login/index.php">
                <img src="https://i.ibb.co/YNppMLd/pingvin.png" alt="Penguin Button" class="header-icon">
            </a>
        </div>
        <div class='child'><h1 class="site_title">TODO List</h1></div>
    </div>
    <p class="data">You are logged in as: <?php echo $_SESSION['user_name'];?> &nbsp; 
    <a href="../register_login/logout.php" class="link">You want to sign out?</a>
    </p>
    <div class="container">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="task" id="task">
                <button type="submit" name="add" id="btn">ADD</button>
            </div>
            <ul class="list">
                <?php 
                    $itemList = get_todos_important();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item" style="background-color:crimson">
                    <p><?php echo $row["tasks"]; ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-check-square-o"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" name="updated" id="update" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-pencil-square-o"></i></button>
                        <button type="submit" name="marked_off" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-exclamation"></i></button>
                    </div>
                </li>
                <?php } ?>
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
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-check-square-o"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" name="updated" id="update" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-pencil-square-o"></i></button>
                        <button type="submit" name="marked" value="<?php echo $row["id"]; ?>"><i class="icon fa fa fa-exclamation"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
            <?php 
                    $itemList = get_todos_checked();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item fade">
                    <p class="deleted-text"><span><?php echo $row["tasks"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" id="check"><i class="icon fa fa-check-square-o hidden"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="icon fa fa-trash"></i></button>
                        <button type="submit" id="update"><i class="icon fa fa-pencil-square-o hidden"></i></button>
                        <button type="submit" name="marked"><i class="icon fa fa-exclamation hidden"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>
</body>
</html>