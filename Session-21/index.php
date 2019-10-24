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
    
        class Students {

            public $name = null;

            public function setName(string $nameToPass){
                $this->name = $nameToPass;
            }
            public function getName(){
                return $this->name;
            }

        }

        $first_obj = new Students;
        $first_obj->setName('Ali');
        echo $first_obj->getName()."<br>";
        

        $second_obj = new Students;
        $second_obj->setName('Ahmed');
        echo $second_obj->getName()."<br>";

        $third_obj = new Students;
        $third_obj->setName('Raza');
        echo $third_obj->getName()."<br>";
        

    
    ?>
</body>
</html>