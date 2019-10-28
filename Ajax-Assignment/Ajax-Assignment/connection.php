<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "ajax";

    $con = mysqli_connect($hostname,$username,$password,$database);
    if(!$con)
    {
        echo "ERROR Database Not Connected";die;
    }
?>