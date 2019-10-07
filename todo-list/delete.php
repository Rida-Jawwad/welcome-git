<?php require('connection.php'); ?>
<?php
    if(isset($_REQUEST['taskId'])){
        $taskId = $_REQUEST['taskId'];
        $delete = "delete from tasksTable where id =" . $taskId;
        $deleteQuery = mysqli_query($mysqli_connection,$delete);
        if(!$deleteQuery){
            echo "Error:" . mysqli_error($mysqli_connection);die;
        }
        header("Location: index.php");
    }
?>