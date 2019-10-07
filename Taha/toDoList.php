<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/07f52386ae.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="body-todo">
    <?php
        if(isset($_SESSION['Name']) && !empty($_SESSION['Name'])){
            if(isset($_REQUEST['taskSubmit'])){
                $Task = [];
                $toDo = $_REQUEST['Task'];
                if(!isset($_COOKIE['taskList']) && empty($_COOKIE['taskList'])){
                    $Task['Task'] = $toDo;
                    $Task['status'] = 1;
                    $TaskToDo[] = $Task;
                    $serializedTaskList = serialize($TaskToDo);
                    $encodedTaskList = base64_encode($serializedTaskList);
                    
                    setcookie('taskList',$encodedTaskList,time()+86400*30,"/");
                }
                else{
                    $decodedTaskList = base64_decode($_COOKIE['taskList']);
                    $UnserializedTaskList = unserialize($decodedTaskList);
                    $Task['Task'] = $toDo;
                    $Task['status'] = 1;
                    $UnserializedTaskList[] = $Task;

                    $serializedTaskList = serialize($UnserializedTaskList);
                    $encodedTaskList = base64_encode($serializedTaskList);

                    setcookie('taskList',$encodedTaskList,time()+86400*30,"/");
                }
            }
        ?>
        <h2>
            <?php echo $_SESSION['Name']; ?>'s External Memory Disk
        </h2>
        <div>
            <form class="todo-form">
                <input type="text" name="Task">
                <input type="submit" value="Add Task" name="taskSubmit">
            </form>
        </div>
        <ul>
        <?php
            if(isset($_COOKIE['taskList'])){
                $decodedTaskList = base64_decode($_COOKIE['taskList']);
                $UnserializedTaskList = unserialize($decodedTaskList);
                foreach($UnserializedTaskList as $Key => $Value){
        ?>
            <li>
        <?php
                    foreach($Value as $SValue){
        ?>
                    <div>
                            <p style="<?php
                                    if($UnserializedTaskList[$Key]['status'] == 2){
                                        echo "background : #8b60d8; color : white;";
                                        }
                                ?>"><?php echo $SValue; break; ?></p>
                    </div>
        <?php
                    } 
        ?>
                    <div class="awe-div">
                        <a href="editTask.php?editingTask=<?php echo $Key; ?>"><i class="fas fa-edit"></i></a>
                        <a href="deleteTask.php?delete=<?php echo $Key; ?>"><i class="fas fa-trash"></i></a>
                        <a href="taskDone.php?taskCompleted=<?php echo $Key; ?>"><i class="fas fa-check"></i></a>
                    </div>
            </li>
    <?php
            }
        }
    ?>
    </ul>
    <div class="logout">
        <a href="logout.php"><i class="fas font-mag fa-sign-out-alt"></i></a>
    </div>
    <?php
        }
        else{
            $_SESSION['NotLogged'] = true;
            header('Location: index.php');
        }
    ?>
</body>
</html>