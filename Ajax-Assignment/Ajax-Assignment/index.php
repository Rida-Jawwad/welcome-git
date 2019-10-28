<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <title>AJAX-index</title>
</head>
<body> 
    <?php require('constant.php'); ?>
<?php

if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) )
{

?>
    <h1> Login Form </h1>

<form method="post">

        <label><?php echo EMAIL ?></label>
        <input type="text" name="email" Required><br>
        
        <label><?php echo PASSWORD ?></label>
        <input type="password" name="password" Required><br>

        <input type="submit" name="submit" value="Submit"><br>
    </form>
    
    <a href="signup.php"> Sign Up </a>
<?php
}
else
{
    header('Location: userProfile.php');
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
        $('form').on('submit',function(e){
            e.preventDefault();
                var obj = {};
                $(this).find("input").each(function(){
                    obj[$(this).attr("name")] = $(this).val(); 
                })
                $.ajax({
                    url:"signinajax.php",
                    data:obj,
                    type:"POST",
                    dataType:"json",
                    success:function(response)
                    {
                        swal("", response.message, response.status)
                        .then(function(e){
                            window.location.href = "userProfile.php";
                        });
                    }
                });
                
        })
</script>
</body>
</html>