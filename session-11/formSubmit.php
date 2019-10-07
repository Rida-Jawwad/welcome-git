<?php
session_start();
$error = true;
    require("data.php");
    require("constantFile.php");
        
        if (isset($_POST['submit']))
        {
            foreach($User_Credentials as $Value)
            {
                if($Value['E-mail'] == $_POST['Email_Add'] && $Value['Password'] == $_POST['Pass'])
                {
                            $_SESSION['user_id'] = $Value['User_Information_ID']; 
                            header('Location: userProfile.php');
                            break;
                 }
                elseif($error)
                {
                    $_SESSION['err']  = ERROR;
                    header('Location: index.php');
                
                }
            }
        }
            
?>