<?php
    session_start();

    if(isset($_COOKIE['taskList'])){ 

            $decodedTaskList = base64_decode($_COOKIE['taskList']);
            $UnserializedTaskList = unserialize($decodedTaskList);
            $statusToChange = $_GET['taskCompleted'];

            $UnserializedTaskList[$statusToChange]['status'] = 2;

            $serializedTaskList = serialize($UnserializedTaskList);
            $encodedTaskList = base64_encode($serializedTaskList);
            setcookie( 'taskList' , $encodedTaskList , time() + 60*60*24 , "/" );
        
            header('Location: toDoList.php');
    }
?>