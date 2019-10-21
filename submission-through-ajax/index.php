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

    if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){

?>

    <h1>Login Form</h1>
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo isset($error) && isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="Submit" name="login">
    </form>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>

<?php
    }
    else{
        header("Location: products.php");
    }
?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

    $('form').on('submit',function(e){

        e.preventDefault();
        formData = {};
        $(this).find('input').each(function(){
            formData[$(this).attr('name')] = $(this).val();
        })

        $.ajax({
            url : 'indexAjax.php',
            type : 'POST',
            dataType : 'json',
            cache : false,
            data : formData,
            success : function(response){
                swal("",response.msg,response.status);
                
            }
        })

    })

</script>

</body>
</html>