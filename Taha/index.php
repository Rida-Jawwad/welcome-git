<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body class="body-index">
    <?php
        require ('constant.php');
    ?>
    <h1>
        YOUR EXTERNAL MEMORY DISK
    </h1>
    <?php
        if(!isset($_SESSION['Name']) && empty($_SESSION['Name'])){
    ?>
    <span><?php if(isset($_SESSION['Error'])){ echo ERROR_MESSAGE;}elseif(isset($_SESSION['NotLogged'])){ echo NOTLOGGED; } ?></span>
    <form method="post" action="form_submit.php" class="index-form">
        <div>
            <label for="EmailAddress">Email Address :</label>
        </div>
        <div>
            <input type="email" name="EmailAdd">
        </div>
        <div>
            <label for="Password">Password :</label>
        </div>
        <div>
            <input type="password" name="Pass">
        </div>
        <div>
            <input type="submit" name="Submit" value="Sign In">
        </div>
    </form>
    <?php 
        }
        else{
            header('Location: toDoList.php');
        }
    ?>
</body>
</html>