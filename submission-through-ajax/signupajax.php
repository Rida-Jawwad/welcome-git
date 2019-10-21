<?php

    require('connection.php');
    $error = false;
    $responseAjax = [];

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
                    $responseAjax['status']="success";
                    $responseAjax['msg']="Your account has been created successfully";
                }
                else{
                    $responseAjax['status']="error";
                    $responseAjax['msg']="Signup error:" . mysqli_error($sqliConnection);
                    
                    $error = true;
                }

            }
            else{
                $responseAjax['status']="error";
                $responseAjax['msg']="Passwords doesn't match";
                
                $error = true;
            }

        }
        else{
            $responseAjax['status']="error";
            $responseAjax['msg']="Check all your fields";
            
            $error = true;
        }
        echo json_encode($responseAjax);
    }
?>