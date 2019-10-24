<?php

require("connection_db.php");
if(isset($_POST['submit']))
{

    $product_name   = $_POST['product_name'];
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
            $id =  mysqli_insert_id($con);
            $query = " select `id` , `product_name` , `color` , `price`  from products where id =  $id";
            
            $result_set = mysqli_query($con,$query);
            $product = mysqli_fetch_assoc($result_set);
            
            $html = "<tr>";
            foreach( $product as $value )
            {
                $html .= "<td>".$value."</td>";
            }
            $html .= "</tr>";
            echo $html;    
        }
    }

}
