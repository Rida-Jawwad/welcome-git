<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require('connection.php'); ?>
<?php
if(isset($_REQUEST['taskId'])){

    $taskId = $_REQUEST['taskId'];

    if(isset($_REQUEST['update'])){
        $taskToEdit = $_REQUEST['taskToEdit'];
        
        $update = "update tasksTable set task = '$taskToEdit' where id = '$taskId'";
        $UpdateQuery = mysqli_query($mysqli_connection,$update);
        if(!$UpdateQuery){
            echo "Error:" . mysqli_error($mysqli_connection);die;
        }
         header("Location: index.php");

    }
}
?>
    <form method="post">
        <label for="edit">Edit your task:</label>
        <input type="text" name="taskToEdit" value="">
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

