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
    session_destroy();   
?>
<script>

    swal("Logged Out")
    .then(function(){

        window.location.href = "index.php";
        
    });

</script>
</body>
</html>
