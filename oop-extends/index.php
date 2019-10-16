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
    class StudentsMarks {

        public $english = null;
        public $math = null;
        public $urdu = null;
        public $science = null;
        public $islamiat = null;
        public $totalMarks = null;
        public $percentage = null;

        public function __construct($english,$math,$urdu,$science,$islamiat){
            $this->english = $english;
            $this->math = $math;
            $this->urdu = $urdu;
            $this->science = $science;
            $this->islamiat = $islamiat;
        }
        public function getValues(){
            return $this->english;
            return $this->math;
            return $this->urdu;
            return $this->science;
            return $this->islamiat;
        }

        
    }

    class StudentsPercentage extends StudentsMarks {

        public function sumOfMarks(){
            $this->totalMarks = $this->english + $this->math + $this->urdu + $this->science + $this->islamiat ;
        }

        public function percentage(){
            $this->percentage = $this->totalMarks / 500 * 100;
            echo "<b>Marks Obtained:</b><br>";
            echo "English : ".$this->english."<br>";
            echo "Math : ".$this->math."<br>";
            echo "Urdu : ".$this->urdu."<br>";
            echo "Science : ".$this->science."<br>";
            echo "Islamiat : ".$this->islamiat."<br>";
            echo "<b>Total Marks : </b>".$this->totalMarks."<br>";
            echo "<b>Percentage : </b>".$this->percentage."%";
        }

    }

    echo "<h2>Rida's Marksheet</h2>";
    $firstStudent = new StudentsPercentage(78,80,88,70,90);
    $firstStudent->sumOfMarks();
    $firstStudent->percentage();

    echo "<h2>Alya's Marksheet</h2>";
    $secondStudent = new StudentsPercentage(100,55,60,84,78);
    $secondStudent->sumOfMarks();
    $secondStudent->percentage();
?>
<hr><p>Prepared by Rida Jawwad</p>
</body>
</html>