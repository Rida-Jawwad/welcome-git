<?php
    
 require('connection.php');
 $response = [];
 $error    = false;

if(isset($_POST['submit']))
{
    $name        = $_POST['name'];
    $gender      = $_POST['gender'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $repassword  = $_POST['re-password'];
    $number      = $_POST['number'];

    if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))  )
    {
        if($password == $repassword)
        {
            $query = "INSERT INTO users (Name, Gender, Email, Password, Number) VALUES ( '$name' ,'$gender', '$email', '$password', '$number' )";
            $result_set = mysqli_query($con,$query);

                if($result_set)
                {
                    $response["status"]  = "success";
                    $response["message"] = "Signup Successfully";
                }
                else
                {
                    $response["status"]  = "error";
                    $response["message"] = "ERROR :".mysqli_error($con);
                }
        }
        else
        {
            $response["status"]  = "error";
            $response["message"] = "Check your password."; 
        }
    }
    else
    {
        $response["status"]  = "error";
        $response["message"] = "Please submit your Form";
    } 
    echo json_encode($response); 
}
?>