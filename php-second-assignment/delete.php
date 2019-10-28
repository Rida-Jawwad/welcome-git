<?php require('connection.php'); ?>
<?php
    if(isset($_POST["Id"]))
    {
    foreach($_POST["Id"] as $Id)
    {
    $sql = "DELETE FROM users WHERE id='".$Id."'";
    $result = mysqli_query($sqliConnection, $sql);
    }
    }
?>