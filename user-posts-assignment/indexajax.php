<?php 
    session_start();
?>
<?php require('constant.php'); ?>
<?php
    require('connection.php');
    $error      = false;
    $response   = [];
    
    if(isset($_POST['login'])){

        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];

        if(!empty(trim($userEmail)) && !empty(trim($userPassword))){

            $selectQuery = "select id from useraccounts where email = '$userEmail' and password = '$userPassword' ";
            $selectResult = mysqli_query($sqliConnection,$selectQuery);

            if(mysqli_num_rows($selectResult)){

                $userId = mysqli_fetch_assoc($selectResult);
                $_SESSION['userId']      = $userId['id'];
                $response['status']      = SUCCESS;
                $response['message']     = LOGIN;

            }
            else{
                $response['status']     = ERROR;
                $response['message']    = INVALID;
                
                $error                  = true;
            }

        }
        else
        {
                $response['status']     = ERROR;
                $response['message']    = CHECK_ALL_FIELDS;
           
                $error                  = true;
        }
        echo json_encode($response);
    }
?>