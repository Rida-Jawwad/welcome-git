<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require('connection.php'); ?>
    <h1>Insert products</h1>
<?php
    
    if(isset($_POST['add'])){

        $productName = $_POST['product_name'];
        $productPrice = $_POST['price'];
        $productColor = $_POST['color'];

        if(!empty(trim($productName)) && !empty(trim($productColor)) && !empty(trim($productPrice))){

            $insertQuery = "insert into products(product_name,price,color) values('$productName',$productPrice,'$productColor')";
            $insertResult = mysqli_query($sqliConnection,$insertQuery);
            if($insertResult){
                echo "Product Inserted";
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
    <form method="post">
        <label>Product:</label>
        <input type="text" name="product_name" required>
        <label>Color:</label>
        <input type="text" name="color" required>
        <label>Price:</label>
        <input type="number" name="price" required>
        <input type="submit" name="add" value="Add Product">
    </form>
</body>
</html>