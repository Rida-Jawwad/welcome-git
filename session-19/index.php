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

    

    $limit = 5;
    $page = isset($_GET['page_num']) ? $_GET['page_num'] : 1;
    $offset = ($page - 1)*$limit;

    $query = "select * from pagination limit $offset,$limit";
    $result_set = mysqli_query($sql_connection,$query);
    
    
    
    
    
    $query = "select * from pagination ";
    
    $result_set = mysqli_query($sql_connection,$query);
    $totalNumberOfRecords = mysqli_num_rows($result_set);
    $totalNumberOfPages = ceil($totalNumberOfRecords/$limit);
    // var_dump($totalNumberOfPages);
    $html = "";
    for($i=1; $i <= $totalNumberOfPages; $i++){
        $html .= "<a href='index.php?page_num=".$i."'>".$i."</a>"; 
    }
    echo $html;
    
    ?>
</body>
</html>