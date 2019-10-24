<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php 
    require("connection_db.php");
    $error          = false;

    if(isset($_POST['submit']))
    {
        $name           = $_POST['name'];
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $re_password    = $_POST['re_password'];
        $number         = $_POST['number'];

        if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))  )
        {
            if($password == $re_password)
            {
                $hash_password = password_hash($password,PASSWORD_DEFAULT);

                $query = "INSERT INTO users(name,email,password,phone_number) VALUES ('$name','$email','$hash_password', $number)";

                $result_set = mysqli_query($con,$query);

                if( $result_set)
                {
                    echo "Signup SuccessFully";
                }else
                {
                    echo "ERROR :".mysqli_error($con);
                    $error = true;
                }
            }else
            {
                echo "Check your password.";
                $error = true;
            }

        }
        else{
            echo "Please submit your form.";
            $error = true;
        }
       


    }

?>

<body>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $error && isset($_POST['name']) ? $_POST['name'] : "" ?>" required> <label>Email:</label>
        <input type="email" name="email" required value="<?php echo $error && isset($_POST['email']) ? $_POST['email'] : "" ?>" >
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Confrm Password:</label>
        <input type="password" name="re_password" required>
        <label>Number</label>
        <input type="text" name="number" value="<?php echo $error && isset($_POST['number']) ? $_POST['number'] : "" ?>" >
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="index.php">Login</a>
</body>
</html>