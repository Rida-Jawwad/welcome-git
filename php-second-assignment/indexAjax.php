<?php require('connection.php'); ?>
<?php require('constant.php'); ?>
<?php
    $error      = false;
    $response   = [];

    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        // var_dump($email);
        $password = $_POST['password'];
        $rePassword = $_POST['re-password'];

        if(!empty(trim($firstName)) && !empty(trim($lastName)) && !empty(trim($age)) && !empty(trim($email)) && !empty(trim($password)))
        {
            $emailQuery = "select * from users where email = '$email'";
            $emailQueryResult = mysqli_query($sqliConnection,$emailQuery);
            $numRows = mysqli_num_rows($emailQueryResult);

            if($numRows == 0){

                if($password == $rePassword){
                    $hashPassword = password_hash($password,PASSWORD_DEFAULT);

                    $insertQuery = "INSERT INTO users (First_name, Last_name, Age, Email, Password) VALUES ('$firstName', '$lastName', '$age', '$email', '$hashPassword');";
                    $insertResult = mysqli_query($sqliConnection,$insertQuery);
                    if($insertResult){
                       $lastId = mysqli_insert_id($sqliConnection);
                       $lastInsertQuery = "select Id,First_name,Last_name,Age,Email from users where id = $lastId";
                       $lastInsertedResult = mysqli_query($sqliConnection,$lastInsertQuery);
                       $fetchingRecord = mysqli_fetch_assoc($lastInsertedResult);

                       $html = "<tr id='".$fetchingRecord['Id']."'  class='class'>";
                       $html .= "<td><input type='checkbox' class='checkbox' name='id' value='".$fetchingRecord['Id']."'></td>";
                       $html .= "<td>".$fetchingRecord['First_name']."</td>";
                       $html .= "<td>".$fetchingRecord['Last_name']."</td>";
                       $html .= "<td>".$fetchingRecord['Age']."</td>";
                       $html .= "<td>".$fetchingRecord['Email']."</td>";
                       $html .= "<td><a href='edit.php?editPost=".$fetchingRecord['Id']."'>Edit</a></td>";
                       $html .= "</tr>";
                       echo $html;
                    }
                    else{
                        echo "Not Inserted";
                        $error      = true;
                    }

                }
                else{
                    echo "Passwords don't match";
                    $error      = true;
                }

            }
            else{
                echo "This email already exists";
                $error      = true;
            }
        }
        else
        {
            echo "Check all your fields";
            $error      = true;
        }


    }
?>