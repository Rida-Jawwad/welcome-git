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
    require('connection.php');
    $error = false;

    if(isset($_POST['login'])){

        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];

        if(!empty(trim($userEmail)) && !empty(trim($userPassword))){

            $selectQuery = "select id from useraccounts where email = '$userEmail' and password = '$userPassword' ";
            $selectResult = mysqli_query($sqliConnection,$selectQuery);

            if(mysqli_num_rows($selectResult)){

                $userId = mysqli_fetch_assoc($selectResult);
                $_SESSION['userId'] = $userId['id'];

            }
            else{
                echo "Invalid email or password!";
                $error = true;
            }

        }
        else{
            echo "Check all your fields";
            $error = true;
        }

    }

    if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){

?>

    <h1>Login Form</h1>
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $error && isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
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
    
</body>
</html>