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
    
<?php require('connection.php'); ?>
<?php
    if(isset($_GET['deletePost'])){

        $IndexToDelete  = $_GET['deletePost'];
        $deleteQuery    = "Delete from user_posts where id = $IndexToDelete";
        $deleteResult   = mysqli_query($sqliConnection,$deleteQuery);

        if($deleteResult){
            ?>

                <script>
                    swal("Deleted")
                    .then(function(){

                        window.location.href = "wall.php";
        
                    });
                </script>

            <?php
        }
        else
        {
            echo "Delete Error: ".mysqli_error($sqliConnection);
        }
        
    }
?>

</body>
</html>
