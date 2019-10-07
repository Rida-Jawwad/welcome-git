<?php
    session_start();

    require ('data.php');
    require ('constant.php');
    $error = true;
    
    if (isset($_REQUEST['Submit'])){
        foreach($User_Credentials as $PValue){
            if($PValue['Email'] == $_REQUEST['EmailAdd'] && $PValue['Password'] == $_REQUEST['Pass']){
                $error = false;
                foreach($User_Information as $UIPValue){
                    if($UIPValue['UserID']== $PValue['UserInformationID']){
                        $_SESSION['Name'] = $UIPValue['Name'];
                        header("Location: toDoList.php");
                    }
                }
            }
            elseif($error){
                $_SESSION['Error'] = $error;
                header("Location: index.php");
            }
        }
    }
    else{
        header("Location: toDoList.php");
    }
?>
