<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Assignment 1(Swapping Values)</h3>
    <p>a=10</p>
    <p>b=20</p>
    <?php
        $a = 10;
        $b = 20;

        $a = $a + $b;  
        $b = $a - $b;  
        $a = $a - $b;  
    ?>
    <p>After swapping values:</p>
    <?php
    echo 'a=' . $a . ' , ' . 'b=' . $b;
    ?>
    <hr>


    <h3>Assignment 2(Setting type to integer)</h3>
    <?php    
        $foo = "200foo";
        $bar = "100bar";

        settype($foo , "integer");
        settype($bar , "integer");
        
        $sum = $foo + $bar;
        echo 'sum=' . $sum;
    ?>  
    <hr>
    <p>Prepared by Rida Jawwad</p>
</body>
</html>