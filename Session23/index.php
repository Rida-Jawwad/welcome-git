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
        $to = "ayammar448@gmail.com";
        $subject = "Testing";
        $message = "Here I am sending you this email, let me know when you receive";

        mail($to,$subject,$message);
    ?>
</body>
</html>