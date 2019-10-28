<?php require('connection.php'); ?>
<?php
    if($_GET['editPost']){
        $IndexToEdit        = $_GET['editPost']; 
        $selectQuery        = "Select First_name,Last_name,Age,Email from users where Id = $IndexToEdit";
        $resultSet          = mysqli_query($sqliConnection,$selectQuery);
        $fetchingRecords    = mysqli_fetch_assoc($resultSet); 
        $FirstNameValue     = $fetchingRecords['First_name'];
        $LastNameValue      = $fetchingRecords['Last_name'];
        $AgeValue           = $fetchingRecords['Age'];
        $EmailValue         = $fetchingRecords['Email'];



        if(isset($_POST['update'])){
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            if(!empty(trim($firstName)) && !empty(trim($lastName)) && !empty(trim($age)) && !empty(trim($email))){
                $editQuery  = "update users set First_name = '$firstName',Last_name = '$lastName',Age = '$age',Email = '$email' where id = $IndexToEdit";
                $editResult = mysqli_query($sqliConnection,$editQuery);
                if($editResult){
                    ?>
                        <script>
                            window.location.href = "index.php";
                        </script>
                    <?php
                }
                else
                {
                    echo "Edit Error: ".mysqli_error($sqliConnection);
                }
            }
        }
    }
?>
<h1>Edit</h1>
<form method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $FirstNameValue ?>"><br><br>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $LastNameValue ?>"><br><br>
        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo $AgeValue ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $EmailValue ?>"><br><br>
        <input type="submit" name="update" value="Update">
</form>