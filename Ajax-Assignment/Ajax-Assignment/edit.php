<?php require('connection.php'); ?>

<?php

    if(isset($_POST['edit_post']))
    {
        $edit = $_POST['edit_post'];

        if(isset($_POST['submit'])){
            if(!empty(trim($_POST['text']))){
                $postToEdit = $_POST['text'];
                $update  = "update posts set Posts = '$postToEdit' where id = $edit";
                $result_set = mysqli_query($con,$update);

                if(!$result_set){
                    echo "Error:" . mysqli_error($con);die;
                }
                else{
                header("Location: index.php");
                }
            }
        }
    }

?>


<form method="post">
    <label>Post: <label>
    <input type="textarea" name="text"> 

    <input type="submit" name="submit" value="Edit Post">
</form>
