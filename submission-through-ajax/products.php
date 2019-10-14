<?php 
    session_start();
?>
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

    <form method="post" class="additionOfProducts">
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
        $sessionId = $_SESSION['userId'];
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
            $query = "select * from products ".$where.$nameCondition.$colorCondition.$priceCondition." and user_id = $sessionId";

        }
        else{
            $query = "select * from products where user_id = $sessionId";
        }

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
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot style="display: table-header-group !important;">
                <tr>
                    <th>Search:</th>
                    <th><input placeholder="Product Name" type="text" name="searchProductName"  value="<?php echo isset($_POST['searchProductName'])  ? $_POST['searchProductName'] : ""  ?>"></th>
                    <th><input placeholder="Product Color" type="text" name="searchProductColor"  value="<?php echo isset($_POST['searchProductColor'])  ? $_POST['searchProductColor'] : ""  ?>"></th>
                    <th><input placeholder="Product Price" type="text" name="searchProductPrice"  value="<?php echo isset($_POST['searchProductPrice'])  ? $_POST['searchProductPrice'] : ""  ?>"></th>

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
</body>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script>

    $('.additionOfProducts').on('submit',function(e){
        e.preventDefault();
        formData = {};
        $(this).find('input').each(function(){
            formData[$(this).attr('name')] = $(this).val();
        }) ; 

        $.ajax({
            url : "ajax.php",
            type : "POST",
            dataType : "html",
            cache : false,
            data : formData,
            success : function(response){
                $('table > tbody').append(response);
            }
        });
        
    })

</script>
<div class="div"><a href="logout.php" class="logout">Logout</a></div>
</html>




















