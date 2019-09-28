<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php require_once('constant.php'); ?>
    <?php
        $error = [];
        if(isset($_POST['submit']))
        {
            if(empty(trim($_POST['full_name'])))
            {
              $error['fullNameError'] = FN_ERROR;
            }
            if(empty(trim($_POST['age'])))
            {
              $error['ageError'] = AGE_ERROR;
            }
            if(empty($_POST['gender']))
            {
              $error['genderError'] = GENDER_ERROR;
            }
            if(!isset($_POST['skills']))
            {
              $error['skillsError'] = SKILLS_ERROR;
            }
            if(empty(trim($_POST['city'])))
            {
              $error['cityError'] = CITY_ERROR;
            }
            
           // Success Message
            if(count($error) == 0){
                ?> <span class="success"><?php echo SUCCESS; ?></span><?php
            }
            
        }
    ?>
    
   <form method="post">
        <label>NAME:</label> 
        <input name="full_name" type="text" value="<?php echo !empty($error) ? (isset($_POST['full_name']) ? $_POST['full_name'] : '') : '' ; ?>">
        <span><?php echo array_key_exists('fullNameError', $error) ? $error['fullNameError'] : '' ;  ?></span><br>

        <label>AGE:</label>
        <input name="age" type="number" value="<?php echo !empty($error) ? (isset($_POST['age']) ? $_POST['age'] : '') : '' ; ?>">
        <span><?php echo array_key_exists('ageError', $error) ? $error['ageError'] : '' ; ?></span><br>

        <label>GENDER:</label>
        <span><?php echo array_key_exists('genderError', $error) ? $error['genderError'] : '' ; ?></span><br>
        <input name="gender" type="radio" <?php echo !empty($error) ? (isset($_POST['gender']) && $_POST['gender']=="male" ? "checked" : '') : '' ; ;?> value="male"> Male<br>
        <input name="gender" type="radio" <?php echo !empty($error) ? (isset($_POST['gender']) && $_POST['gender']=="female" ? "checked" : '') : '' ; ;?> value="female"> Female<br>
        <input name="gender" type="radio" <?php echo !empty($error) ? (isset($_POST['gender']) && $_POST['gender']=="other" ? "checked" : '') : '' ; ;?> value="other"> Other <br>
        

        <label>SKILLS:</label>
        <span><?php echo array_key_exists('skillsError', $error) ? $error['skillsError'] : '' ; ?></span><br>
        <input name="skills[]" type="checkbox" <?php echo !empty($error) ? (isset($_POST['skills']) && in_array("Programming", $_POST['skills']) ?  "checked" : '') : '' ; ;?> value="Programming" > Programming<br>
        <input name="skills[]" type="checkbox" <?php echo !empty($error) ? (isset($_POST['skills']) && in_array("Communication", $_POST['skills']) ? "checked" : '') : '' ; ; ?> value="Communication" > Communication<br>
        <input name="skills[]" type="checkbox" <?php echo !empty($error) ? (isset($_POST['skills']) && in_array("Manangement", $_POST['skills']) ? "checked" : '') : '' ; ; ?> value="Manangement" > Manangement<br>
        
        <select name="city"> 
            <option value="">Select City</option>
            <option value="karachi" <?php echo !empty($error) ? (isset($_POST['city']) && $_POST['city']=="karachi" ? "selected" : '') : '' ; ;?> >Karachi</option>
            <option value="islamabad" <?php echo !empty($error) ? (isset($_POST['city']) && $_POST['city']=="islamabad" ? "selected" : '') : '' ; ;?> >islamabad</option>
            <option value="lahore" <?php echo !empty($error) ? (isset($_POST['city']) && $_POST['city']=="lahore" ? "selected" : '') : '' ; ;?> >lahore</option>
            <option value="peshawar" <?php echo !empty($error) ? (isset($_POST['city']) && $_POST['city']=="peshawar" ? "selected" : '') : '' ; ;?> >peshawar</option>
            <option value="hyderabad" <?php echo !empty($error) ? (isset($_POST['city']) && $_POST['city']=="hyderabad" ? "selected" : '') : '' ; ;?> >hyderabad</option>
        </select>
        <span><?php echo array_key_exists('cityError', $error) ? $error['cityError'] : '' ; ?></span><br>
        <input name="submit" type="submit" value="submit"/>
   </form>
</body>
</html>