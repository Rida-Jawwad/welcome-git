<h1>Users</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($fetch_data){
                $result = $fetch_data->result();
               
                foreach($result as $row){
        ?>
                <tr>
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->email ?></td>
                    <td><?php echo $row->phone_number ?></td>
                </tr>
        <?php
                }
            }
            else{
        ?>
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
        <?php
            }

        ?>
    </tbody>
</table>