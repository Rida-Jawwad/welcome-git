<?php session_start(); ?>
<?php require_once('data.php'); ?>
<?php require_once('constant.php'); ?>
<?php
        //validating email and password and getting user id using email 
        if(isset($_REQUEST['submit']))
        {
            $error = [] ;
            if( !empty($_REQUEST['email']) && !empty($_REQUEST['password']))
            {
                foreach( $user_credentials as $user_info )
                { 
                    if( $user_info["email"] == $_REQUEST["email"] && $user_info["password"] == $_REQUEST["password"])
                    {
                        //saving the data in session
                        $user_id = $user_info["user_information_id"];
                        $_SESSION['user_id'] = $user_id; 

                        $_SESSION['email'] = $user_info["email"];
                        $_SESSION['password'] = $user_info["password"];

                        break;
                    }
                    // validations
                    if($user_info["email"] !== $_REQUEST["email"])
                    {
                        $error['email'] = EMAIL_ERROR ;   
                        $_SESSION['email'] = $error['email'];
                        
                    }
                    else
                    {
                        unset($_SESSION['email']) ;
                    }
                    if($user_info["password"] !== $_REQUEST["password"])
                    {
                        $error['password'] = PASSWORD_ERROR ;    
                        $_SESSION['password'] = $error['password'];
                    }
                    else
                    {
                        unset($_SESSION['password']) ;
                    }
                }
            }
            //fetching user info through user id 
            if( isset($user_id) )
            {
                foreach( $user_information as $value )
                {
                    if( $value["unique_id"] == $user_id )
                    {
                        $_SESSION['name'] = $value["name"];
                        $_SESSION['age'] = $value["age"];
                        $_SESSION['phone_num'] = $value["phone_num"];
                    }
                }
            }
        }
        //redirecting on failure
        if(count($error) > 0 )
        {
            header("Location: index.php");
        }
        //redirecting on success
        else
        {
            header("Location: user_profile.php");
        }

?>