<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $db_name = "myInventory";

    $sqliConnection = mysqli_connect($hostName,$username,$password,$db_name);
    if(!$sqliConnection){
        echo "Error number:" . mysqli_connect_errno()."<br>";
        echo "Database not connected:" . mysqli_connect_error();
    }
?>