<?php
    session_start();
    require('connection.php');
    echo "Shit";

    if(isset($_POST['submit'])){
              
        $postArea = $_POST['my_msg'];
        echo $postArea;
        $user_profile = $_SESSION['user_id'];
        if(!empty(trim($postArea)))
    {
        
        $query = "INSERT INTO posts(Posts,User_ID) VALUES('$postArea','$user_profile')";
        $result_set = mysqli_query($con,$query);

        if($query)
    {
        echo "Printed";
        $last_ID = mysqli_insert_id($con);
        echo ($last_ID);
        $second_query = "SELECT id,Posts from posts where id = $last_ID AND User_ID = $user_profile";
        $second_result = mysqli_query($con,$second_query);
        $fetch_all_records = mysqli_fetch_assoc($second_result);

        $html = "<tr>";


            $html .= "<td>" . $fetch_all_records['id'] . "</td>";
            $html .= "<td>" . $fetch_all_records['Posts'] . "</td>";

        $html .= "</tr>";
        echo $html; 
    }
    }
    
    }

    
?>