<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "inventory";

    $con = mysqli_connect($hostname,$username,$password,$database);
    if(!$con)
    {
        echo "ERROR DB Not Connect";die;
    }
?>