<?php require('connection.php'); ?>
<?php
    if(isset($_REQUEST['taskId'])){
        $taskId = $_REQUEST['taskId'];
        $status = "update tasksTable set status = 2 where id =".$taskId;
        $statusQuery = mysqli_query($mysqli_connection,$status);
        if(!$statusQuery){
            echo "Error:" . mysqli_error($mysqli_connection);die;
        }
        header("Location: index.php");
    }