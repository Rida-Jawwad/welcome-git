<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <title>Document</title>
</head>
<body>
    <?php require_once('constant.php'); ?>
    <?php
    if(isset($_SESSION['user_id']))
    {
        header("Location: user_profile.php");
    }
    ?>
    
    <div class = "container">
        <h1>LOGIN</h1>
        <form method="post" action='form_submit.php'>

            <input name="email" type="email" placeholder="Enter Email" required><br>
            <span><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?></span><br>
            
            <input name="password" type="password" placeholder="Enter password" required><br>
            <span><?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?></span><br>

            <input name="submit" type="submit" value="LOGIN" />
        </form>
    </div>

</body>
</html>