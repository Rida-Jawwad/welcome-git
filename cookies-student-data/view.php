<?php
if(isset($_COOKIE['Code'])){
    $decryptedCode = base64_decode($_COOKIE['Code']);
    $unserializedArray = unserialize($decryptedCode);
    var_dump($unserializedArray);
    $studentId = $_GET['std_id'];
    ?><br><?php
    foreach($unserializedArray[$studentId] as $Val){
        echo $Val."<br>";
    }
    

}

?>