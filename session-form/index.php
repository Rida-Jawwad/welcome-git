<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    if(!isset($SESSION['user_id'])){
?>    
    <form method="post" action="form_submit.php">
        <label>Email</label>
        <input type="email" name="email"> 
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" name="login" value="Login">
        <span style="color:red"><?php echo ( isset($_SESSION['error']) ? "<br>".$_SESSION['error'] : '' ); ?></span>
        
    </form>
    <p>Prepared by Rida Jawwad</p>
<?php
        }
?>
</body>
</html>