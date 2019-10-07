<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require('connection.php'); ?>
<?php require('database_table.php'); ?>
<?php
    if(isset($_REQUEST['submit'])){
        $userInput = $_REQUEST['taskToDo'];
        $insertValue = "Insert into tasksTable(task,status) values('$userInput',1)";

        $insertQuery = mysqli_query($mysqli_connection,$insertValue);

        if(!$insertQuery){
            echo "Error :" . mysqli_error($mysqli_connection);die;
        }
    }
?>
    <form method="post">
        <label for="tasks">Task:</label>
        <input type="text" name="taskToDo">
        <input type="submit" name="submit" value="Submit"><br>
    </form>

<?php
    $select = "Select * from tasksTable";
    $selectQuery = mysqli_query($mysqli_connection,$select);
    if(!$selectQuery){
        echo "Error:" . mysqli_error($mysqli_connection);die;
    }
    $retrieveData = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);
    // var_dump($retrieveData);
?>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($retrieveData as $value) {
                
            ?>
            <tr>
                <td><?php echo $value['task']; ?></td>
                <td><?php echo $value['status'] == 1 ? "Pending" : "Done" ; ?></td>
                <td><a href="edit.php?taskId=<?php echo $value['id']; ?>">Edit</a></td>
                <td><a href="delete.php?taskId=<?php echo $value['id']; ?>">Delete</a></td>
                <td><a href="done.php?taskId=<?php echo $value['id']; ?>">Done</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>