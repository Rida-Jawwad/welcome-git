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
    $hostName = "localhost";
    $Username = "root";
    $Password = "";
    $db_name = "rida_jawwad";

    $sql_connection = mysqli_connect($hostName,$Username,$Password,$db_name) or die("Connection Failed");
    if($sql_connection){
        $query = "Create table if not exists std_information(
            id int primary key auto_increment,
            name varchar(25) not null
        )";
        $sqli = mysqli_query($sql_connection,$query);
        if($sqli){
            echo "table created successfully"."<br>";
            $query = "insert into std_information(name) values('Rida'),('Huda') ";
            $sqli = mysqli_query($sql_connection,$query);
            if($sqli){
                echo "Values Inserted"."<br>";
                $query = "update std_information set name = 'Rida Jawwad' where name = 'Rida'";
                $sqli = mysqli_query($sql_connection,$query);
                if($sqli){
                    echo "Value Updated"."<br>";
                    $query = "Delete from std_information where name = 'Rida Jawwad'";
                    $sqli = mysqli_query($sql_connection,$query);
                    if($sqli){
                        echo "Value Deleted"."<br>";
                    }
                    else{
                        echo "Value not updated:" .mysqli_error($sql_connection);
                    }
                }
                else{
                    echo "Value not updated:" .mysqli_error($sql_connection);
                }
            }
            else{
                echo "Values not inserted" .mysqli_error($sql_connection);
            }
        }
        else{
            echo "Table not created:" .mysqli_error($sql_connection);
        }
        
        
        
    }

?>
</body>
</html>