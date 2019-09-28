<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$array3 = [];
if(isset($_COOKIE['Code'])){

    $decryptedCode = base64_decode($_COOKIE['Code']);
    $unserializedArray = unserialize($decryptedCode);
    // var_dump($unserializedArray);
    $studentId = $_GET['std_id'];
    ?><br><?php
    foreach($unserializedArray[$studentId] as $Val){
        $array3[] .= $Val;
    }
}

?>
    <form method="POST">
        <label>Student Name:</label>
        <input name="student_name" value="<?php echo $array3[0]; ?>" > 
        <label>Student Age:</label>
        <input name="student_age" value="<?php echo $array3[1]; ?>" > 
        <label>Student Number:</label>
        <input name="student_number" value="<?php echo $array3[2]; ?>" > 
        <input name="submit" value="Submit" type="submit" >         
    </form>

<?php
    if(isset($_POST['submit'])){
        $decryptedCode = base64_decode($_COOKIE['Code']);
        $unserializedArray = unserialize($decryptedCode);

        $array3[0] = $_POST['student_name'];
        $array3[1] = $_POST['student_age'];
        $array3[2] = $_POST['student_number'];

        $unserializedArray[$studentId]    = $array3;
        
        $serializeArray = serialize($unserializedArray);
        $encryptedCode = base64_encode($serializeArray);

        setcookie("Code",$encryptedCode,time()+3600,'/');
        
    }
?>
</body>
</html>