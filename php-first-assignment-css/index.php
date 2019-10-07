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
    $error = "";
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
        

    }
?>
    <div class="form-div">
    <form class="form-login" method="post">
        <?php
        
        if($error){
            ?><p class="error"><?php echo ERROR; ?>!</p><?php
        }

        ?>
        <div class="div-form-1">
            <label class="form-email"><?php echo EMAIL; ?>:</label>
            <input class="email-input" type="email" name="user_email">
        </div>
        <div class="div-form-2">
            <label class="form-pass"><?php echo PASSWORD; ?>:</label>
            <input class="password-input" type="password" name="user_password">
        </div>
        <div class="login-submit">
            <input class="submit" type="submit" name="submit" value="<?php echo SUBMIT; ?>">
        </div>
    </form>
    </div>
	<p class="prepared-by">Prepared by Rida Jawwad</p>
</div>
</body>
</html>