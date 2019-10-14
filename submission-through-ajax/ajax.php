<?php 
    session_start();
?>
<?php require('connection.php'); ?>
<?php
    
    if(isset($_POST['add'])){

        $productName = $_POST['product_name'];
        $productPrice = $_POST['price'];
        $productColor = $_POST['color'];

        if(!empty(trim($productName)) && !empty(trim($productColor)) && !empty(trim($productPrice))){
            $sessionId = $_SESSION['userId'];
            
            $insertQuery = "insert into products(product_name,price,color,user_id) values('$productName',$productPrice,'$productColor','$sessionId')";
            $insertResult = mysqli_query($sqliConnection,$insertQuery);
            if($insertResult){
                echo "Product Inserted";
                $lastId = mysqli_insert_id($sqliConnection);
                $query = "SELECT `id`,`product_name`,`color`,`price` FROM `products` WHERE id = $lastId";
                $resultSet = mysqli_query($sqliConnection,$query);
                $fetchResultSet = mysqli_fetch_assoc($resultSet);

                $html = "<tr>";
                foreach ($fetchResultSet as $value) {
                    $html .= "<td>".$value."</td>";
                }
                $html .= "</tr>";
                echo $html;

                
            }
            else{
                echo "Error : ".mysqli_error($sqliConnection);
            }

        }
        else{
            echo "Check all your fields";
        }

    }
?>