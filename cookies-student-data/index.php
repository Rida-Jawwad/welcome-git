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
        $arr =  [
                    "Student_name" => "Rida",
                    "Age"          => "19",
                    "Phone_number" => "03353070538"
                ];
        $Output1 = serialize($arr);
        echo $Output1. "<br>";
        $Output2 = unserialize($Output1);
        print_r ($Output2);

    ?>
</body>
</html>