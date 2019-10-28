<?php 

 $str  = "123456789";

 echo password_hash($str,PASSWORD_DEFAULT);
 echo "<br>";
 echo password_hash($str,PASSWORD_DEFAULT);