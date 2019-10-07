<?php
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $db_name = "tasks_todo";

        $mysqli_connection = mysqli_connect($hostName,$userName,$password,$db_name); 

        if(!$mysqli_connection){
            echo "Error number :" . mysqli_connect_errno() ."<br>";
            echo "Error :" . mysqli_connect_error();
        }
?>
