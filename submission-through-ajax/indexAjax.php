
<?php

require('connection.php');
$error = false;
$responseAjax = [];
if(isset($_POST['login'])){

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    if(!empty(trim($userEmail)) && !empty(trim($userPassword))){

        $selectQuery = "select id from useraccounts where email = '$userEmail' and password = '$userPassword' ";
        $selectResult = mysqli_query($sqliConnection,$selectQuery);

        if(mysqli_num_rows($selectResult)){

            $userId = mysqli_fetch_assoc($selectResult);
            $_SESSION['userId'] = $userId['id'];
            var_dump($_SESSION['userId']);
            $responseAjax['status']="success";
            $responseAjax['msg']="Login Successfully";
        }
        else{
            $responseAjax['status']="error";
            $responseAjax['msg']="Invalid email or password!";
            
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
