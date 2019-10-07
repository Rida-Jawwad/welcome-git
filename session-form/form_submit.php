<?php 
session_start(); 

require('data.php'); 
require('constant.php');

$Error = true;

if(isset($_REQUEST['login'])){

    foreach ($user_credentials as $credValue) {

        if($credValue['email'] == $_REQUEST['email'] && $credValue['password'] == $_REQUEST['password']){
                $Error = false;
                $_SESSION['user_id'] = $credValue['user_information_id']; 
                header('Location: user_profile.php');
                break;
        }
        
    }
    if($Error){
        $_SESSION['error']  = ERROR;
        header('Location: index.php');
    }
    
    
}

?>