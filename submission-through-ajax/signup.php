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

    if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['re-password'];
        $number = $_POST['number'];

        if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))){
            if($password == $rePassword){

                $insertQuery = "INSERT INTO useraccounts(name,email,password,phone_number) values('$name','$email','$password',$number)";

                $insertResult = mysqli_query($sqliConnection,$insertQuery);

                if($insertResult){
                    echo "Your account has been created successfully";
                }
                else{
                    echo "Signup error:" . mysqli_error($sqliConnection);
                    $error = true;
                }

            }
            else{
                echo "Passwords doesn't match";
                $error = true;
            }

        }
        else{
            echo "Check all your fields";
            $error = true;
        }
    }
?>

    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $error && isset($_POST['name']) ? $_POST['name'] : '' ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $error && isset($_POST['email']) ? $_POST['email'] : '' ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="re-password">Confirm password</label>
        <input type="password" name="re-password" required>

        <label for="number">Phone Number</label>
        <input type="number" name="number" value="<?php echo $error && isset($_POST['number']) ? $_POST['number'] : '' ?>" required>

        <input type="submit" value="Submit" name="signup">
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>