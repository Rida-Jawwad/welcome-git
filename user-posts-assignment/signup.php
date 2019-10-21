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

    <div class="signup-main-div">

        <h1>Signup</h1>
        <form method="post">
            <label for="name"><?php echo NAME ?></label>
            <input type="text" name="name" value="<?php echo isset($error) && $error == true && isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
            <br>
            <label for="email"><?php echo EMAIL ?></label>
            <input type="email" name="email" value="<?php echo isset($error) && $error == true && isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
            <br>
            <label for="password"><?php echo PASSWORD ?></label>
            <input type="password" name="password" required>
            <br>
            <label for="re-password"><?php echo CONFIRM_PASSWORD ?></label>
            <input type="password" name="re-password" required>
            <br>
            <label for="number"><?php echo PHONE_NUMBER ?></label>
            <input type="number" name="number" value="<?php echo isset($error) && $error == true && isset($_POST['number']) ? $_POST['number'] : '' ?>" required>
            <br>
            <input type="submit" value="Submit" name="signup">
        </form>
        <p>Already have an account? <a href="index.php">Login</a></p>

    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
    <script>
        $("form").on("submit",function(e){

            e.preventDefault();

            var obj = {};

            $(this).find("input").each(function(){
            obj[$(this).attr("name")] = $(this).val(); 
            }) 

            $.ajax({
                url     : "signupajax.php",
                data    : obj,
                type    : "POST",
                dataType: "json",
                success : function(response){
                    
                    swal("", response.msg, response.status)
                    .then(function(e){
                        if(response.status == "success"){
                            $("form").trigger("reset");
                        }
                    });
                    
                }
            }) 
            
        })
        
    </script>
</body>
</html>