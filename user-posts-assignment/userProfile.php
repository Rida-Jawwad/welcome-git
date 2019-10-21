<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v1">
</head>
<body>
<?php 
    session_start();
?>
<?php require('connection.php'); ?>
<?php
    if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){

        $sessionId          = $_SESSION['userId'];
        $selectQuery        = "select * from useraccounts where id = $sessionId";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_all($resultSet,MYSQLI_ASSOC);

    }
?>

    <div class="userProfile-main-div">
        <?php
            foreach ($fetchingRecords as $value) {
        ?>
                <h1>Hello <?php echo $value['name'] ?>!</h1>
                <span class="span">Username: </span>
                <span><?php echo $value['name'] ?></span>
                <a class="user-profile-edit-anchor-one" href="userProfileEdit.php?nameEdit=<?php echo $value['id'] ?>">Edit</a><br>
                <span class="span">Email: </span>
                <span><?php echo $value['email'] ?></span>
                <a class="user-profile-edit-anchor-two" href="userProfileEdit.php?emailEdit=<?php echo $value['id'] ?>">Edit</a><br>
                <span class="span">Phone Number: </span>
                <span><?php echo $value['phone_number'] ?></span>
                <a class="user-profile-edit-anchor-three" href="userProfileEdit.php?numberEdit=<?php echo $value['id'] ?>">Edit</a><br>
                <div class="delete-user-account"><a href="deleteAccount.php?idToDelete=<?php echo $value['id'] ?>">Delete my account</a></div>
        <?php
            }
        ?>
        <a href="wall.php">Go to dashboard</a><br>
        <div class="logout-div"><a class="logout" href="logout.php">Logout</a></div>
    </div>
</body>
</html>