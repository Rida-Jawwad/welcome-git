<?php
    if(isset($_COOKIE['tasks'])){
        $decode = base64_decode($_COOKIE['tasks']);
        $unserializedArray = unserialize($decode);
        $taskIndex = $_GET['task'];
        array_splice($unserializedArray,$taskIndex,1);
        $serializedArray = serialize($unserializedArray);
        $encode = base64_encode($serializedArray);
        setcookie('tasks',$encode,time()+3600,'/');
        header("Location: tasks.php");
    }