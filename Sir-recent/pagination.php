<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Product </h1>  

<?php 
    require("connection_db.php");
    if(isset($_POST['submit']))
    {

        $product_name  = $_POST['product_name'];
        $price          = $_POST['price'];
        $color          = $_POST['color'];

        if(!empty( trim($product_name)) && !empty( trim($price)))
        {
            $query = "insert into products(product_name,price,color) values('$product_name',$price,'$color')";
            $result_set = mysqli_query($con,$query);
            if(!$result_set)
            {
                echo "Error : ".mysqli_error($con);
            }
            else{
                echo "Product Inserted.";
            }
        }

    }
?>
    
    <form method="post">
        <label>Product:</label>
        <input type="text" name="product_name" required>
        <label>Color:</label>
        <input type="text" name="color" required>
        <label>Price:</label>
        <input type="text" name="price" required>
        <input type="submit" name="submit" value="Add Product">
    </form>

    <?php 
 
    $limit = 6;

    $page = isset($_GET['page_num']) ? $_GET['page_num'] : 1 ; 

    $offset = ( $page - 1 )* $limit ;
    
    $query = "select * from products LIMIT $offset,$limit"; 
     
    $result_set = mysqli_query($con,$query);
    
    $products = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
        

    ?>
     <h1> Product Listing </h1>  
    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody> 
                <?php 
                    foreach($products as $product)
                    {   ?>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['product_name']?></td>
                            <td><?php echo $product['color']?></td>
                            <td><?php echo $product['price']?></td>
                        </tr>

                <?php   }
                ?>

            </tbody> 
        </table>
    </form>
    <?php 

        $query          = "select * from products"; 
        $result_set     = mysqli_query($con,$query);
        $total_num      = mysqli_num_rows($result_set);
        $total_page     = ceil($total_num / $limit);
         
        $html          = "";

        for($i=1; $i <= $total_page ;$i++)
        {
            $html .= "<a href='pagination.php?page_num=".$i."' style='margin-left:5px;'>".$i."</a>";    
        }
            echo $html;           
    ?>
</body>
</html>