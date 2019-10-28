<?php 
    session_start();
?>
<?php
        require('connection.php');
        $response = [];
        if(isset($_POST['submit']))
        { 
            $email      = $_POST['email'];
            $password   = $_POST['password'];
    
            $query = "SELECT id FROM USERS WHERE Email = '$email' and Password = '$password' ";
            $result_set = mysqli_query($con,$query);
    
            if(mysqli_num_rows($result_set) > 0 )
            {
                $user_details = mysqli_fetch_assoc($result_set);

    
                $_SESSION['user_id'] = $user_details['id'];
                
                $response["status"]  = "success";
                $response["message"] = "Login Successfully";
            }
            else
            {
                $response["status"]  = "error";
                $response["message"] = "Credentials are incorrect.";
            }
            echo json_encode($response); 
        }

        
?>