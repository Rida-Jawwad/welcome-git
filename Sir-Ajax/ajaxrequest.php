<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
    <form method="post">
        <label>Product:</label>
        <input type="text" name="product_name" >
        <label>Color:</label>
        <input type="text" name="color" >
        <label>Price:</label>
        <input type="text" name="price" >
       <input type="submit" name="submit" value="Add Product">  
        

    </form>
    <?php 
require("connection_db.php");
if(isset($_POST['search']))
{

    $PriceCondition         = "" ;
    $NameCondition          = "" ;
    $ColorCondition         = "" ;
    $Count                  = 0 ;
    $WHERE                  = "" ;
    $AND                    = "";
    
    
    if(!empty(trim($_POST['name'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $NameCondition  = $AND." product_name LIKE  '%" .$_POST['name']. "%' ";
        $Count++;
    } 
    if(!empty(trim($_POST['pro_price'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $PriceCondition  = $AND." price = ".$_POST['pro_price'];
        $Count++;
    } 
    if(!empty(trim($_POST['pro_color'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $ColorCondition         = $AND." color  LIKE  '%" .$_POST['pro_color']. "%' ";
        $Count++;
    } 
    if($Count)
    {
        $WHERE = " WHERE ";
    }
    $query = " select * from products ".$WHERE.$NameCondition.$PriceCondition.$ColorCondition; 
  //  var_dump( $query);die;
}
else
{
    $query = " select * from products "; 
    
}

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
        <tfoot style="display: table-header-group !important;">
            <tr>
                <th>Search</th>
                <th><input placeholder="Product Name" name="name" value="<?php echo isset($_POST['name'])  ? $_POST['name'] : ""  ?>" ></th>
                <th><input placeholder="Product Color" name="pro_color" value="<?php echo isset($_POST['pro_color'])  ? $_POST['pro_color'] : ""  ?>"></th>
                <th><input placeholder="Product Price" name="pro_price" value="<?php echo isset($_POST['pro_price'])  ? $_POST['pro_price'] : ""  ?>"></th>
                <th><input  type="submit" name="search" value="Search"></th>
            </tr>
        </tfoot>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    
    $("form").on('submit',function(e){

         e.preventDefault();

         formData = {};

        $(this).find("input").each(function(i,v){ 
            formData[$(this).attr("name")] = $(this).val();
        }) ;  
 
        $.ajax({
            url:"abcd.php",
            type:"POST",
            dataType:"html",
            cache:false,
            data:formData,
            success:function(response){
                     
                    $("table > tbody").append(response);

                } 
            
        }) 
         
          

   
    }) 

    
    // var XHR = new XMLHttpRequest();
    // XHR.open("GET","abcd.php");
     
    // XHR.onreadystatechange = function(){
    //     console.log(XHR.responseText);
    // }
    
    // XHR.send();

 
    </script>
</body>
</html>