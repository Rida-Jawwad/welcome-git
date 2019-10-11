<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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

    <h1>Products Listing</h1>

    <?php
        if(isset($_POST['search'])){

            $nameCondition = "";
            $priceCondition = "";
            $colorCondition = "";
            $and = "";
            $where = "";
            $count = 0;

            if(!empty(trim($_POST['searchProductName']))){
                if($count){
                    $and = " AND ";
                }
                $nameCondition = $and."product_name LIKE '%".$_POST['searchProductName']."%'";
                $count++;
            }
            if(!empty(trim($_POST['searchProductColor']))){
                if($count){
                    $and = " AND ";
                }
                $colorCondition = $and."color LIKE '%".$_POST['searchProductColor']."%'";
                $count++;
            }
            if(!empty(trim($_POST['searchProductPrice']))){
                if($count){
                    $and = " AND ";
                }
                $priceCondition = $and."price LIKE '%".$_POST['searchProductPrice']."%'";
                $count++;
            }
            if($count){
                $where = " WHERE ";
            }
            $query = "select * from products ".$where.$nameCondition.$colorCondition.$priceCondition;
            if(isset($_POST['chooseOne'])){
                if($_POST['chooseOne'] == "descending"){
                    $query = "select * from products ".$where.$nameCondition.$colorCondition.$priceCondition." order by id desc";
                }
                elseif($_POST['chooseOne'] == "price-high-to-low"){
                    $query = "select * from products ".$where.$nameCondition.$colorCondition.$priceCondition." order by price desc";
                }
                elseif($_POST['chooseOne'] == "price-low-to-high"){
                    $query = "select * from products ".$where.$nameCondition.$colorCondition.$priceCondition." order by price asc";
                }
            }

        }
        else{
            $query = "select * from products";
        }

        $resultSet = mysqli_query($sqliConnection,$query);
        
        
        $limit = 5;
        $page = isset($_GET['page_num']) ? $_GET['page_num'] : 1;
        $offset = ($page - 1) * $limit;
        $totalNumberOfRecords = mysqli_num_rows($resultSet);
        $totalNumberOfPages = ceil($totalNumberOfRecords/$limit);

        
        $query = "$query limit $offset,$limit";
        $resultSet = mysqli_query($sqliConnection,$query);

        $fetchingProducts = mysqli_fetch_all($resultSet,MYSQLI_ASSOC);
        // var_dump($fetchingProducts)
    ?>

    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Sort by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot style="display: table-header-group !important;">
                <tr>
                    <th>Search:</th>
                    <th><input placeholder="Product Name" type="text" name="searchProductName"  value="<?php echo isset($_POST['searchProductName'])  ? $_POST['searchProductName'] : ""  ?>"></th>
                    <th><input placeholder="Product Color" type="text" name="searchProductColor"  value="<?php echo isset($_POST['searchProductColor'])  ? $_POST['searchProductColor'] : ""  ?>"></th>
                    <th><input placeholder="Product Price" type="text" name="searchProductPrice"  value="<?php echo isset($_POST['searchProductPrice'])  ? $_POST['searchProductPrice'] : ""  ?>"></th>
                <!-- </tr> -->
                <!-- <tr> -->
                    <th>
                        <!-- <label for="">Sort by:</label> -->
                        <select name="chooseOne">
                            <option value="" disabled>Select One</option>
                            <option value="ascending">Ascending</option>
                            <option value="descending" <?php echo isset($_POST['chooseOne']) && $_POST['chooseOne']=="descending" ? "selected" : '' ?>>Descending</option>
                            <option value="price-high-to-low" <?php echo isset($_POST['chooseOne']) && $_POST['chooseOne']=="price-high-to-low" ? "selected" : '' ?>>Price high to low</option>
                            <option value="price-low-to-high" <?php echo isset($_POST['chooseOne']) && $_POST['chooseOne']=="price-low-to-high" ? "selected" : '' ?>>Price low to high</option>
                        </select>
                    </th>
                    <th><input type="submit" name="search" value="Search"></th>
                </tr>
            </tfoot>
            <tbody>
            <?php
                foreach ($fetchingProducts as $value) {
                    
            ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['product_name'] ?></td>
                    <td><?php echo $value['color'] ?></td>
                    <td><?php echo $value['price'] ?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </form>
    <?php
        $html ="";
        ?><div class="div"><span>Pages:</span><?php
        for($i=1; $i<=$totalNumberOfPages; $i++){
            $html .= "<a href='products.php?page_num=".$i."'>".$i."</a>";
        }
        echo $html;
        ?></div><?php
    ?>
</body>
</html>