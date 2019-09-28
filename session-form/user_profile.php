<?php
    session_start();
    echo $_SESSION['name']."<br>";
    echo $_SESSION['age']."<br>";
    echo $_SESSION['phoneNumber']."<br>";
?>
<a href="logout.php">Logout</a>


