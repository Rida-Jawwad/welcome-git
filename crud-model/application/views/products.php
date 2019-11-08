<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Color</th>                
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($result as $key => $value){
        ?>
            <tr>
                <td><?php echo $value->product_name ?></td>
                <td><?php echo $value->price ?></td>
                <td><?php echo $value->color ?></td>                    
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>