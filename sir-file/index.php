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
        require("connection_db.php");

        if(isset($_POST['submit']))
        {
            $email      = $_POST['email'];    
            $passowrd   = $_POST['passowrd']; 
            
            $query      = "SELECT * FROM USERS WHERE EMAIL = '$email'  "; 
            $result_set = mysqli_query($con,$query);
             
            if( mysqli_num_rows($result_set) > 0  )
            {
                $user_details = mysqli_fetch_assoc($result_set);
                
                if(password_verify($passowrd,$user_details['password']))
                {
                    $_SESSION['user_id'] = $user_details['id'];

                }
              

            }else
            {
                echo "Credentails is wrong.";
            }


        }

    if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) )
    { 
        
    ?>
    <h1>Login form</h1>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="passowrd" required>
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="signup.php">Sign Up</a>
    <?php 
    }else{

        header("Location: products.php");
    }  ?>
</body>
</html>