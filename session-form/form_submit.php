<?php 
session_start(); 

require('index.php'); 
require('data.php'); 
require('user_profile.php');
require('constant.php');

$Error = true;

if(isset($_REQUEST['login'])){
    foreach ($user_credentials as $credValue) {
        if($credValue['email'] == $_REQUEST['email'] && $credValue['password'] == $_REQUEST['password']){
            $Error = False;
            $_SESSION['email'] = $_REQUEST['email'];
            $_SESSION['password'] = $_REQUEST['password']; 

            foreach ($user_information as $infoValue) {                
                if($infoValue['uniqueId'] == $credValue['user_information_id']){                                  
                    $_SESSION['name'] = $infoValue['name'];
                    $_SESSION['age'] = $infoValue['age'];
                    $_SESSION['phoneNumber'] = $infoValue['phoneNumber'];
                    header("Location: user_profile.php");
                    break;
                }
            }
            // break;
        }
        elseif($Error){
            header("Location: index.php");
            echo ERROR;
        }
    }
    
    
}

?>