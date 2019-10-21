<?php 
    session_start();
?>
<?php require('connection.php'); ?>
<?php

    $textArea = $_POST['userArea'];
    $sessionId = $_SESSION['userId'];

    if(!empty(trim($textArea))){

        $insertQuery        = "insert into user_posts(post,user_id) values('$textArea','$sessionId')";
        $insertResult       = mysqli_query($sqliConnection,$insertQuery);

        if($insertResult){

            $lastId         = mysqli_insert_id($sqliConnection);
            $query          = "SELECT id,post from user_posts WHERE id = $lastId and user_id = $sessionId";
            $resultSet      = mysqli_query($sqliConnection,$query);
            $fetchResultSet = mysqli_fetch_assoc($resultSet);

            $html = "<tr>";
            
            $html .= "<td>".$fetchResultSet['id']."</td>";   
            $html .= "<td class='postTd'>".$fetchResultSet['post']."</td>";   
            $html .= "<td class='actions'><a class='actions-anchor' href='edit.php?editPost=".$fetchResultSet['id']."'>Edit</a></td>";
            $html .= "<td class='actions'><a class='actions-anchor' href='delete.php?deletePost=".$fetchResultSet['id']."'>Delete</a></td>";
            
            $html .= "</tr>";
            echo $html;
        }
        else
        {
            echo "Error:".mysqli_error($sqliConnection);
                
        }
    }  

?>