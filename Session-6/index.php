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
        $status = 2;
        $std_info = [
                        "std_1" =>  [
                                        "Name"   => "Rida",
                                        "Dob"    => "04/09/2000",
                                        "Age"    => "18",
                                        "Status" => "1"
                                    ],
                        "std_2" =>  [
                                        "Name"   => "Aymen",
                                        "Dob"    => "05/10/1998",
                                        "Age"    => "20",
                                        "Status" => "2"
                                    ],
                        "std_1" =>  [
                                        "Name"   => "Rida",
                                        "Dob"    => "04/09/2000",
                                        "Age"    => "18", 
                                        "Status" => "1"
                        ],
                    ];

        foreach($std_info as $std ){
            if( $std['Status'] == $status ){


                foreach($std as $key => $value){
                    echo $key . ":" . $value . "<br>";
                    
                }
            
            
            }
        }
    ?>
</body>
</html>