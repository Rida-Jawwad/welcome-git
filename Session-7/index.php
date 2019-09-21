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
    $arr = [5,10,15,20,25,30,35,40,45];
    $arr_2 = ["name"=>"Rida", "DOB"=>20];
    $return = array_search($arr_2, 20);
    var_dump($return);

    ?>
</body>
</html>