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
        if(isset($_POST['submit'])){
            $firstName = $_POST['first_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $skills = $_POST['skills'];
            $city = $_POST['city'];
            echo $firstName . "<br>";
            echo $age  . "<br>";
            echo $gender  . "<br>";
            echo $skills  . "<br>";
            echo $city;
        }
    ?>

    <form method="post">
        Name:<input type="text" name="first_name"><br><br>
        Age:<input type="text" name="age"><br>
        Gender:<input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female <br>
        Skills:<input type="checkbox" name="skills" value="creative">Creative
        <input type="checkbox" name="skills" value="cooperative">Cooperative <br>
        City:
        <select name="city">
            
            <option value="Karachi">Karachi</option>
            <option value="Lahore">Lahore</option>
            <option value="Islamabad">Islamabad</option>
            <option value="Rawalpindi">Rawalpindi</option>
        </select><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>