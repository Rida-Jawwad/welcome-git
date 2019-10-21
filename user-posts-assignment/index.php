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
    <link rel="stylesheet" href="style.css?v1">
</head>
<body>
<?php require('constant.php'); ?>
<?php

    if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){

?>
    <div class="index-main-div">
        <h1>Login Form</h1>
        <form method="post">
            <label for="email"><?php echo EMAIL; ?></label>
            <input type="email" name="email" value="<?php echo isset($error) && $error == true && isset($_POST['email']) ? $_POST['email'] : '' ?>" required><br>
            <label for="password"><?php echo PASSWORD; ?></label>
            <input type="password" name="password" class="password" required><br>
            <input type="submit" value="Submit" name="login">
        </form>
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
    </div>
<?php

    }
    else{
        header("Location: wall.php");
    }

?>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $('form').on('submit',function(e){
            
            e.preventDefault();

            var obj = {};

            $(this).find("input").each(function(){
            obj[$(this).attr("name")] = $(this).val(); 
            }) 

            $.ajax({
                url     : "indexajax.php",
                data    : obj,
                type    : "POST",
                dataType: "json",
                success : function(response){
                    
                    swal("", response.message, response.status)
                    .then(function(e){
                        if(response.status == "success"){
                            window.location.href = "wall.php";
                        }
                        
                    });
                        
                }
            }) 
            
        })
    </script>
</body>
</html>

















