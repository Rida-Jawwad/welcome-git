<?php

    $hostName = "localhost";
    $username = "root";
    $password = "";
    $db_name = "useraccounts";

    $sqliConnection = mysqli_connect($hostName,$username,$password,$db_name);
    if(!$sqliConnection){
        echo "Error number".mysqli_connect_errno()."<br>";
        echo "Database error".mysqli_connect_error();
    }

?>