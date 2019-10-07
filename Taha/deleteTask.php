<?php
    session_start();

    if(isset($_COOKIE['taskList'])){
        $delete  = $_GET['delete'];
        $decodedTaskList = base64_decode($_COOKIE['taskList']);
        $UnserializedTaskList = unserialize($decodedTaskList);
        
        array_splice($UnserializedTaskList,$delete,1);

        $serializedTaskList = serialize($UnserializedTaskList);
        $encodedTaskList = base64_encode($serializedTaskList);
        setcookie( 'taskList' , $encodedTaskList , time() + 60*60*24 , "/" );
        header("Location: toDoList.php");
    }    
?>