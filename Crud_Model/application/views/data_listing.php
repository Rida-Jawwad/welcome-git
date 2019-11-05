<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>                
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($result as $key => $value){
        ?>
            <tr>
                <td><?php echo $value->name ?></td>
                <td><?php echo $value->email ?></td>
                <td><?php echo $value->phone_number ?></td>                    
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>