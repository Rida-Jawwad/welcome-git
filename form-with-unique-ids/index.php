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
        $form_visible = True;
        $Error = True;
        if(isset($_POST['login'])){
            
            $user_information =  [
                                    "user1" =>  [
                                                    "uniqueId" => "001",
                                                    "name" => "Rida",
                                                    "age"  => "19",
                                                    "phoneNumber" => "03005678945"
                                                ],
                                    "user2" =>  [
                                                    "uniqueId" => "002",
                                                    "name" => "Kulsoom",
                                                    "age"  => "20",
                                                    "phoneNumber" => "03013456735"
                                                ],
                                    "user3" =>  [
                                                    "uniqueId" => "003",
                                                    "name" => "Insiya",
                                                    "age"  => "19",
                                                    "phoneNumber" => "03338793462"
                                                ]
                                ];
            $user_credentials = [
                                    "user1" =>  [
                                                    "uniqueId" => "0011",
                                                    "email" => "user1@gmail.com",
                                                    "password" => "user1pass",
                                                    "user_information_id" => "001"
                                                ],
                                    "user2" =>  [
                                                    "uniqueId" => "0012",
                                                    "email" => "user2@gmail.com",
                                                    "password" => "user2pass",
                                                    "user_information_id" => "002"
                                                ],
                                    "user3" =>  [
                                                    "uniqueId" => "0013",
                                                    "email" => "user3@gmail.com",
                                                    "password" => "user3pass",
                                                    "user_information_id" => "003"
                                                ],
                                ];
            
            foreach ($user_credentials as $credValue) {
                if($credValue['email'] == $_POST['email'] && $credValue['password'] == $_POST['password']){
                    $Error = False;
                    $form_visible = False;
                    foreach ($user_information as $infoValue) {
                        if($infoValue['uniqueId'] == $credValue['user_information_id']){
                            echo $infoValue['name']."<br>";
                            echo $infoValue['age']."<br>";
                            echo $infoValue['phoneNumber']."<br>";
                            break;
                        }
                    }
                    break;
                }
            }
            if($Error){
                echo "Invalid Email or Password";
            }
        }

        if($form_visible){

    ?>

    <form method="post">
        <label>Email</label>
        <input type="email" name="email"> 
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" name="login" value="Login">
    </form>

    <?php
        }
    ?>
</body>
</html>