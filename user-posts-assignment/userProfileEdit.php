<?php 
    session_start();
?>
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
<?php require('constant.php'); ?>
<?php require('connection.php'); ?>
<?php

    if(isset($_GET['nameEdit'])){

        $editName           = $_GET['nameEdit'];
        $selectQuery        = "Select name from useraccounts where id = $editName";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_assoc($resultSet);
        $ReturnedValue      = $fetchingRecords['name'];
        
        if(isset($_POST['update'])){

            if(!empty(trim($_POST['userEdit']))){

                $userEdit   = $_POST['userEdit'];
                $editQuery  = "update useraccounts set name = '$userEdit' where id = $editName";
                $editResult = mysqli_query($sqliConnection,$editQuery);

                if($editResult)
                {
                    ?>

                        <script>
                            swal("Edited")
                            .then(function(){

                                window.location.href = "userProfile.php";
                
                            });
                        </script>

                    <?php
                }
                else
                {
                    echo "Delete Error: ".mysqli_error($sqliConnection);
                }

            }

        }

    }


    if(isset($_GET['emailEdit'])){

        $editEmail          = $_GET['emailEdit'];
        $selectQuery        = "Select email from useraccounts where id = $editEmail";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_assoc($resultSet);
        $ReturnedValue      = $fetchingRecords['email'];
        
        if(isset($_POST['update'])){

            if(!empty(trim($_POST['userEdit']))){

                $userEdit   = $_POST['userEdit'];
                $editQuery  = "update useraccounts set email = '$userEdit' where id = $editEmail";
                $editResult = mysqli_query($sqliConnection,$editQuery);

                if($editResult)
                {
                    ?>

                        <script>
                            swal("Edited")
                            .then(function(){

                                window.location.href = "userProfile.php";
                
                            });
                        </script>

                    <?php
                }
                else
                {
                    echo "Delete Error: ".mysqli_error($sqliConnection);
                }

            }

        }

    }


    if(isset($_GET['numberEdit'])){

        $editNumber         = $_GET['numberEdit'];
        $selectQuery        = "Select phone_number from useraccounts where id = $editNumber";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_assoc($resultSet);
        $ReturnedValue      = $fetchingRecords['phone_number'];
        
        if(isset($_POST['update'])){

            if(!empty(trim($_POST['userEdit']))){

                $userEdit   = $_POST['userEdit'];
                $editQuery  = "update useraccounts set phone_number = '$userEdit' where id = $editNumber";
                $editResult = mysqli_query($sqliConnection,$editQuery);

                if($editResult)
                {
                    ?>

                        <script>
                            swal("Edited")
                            .then(function(){

                                window.location.href = "userProfile.php";
                
                            });
                        </script>

                    <?php
                }
                else
                {
                    echo "Delete Error: ".mysqli_error($sqliConnection);
                }
            }

        }

    }
?>
    <div class="user-profile-edit-div">
        <h1>Edit</h1>
        <form method="post">
            <label>Edit 
            <?php 
                if(isset($_GET['nameEdit']))
                {
                    echo YOUR_NAME;
                }
                elseif(isset($_GET['emailEdit']))
                {
                    echo YOUR_EMAIL;
                }
                elseif(isset($_GET['numberEdit']))
                {
                    echo YOUR_NUMBER;
                }
            ?>:
            </label>
            <input type="
            <?php
                if(isset($_GET['nameEdit']))
                {
                    echo "text";
                }
                elseif(isset($_GET['emailEdit']))
                {
                    echo "email";
                }
                elseif(isset($_GET['numberEdit']))
                {
                    echo "number";
                }
            ?>" name="userEdit" value="<?php echo $ReturnedValue ?>">
            <br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>