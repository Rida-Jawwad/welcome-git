<?php
if(isset($_COOKIE['Code'])){
    $decryptedCode = base64_decode($_COOKIE['Code']);
    $unserializedArray = unserialize($decryptedCode);
    var_dump($unserializedArray);
    $gettingValue = $_GET['std_id'];
    ?><br><?php
    foreach($unserializedArray[$gettingValue] as $unserValue){
        echo $unserValue."<br>";
    }
    

}

?>