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
            $ext = ['png','jpg','jpeg','bmp'];
            $name = $_FILES['file-input']['name'];
            $size = $_FILES['file-input']['size'];
            $tmp_name = $_FILES['file-input']['tmp_name'];
            
            $file_explode = explode('.',$name);
            $file_ext = end($file_explode);
            $file_ext = strtolower($file_ext);
            var_dump($file_ext);
            $dir = "./uploads/";

            if(in_array($file_ext,$ext)){
                $size = ($size / 1024);
                if(1024 >= $size){

                    if(!file_exists($dir.$name)){
                        $movingFile = move_uploaded_file($tmp_name,$dir.$name);
                        if($movingFile){
                            echo "moved";
                        }
                        else{
                            echo "moving error";
                        }
                    }
                    else{
                        $explode_name = explode(".",$name);
                        $explode_name = array_splice($explode_name,0,-1);
                        $explode_name[] = time();

                        $newName = implode("_",$explode_name);
                        $newName = $newName.'.'.$file_ext;
                        var_dump($newName);
                        $movingFile = move_uploaded_file($tmp_name,$dir.$newName);
                        if($movingFile){
                            echo "moved";
                        }
                        else{
                            echo "moving error";
                        }
                    }

                }
                else{
                    echo "File size error";
                }
            }
            else{
                echo "Extension is not valid";
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file-input">
        <input type="submit" value="Upload file" name="submit">
    </form>
</body>
</html>