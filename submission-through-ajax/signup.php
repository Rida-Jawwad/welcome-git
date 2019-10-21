<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo isset($error) && isset($_POST['name']) ? $_POST['name'] : '' ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo isset($error) && isset($_POST['email']) ? $_POST['email'] : '' ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="re-password">Confirm password</label>
        <input type="password" name="re-password" required>

        <label for="number">Phone Number</label>
        <input type="number" name="number" value="<?php echo isset($error) && isset($_POST['number']) ? $_POST['number'] : '' ?>" required>

        <input type="submit" value="Submit" name="signup">
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>

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
            url : 'signupajax.php',
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









