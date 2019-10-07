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
<div class="main-div">
<?php
require('constant.php');

    $array3 = [];
    if(isset($_COOKIE['tasks'])){
        $decode = base64_decode($_COOKIE['tasks']);
        $unserializedArray = unserialize($decode);
        $taskIndex = $_GET['task'];
        $array3 = $unserializedArray[$taskIndex];
        //var_dump($array3)."<br>";
    }
?>
    <form class="edit-form" method="post">
        <label class="edit-label"><?php echo TASK; ?></label>
        <input class="edit-text" type="text" name="editedValue" value="<?php echo $array3['taskToDo']; ?>">
        <div class="edit-submit">
            <input class="edit-submit-button" type="submit" name="update" value="<?php echo EDIT; ?>">
        </div>
    </form>

<?php
    if(isset($_POST['update'])){
        $decode = base64_decode($_COOKIE['tasks']);
        $unserializedArray = unserialize($decode);
        
        $array3['taskToDo'] = $_POST['editedValue'];
        
        $unserializedArray[$taskIndex] = $array3;

        $serializedArray = serialize($unserializedArray);
        $encode = base64_encode($serializedArray);

        setcookie('tasks',$encode,time()+3600,'/');
        header("Location: tasks.php");
    }
?>
</div>
</body>
</html>

