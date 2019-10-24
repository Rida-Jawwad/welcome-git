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
            
            $ext        = ["png","jpg","jpeg","bmp"];
            $name       = $_FILES["image"]["name"];
            $size       = $_FILES["image"]["size"];
            $tmp_name   = $_FILES["image"]["tmp_name"];
            $file_ext   = explode(".",$name);

            var_dump($file_ext[1]);die;

            $file_ext   = end($file_ext);
            
            if(in_array($file_ext,$ext)){

                 if( 5 >=  ( $size / 1024 )  )
                 {
                     
                 }else{

                    echo "File size is not valid";

                 }

            }else
            {
                echo "Extension is not valid";
            }

        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" >
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>