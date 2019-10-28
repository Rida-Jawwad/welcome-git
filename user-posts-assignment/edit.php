<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
<?php 
    session_start();
?>
<?php require('connection.php'); ?>
<?php
    $sessionId = $_SESSION['userId'];

    if(isset($_GET['editPost'])){

        $IndexToDelete      = $_GET['editPost']; 
        $selectQuery        = "Select id,post from user_posts where user_id = $sessionId and id = $IndexToDelete";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_assoc($resultSet); 
        $ReturnedValue      = $fetchingRecords['post'];
         
        if(isset($_POST['update'])){

            if(!empty(trim($_POST['postToEdit']))){

                $textArea   = $_POST['postToEdit'];
                $editQuery  = "update user_posts set post = '$textArea' where id = $IndexToDelete";
                $editResult = mysqli_query($sqliConnection,$editQuery);
                if($editResult)
                {
                    ?>

                        <script>
                            swal("Edited")
                            .then(function(){

                                window.location.href = "wall.php";
                
                            });
                        </script>

                    <?php
                }
                else
                {
                    echo "Edit Error: ".mysqli_error($sqliConnection);
                }

            }

        }
        
    }
?>
<div class="edit-main-div">
    <h1>Edit</h1>
    <form method="post">
        <label>Edit your post here</label>
        <textarea name="postToEdit"><?php echo $ReturnedValue ?></textarea>
        <input type="submit" name="update" value="Update">
    </form>
</div>
</body>
</html>