<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <title>Document</title>
</head>
<body>
    <?php require_once('data.php'); ?>

    <div class='profile'>
        <table>
            <thead>
                <tr>
                    <th colspan="2" >WELCOME <?php echo $_SESSION['name']; ?> ! </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>NAME : </td>
                <td><?php echo $_SESSION['name'] ; ?></td>
                </tr>
                <tr>
                <td>AGE : </td>
                <td><?php echo $_SESSION['age'] ; ?></td>
                </tr>
                <tr>
                <td>PHONE NO : </td>
                <td><?php echo $_SESSION['phone_num'] ; ?></td>
                </tr>
            </tbody>
        </table>

        <a href='logout.php'>LOG OUT</a>
    </div>
</body>
</html>
