<?php
  
  if(isset($_COOKIE['tasks'])){ 

    $decode = base64_decode($_COOKIE['tasks']);
    $unserializedArray = unserialize($decode);

    $taskIndex = $_GET['task'];
    $unserializedArray[$taskIndex]['status'] = 2;

    $serializedArray = serialize($unserializedArray);
    $encode = base64_encode($serializedArray);
    setcookie('tasks',$encode,time()+3600,'/');

header("location: tasks.php");
}