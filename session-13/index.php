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
    // $str = "I am Rida I am Rida I am Rida";
    // echo strlen($str);
    // echo str_replace("Rida","Insiya",$str);
    // echo substr($str,"5","4");
    // echo substr_count($str,"i",5,7);

    $string = "string handling. This_is_Consulnet_";
    $substring = substr($string,0,-1);
    echo $substring."<br>";
    $replace = str_replace("_"," ",$substring);
    echo $replace . "<br>";
    print_r(explode(" ",$replace));
    
    ?>
</body>
</html>