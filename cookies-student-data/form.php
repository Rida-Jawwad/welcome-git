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
        
        $array = [];
        $array2 = [];
        if(isset($_POST['submit'])){

            $array['student_name'] = $_POST['student_name'];
            $array['student_age'] = $_POST['student_age'];
            $array['student_number'] = $_POST['student_number'];
            if(empty($_COOKIE['Code']) && !isset($_COOKIE['Code']))
            {

                
                $array2[] = $array; 
                $serializeArray = serialize($array2);
                $encryptedCode = base64_encode($serializeArray);
                setcookie("Code",$encryptedCode,time()+3600,'/');
                
            }
            else{            
                // setcookie("Code",$encryptedCode,time()-3600,'/');
                $decryptedCode          = base64_decode($_COOKIE['Code']);
                $unserializedArray      = unserialize($decryptedCode);

                $unserializedArray[]    = $array; 

                $serializeArray = serialize($unserializedArray);
                $encryptedCode = base64_encode($serializeArray);

                setcookie("Code",$encryptedCode,time()+3600,'/');
              
            }

            
        }
        
        
        
    ?>
    <form method="POST">
        <label>Student Name:</label>
        <input name="student_name" > 
        <label>Student Age:</label>
        <input name="student_age" > 
        <label>Student Number:</label>
        <input name="student_number" > 
        <input name="submit" value="Submit" type="submit" > 
        
    </form>
    <?php
    if(isset($_COOKIE['Code'])){
        
        $decryptedCode = base64_decode($_COOKIE['Code']);
        $unserializedArray = unserialize($decryptedCode);
        ?> <ul> <?php
        foreach($unserializedArray as $keyz => $myArray){
            ?> <li> <?php
            foreach ($myArray as $key => $value) {
               ?>
                <div><?php echo $value;?></div> 
                <?php
                // if($myArray['student_name'] == $_POST['student_name']){
                //     $_POST['student_age'] = $myArray['student_age'];
                //     $_POST['student_number'] = $myArray['student_number'];
                // }
                
            }
            ?> 
            <div><a href="view.php?std_id=<?php echo $keyz; ?>">View</a> </div> 
            <div><a href="update.php?std_id=<?php echo $keyz; ?>">Update</a> </div> 
            
            </li> <?php
        }
        ?> </ul> <?php
    }

    ?>
    <?php



    ?>

</body>
</html>