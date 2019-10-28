<?php require("connection.php") ?>

<?php
    if(isset($_GET['delete_post']))
    {
        $Index  = $_GET['deletePost'];
        $delete    = "Delete from Posts where id = $Index";

       $result_set = mysqli_query($con,$delete);
       if($result_set){
            header('Location: dashboard.php');
       }
       else{
           echo "Error !" .mysqli_error($con);
       }
    }
?>