<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table>
<thead>
<tr>
<?php
        $status = "Active";
        $std_info = [
                        "std_1" => [
                                    "Name"   => "Rida",
                                    "DOB"    => "04/09/2000",
                                    "Age"    => "18",
                                    "Status" => "Active"
                                   ],
 
                        "std_2" => [
                                    "Name"   => "Insiya",
                                    "DOB"    => "05/10/2000",
                                    "Age"    => "18",
                                    "Status" => "Active"
                                   ],

                        "std_3" => [
                                    "Name"   => "Kulsoom",
                                    "DOB"    => "10/01/1998",
                                    "Age"    => "20",
                                    "Status" => "Inactive"
                                   ],

                        "std_4" => [
                                    "Name"   => "Zainab",
                                    "DOB"    => "06/05/1999",
                                    "Age"    => "19",
                                    "Status" => "Inactive"
                                   ],

                        "std_5" => [
                                    "Name"   => "Anum",
                                    "DOB"    => "07/04/2000",
                                    "Age"    => "18",
                                    "Status" => "Active"
                                  ]
                    ];


    foreach($std_info['std_1'] as $key => $value){
?>
        <th><?php echo $key ?></th>
<?php
    }
?>

</tr>
</thead>
<tbody>

    
<?php
    foreach($std_info as $key => $value){
        if($value['Status'] == $status){
?>
<tr>
<?php
        foreach($value as $innerkey => $innerValue){
?>
            <td><?php echo $innerValue ?></td>
<?php
        }
?>
</tr>
<?php    
    }
?>

<?php
    }
?>


</tbody>
</table>
</body>
</html>