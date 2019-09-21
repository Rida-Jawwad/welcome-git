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
        if(isset($_POST['submit']))
        {

            $error = [];
            if(empty(trim($_POST['full_name']))){
                $error[] = "Full name is required";
            }
            if(empty(trim($_POST['age']))){
                $error[] = "Age is required";
            }
            if(empty(trim($_POST['gender']))){
                $error[] = "Gender is required";
            }
            if(!isset($_POST['skills'])){
                $error[] = "Skills is required";
            }
            if(empty(trim($_POST['city']))){
                $error[] = "City is required";
            }

            if(count($error) > 0){
                foreach ($error as $value) {
                    ?>
                        <p><?php echo $value; ?></p>
                    <?php
                }
            }
            else{
                echo $_POST['full_name'];
                echo $_POST['age'];
                echo $_POST['gender'];
                echo $_POST['skills'];
                echo $_POST['city'];
            }

            
        }
    ?>
   <form method="post">
        <label>NAME:</label> 
        <input name="full_name" type="text" /><br>

        <label>AGE:</label>
        <input name="age" type="n                                                                                                                                                                                                                                                                                                                                                               umber" /><br>

        <label>GENDER:</label><br>
        <input name="gender" type="radio" value="male" checked> Male<br>
        <input name="gender" type="radio" value="female"> Female<br>
        <input name="gender" type="radio" value="other"> Other <br>

        <label>SKILLS:</label><br>
        <input name="skills" type="checkbox" value="Programming" > Programming<br>
        <input name="skills" type="checkbox" value="Communication" > Communication<br>
        <input name="skills" type="checkbox" value="Manangement" > Manangement<br>
        
        <select name="city">
            <option value="">Select city</option>
            <option value="karachi">Karachi</option>
            <option value="islamabad">islamabad</option>
            <option value="lahore">lahore</option>
            <option value="peshawar">peshawar</option>
            <option value="hyderabad">hyderabad</option>
        </select><br>
        <input name="submit" type="submit" value="submit"/>
   </form>
</body>
</html>