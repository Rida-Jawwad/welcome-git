<?php 
    session_start();
?>
<?php require('constant.php'); ?>
<?php

    require('connection.php');

    $error      = false;
    $response   = [];

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
                    $response["status"]     = SUCCESS;
                    $response["msg"]        = ACCOUNT_CREATED;
                    
                }
                else
                {
                    $response["status"]     = ERROR;
                    $response["msg"]        = "ERROR :".mysqli_error($sqliConnection);
                    
                    $error                  = true;
                }

            }
            else
            {
                $response["status"]     = ERROR;
                $response["msg"]        = PASSWORDS_DONT_MATCH;
                
                $error                  = true;
            }

        }
        else
        {
            $response["status"]     = ERROR;
            $response["msg"]        = CHECK_ALL_FIELDS;
            
            $error                  = true;
        }
        echo json_encode($response);

    }
?>