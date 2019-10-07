
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
<div class="task-main-div">
<?php
require('constant.php');

    $array = [];
    $array2 = [];
    if(isset($_POST['add'])){

        $array['taskToDo'] = $_POST['task'];
        $array['status'] = 1;
        var_dump($array);
        if(empty($_COOKIE['tasks']) && !isset($_COOKIE['tasks'])){
            $array2[] = $array;
            $serializedArray = serialize($array2);
            $encode = base64_encode($serializedArray);
            setcookie('tasks',$encode,time()+3600,'/');
            header("Location: tasks.php");
        }
        else{
            
            $decode = base64_decode($_COOKIE['tasks']);
            $unserializedArray = unserialize($decode);

            $unserializedArray[] = $array;
            
            $serializedArray = serialize($unserializedArray);
            $encode = base64_encode($serializedArray);

            setcookie('tasks',$encode,time()+3600,'/');
            header("Location: tasks.php");
        // setcookie("tasks",$encode,time()-3600,'/');
        }
        
        
    }

?>   
    <h2 class="name-heading">
        Hello, Rida!
    </h2>
    <div class="task-form-div">
    <form class="form-addtask" method="post">
        <label class="form-label"><?php echo TASK ; ?></label>
        <input class="form-task" type="text" name="task">
        <input class="form-submit" type="submit" name="add" value="<?php echo ADD; ?>">
    </form>
    </div>

<?php
    if(isset($_COOKIE['tasks'])){
        
        $decode = base64_decode($_COOKIE['tasks']);
        $unserializedArray = unserialize($decode);
      
        ?>
        <ul class="ul">
        <?php
        foreach ($unserializedArray as $key => $value) {
            ?>
            <li class="li">
            <?php
            foreach ($value as $key2 => $value2) {
                
                ?>
                <p class="para" style="<?php 
                                  if($unserializedArray[$key]['status'] == 2){
                                    echo "background : green; color : white;";
                                    }
                                    ?>"><?php echo $value2; ?></p>
                <?php
               break; 
            }
            // var_dump($unserializedArray);
            
        ?>
        <a class="button" href="edit.php?task=<?php echo $key; ?>">Edit</a> 
        <a class="button" href="delete.php?task=<?php echo $key; ?>">Delete</a>
        <a class="button" href="done.php?task=<?php echo $key; ?>">Done</a><br><br>
            </li>
        <?php

        }
        ?>
        </ul>
        <?php
    }
?>
<a class="logout" href="logout.php">Logout</a>
</div>
</body>
</html>

