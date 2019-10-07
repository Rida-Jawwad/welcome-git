<?php
session_start();

require("data.php");

foreach($user_information as $userInfoValue)
{
    if( $_SESSION['user_id'] == $userInfoValue['uniqueId'] )
    {
        echo "Name:".$userInfoValue['name'].'<br>';
        echo "Age:".$userInfoValue['age'].'<br>';
        echo "Number:".$userInfoValue['phoneNumber'].'<br>';
    }
}
?>
<a href="logout.php">Logout</a>


