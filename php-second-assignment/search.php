<?php 

require ("connection.php") ;

    $firstName  = "" ;
    $lastName   = "" ;
    $age        = "" ;
    $email      = "";
    $Count      = 0 ;
    $WHERE      = "" ;
    $AND        = "";
     
     
    if(!empty(trim($_POST['searchFirstName'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $firstName  = $AND." First_name LIKE  '%" .$_POST['searchFirstName']. "%' ";
        $Count++;
    } 
    if(!empty(trim($_POST['searchLastName'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $lastName  = $AND." Last_name  LIKE  '%" .$_POST['searchLastName']. "%'";
        $Count++;
    } 
    if(!empty(trim($_POST['searchAge'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $age         = $AND." Age  LIKE  '%" .$_POST['searchAge']. "%' ";
        $Count++;
    } 
    if(!empty(trim($_POST['searchEmail'])))
    {
        if($Count)
        {
            $AND = " AND ";
        }
        $email         = $AND." Email  LIKE  '%" .$_POST['searchEmail']. "%' ";
        $Count++;
    } 
    if($Count)
    {
        $WHERE = " WHERE ";
    }

    $query = "select Id,First_name,Last_name,Age,Email from users ".$WHERE.$firstName.$lastName.$age.$email;
    $result_set =  mysqli_query($sqliConnection,$query);
    $num_rows = mysqli_num_rows($result_set);

    if($num_rows >= 1){
        $fetchingRecord = mysqli_fetch_assoc($result_set);
        $html = "<tr id='".$fetchingRecord['Id']."'  class='searchTr'>";
        $html .= "<td><input type='checkbox' class='checkbox' name='id' value='".$fetchingRecord['Id']."'></td>";
        $html .= "<td>".$fetchingRecord['First_name']."</td>";
        $html .= "<td>".$fetchingRecord['Last_name']."</td>";
        $html .= "<td>".$fetchingRecord['Age']."</td>";
        $html .= "<td>".$fetchingRecord['Email']."</td>";
        $html .= "<td><a href='edit.php?editPost=".$fetchingRecord['Id']."'>Edit</a></td>";
        $html .= "</tr>";
        echo $html;
    }

?>
