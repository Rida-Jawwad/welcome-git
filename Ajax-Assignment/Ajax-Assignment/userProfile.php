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
</head>
<body>
    
<?php
require('connection.php');

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
    $user_profile = $_SESSION['user_id'];
    $query = "SELECT * FROM users where id = $user_profile"; 
    $result_set = mysqli_query($con,$query);
    $fetch_all_records = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
  
?>
<div>
    <?php foreach ($fetch_all_records as $value){ ?>

    <h3> Welcome To Your Profile </h3>
    
    <p> <?php echo 'Name: '. $value['Name'] ?> </p>
    <!-- <p> <?php //echo $value['Gender'] ?> </p> -->
    <p> <?php echo 'E-Mail: '.  $value['Email'] ?> </p>
    <p> <?php echo 'Contact-Number: '.  $value['Number'] ?> </p>
    <?php  } ?>

</div>

<?php }
else{
    header('Location: index.php');
} ?>

<a href="logout.php"> Logout </a> <br>
<a href="dashboard.php"> Dashboard </a>


</body>
</html>
