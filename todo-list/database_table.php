<?php require('connection.php'); ?>
<?php

    $createTable = "Create table if not exists tasksTable(
        id int primary key auto_increment,
        task varchar(40) not null,
        status varchar(20) not null
    )";
    
    $tableQuery = mysqli_query($mysqli_connection,$createTable);
    if(!$tableQuery){
        echo "Error:" . mysqli_error($mysqli_connection);die;
    }

?>