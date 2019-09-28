<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Function with return:</h3>
    <?php
        function addition($first , $second){
            $sum = $first + $second;
            return $sum;
        }
        $userNumber = addition(10 , 20);
        var_dump ("Sum = " . $userNumber);
    ?>
    <hr>
    <h3>Array exists or not:</h3>
    <?php
    
    function Arrayexists(){
        $array = [1,2,3,4,5];
        $integer = 50;
        $string = "This is a string";
        $variableType = gettype($array);
        // echo $variableType;
        if($variableType == "array"){
            echo "It is an array";
        }
        else{
            echo "It is not an array";
        }
    }
    Arrayexists();
    ?>
    <hr>
    <h3>Array key exists or not:</h3>
    <?php
    function arrayKey(){
        $array =   [
            "Name"   => "Rida",
            "DOB"    => "04/09/2000",
            "Age"    => "18",
            "Status" => "1"
       ];
       
        foreach($array as $key => $value){
            if($key == "DOB"){
                echo "This key exists";
            }      
        }
    }
    arrayKey();
    ?>
    <hr>
    <p>Prepared by Rida Jawwad</p>
</body>
</html>