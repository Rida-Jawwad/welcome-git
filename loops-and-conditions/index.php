<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>

        <h3>Marksheet(if-else):</h3>
        <p>Maths=80</p>
        <p>Engish=75</p>
        <p>Urdu=85</p>
        <p>Science=70</p>
        <p>Islamiat=89</p>

        <?php
            $math = 80;
            $eng = 75;
            $urdu = 85;
            $sci = 70;
            $isl = 89;
            $maxMarks = 500;
            $minMarks = $math + $eng + $urdu + $sci + $isl;       
                echo "Total marks = $minMarks <br>";
            $percentage = $minMarks / $maxMarks * 100;
                echo "Percentage = $percentage%<br>";
            if($percentage >= 80 && $percentage <=100){
                echo "Grade: A-1";
            }
            if($percentage >= 70 && $percentage < 80){
                echo "Grade: A";
            }
            if($percentage >= 60 && $percentage < 70){
                echo "Grade: B";
            }
            if($percentage >= 50 && $percentage < 60){
                echo "Grade: C";
            }
            if($percentage > 40 && $percentage < 50){
                echo "Grade: D";
            }
            if($percentage <= 40){
                echo "Grade: Fail";
            }
        ?>

        <hr>

        <h3>Marksheet(Switch-case):</h3>
        <p>Maths=80</p>
        <p>Engish=75</p>
        <p>Urdu=85</p>
        <p>Science=70</p>
        <p>Islamiat=89</p>

        <?php
            $math = 80;
            $eng = 75;
            $urdu = 85;
            $sci = 70;
            $isl = 89;
            $maxMarks = 500;
            $minMarks = $math + $eng + $urdu + $sci + $isl;       
                echo "Total marks = $minMarks <br>";
            $percentage = $minMarks / $maxMarks * 100;
                echo "Percentage = $percentage%<br>";

            switch($percentage){
                case ($percentage >= 80 && $percentage <=100):
                echo "Grade: A-1";
                break;

                case ($percentage >= 70 && $percentage < 80):
                echo "Grade: A";
                break;

                case ($percentage >= 60 && $percentage < 70):
                echo "Grade: B";
                break;

                case ($percentage >= 50 && $percentage < 60):
                echo "Grade: C";
                break;

                case ($percentage > 40 && $percentage < 50):
                echo "Grade: D";
                break;

                case ($percentage <= 40):
                echo "Grade: Fail";
                break;
            }
        ?>
        <hr>

        <h3>Factorial(For loop):</h3>

        <?php
            $num = 5;
            $factorial = 1;
             
            for ($i=$num; $i>=1; $i--)
            {
                $factorial = $factorial * $i;
            }
             
            echo "The factorial of $num is $factorial";
        ?>

        <hr>

        <h3>Factorial(While loop):</h3>

        <?php
            $num = 5;
            $i = $num;
            $factorial = 1;
            while($i>=1){
                $factorial = $factorial * $i;
                $i--;
            }
            echo "The factorial of $num is $factorial";
        ?>

        <hr>

        <h3>Sum Of Natural Numbers(For loop):</h3>

        <?php
            $sum=0;
            for($i=1; $i<=10; $i++){
               $sum += $i;
            }
            echo "Sum of 10 natural numbers is $sum";
        ?>
        <hr>

        <h3>Sum Of Natural Numbers(While loop):</h3>

        <?php
            $sum=0;
            $i=1;
            while($i<=10){
                $sum += $i;
                $i++;
            }
            echo "Sum of 10 natural numbers is $sum";
        ?>

        <hr>
        <p>Prepared by Rida Jawwad</p>
    </main>
    <footer></footer>
</body>
</html>