<?php
session_start();
require("data.php");

  

 foreach($User_Information as $user)
 {
     if( $_SESSION['user_id'] == $user['User_ID'] )
     {
         echo "Name:".$user['Name'].'<br>';
         echo "Age:".$user['Age'].'<br>';
         echo "Number:".$user['PhoneNumber'].'<br>';
     }
 }
?>
<a href="logout.php">Logout</a>