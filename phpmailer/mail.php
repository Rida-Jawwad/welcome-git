<?php     
$to_email = 'ayammar448@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: ridajawad999@gmail.com';
mail($to_email,$subject,$message,$headers);
if(mail($to_email,$subject,$message,$headers)){
    echo "Done";
}
?>