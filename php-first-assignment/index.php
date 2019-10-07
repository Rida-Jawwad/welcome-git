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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-div">
<?php
    require_once('constant.php');
    if(isset($_POST['submit'])){
        $error = true;
        $user_information =  [
            "email" => "ridajawad999@gmail.com",
            "password" => "kuchbhi",
         ];
        foreach ($user_information as $key => $value) {
            
            if($user_information['email'] == $_POST['user_email'] && $user_information['password'] == $_POST['user_password']){

                $error = false;
                header('Location: tasks.php');
            }
            break;
        }
        if($error){
            echo ERROR;
        }

    }
?>
    <div class="form-div">
    <form method="post">
        <label><?php echo EMAIL; ?>:</label>
        <input type="email" name="user_email">
        <label><?php echo PASSWORD; ?>:</label>
        <input type="password" name="user_password">
        <input type="submit" name="submit" value="<?php echo SUBMIT; ?>">
    </form>
    </div>
    <p>Prepared by Rida Jawwad</p>
</div>
</body>
</html>