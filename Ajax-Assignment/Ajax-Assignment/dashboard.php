<?php
    session_start();
?>
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
    require('connection.php');
?>

<form method="post">
    <label> My Posts</label>
    <textarea name="my_msg"  cols="25" rows="3"></textarea>
    <input type="submit" name="submit" value="Add Post"> <br>

    <!-- <a href= "userProfile"> My Profile </a> -->
</form>

<?php
    $user_profile = $_SESSION['user_id']; 
    $query = "SELECT id,Posts FROM  posts WHERE User_ID = $user_profile order by id desc";
    $result_set = mysqli_query($con,$query);
    $fetch_all_records = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
?>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>POSTS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fetch_all_records as $value) { ?>
        
        <tr>
            <td> <?php echo $value['id'] ?></td>
            <td> <?php echo $value['Posts'] ?></td>
            <td><a href="edit.php?edit_post=<?php echo $value['id']; ?>">Edit</a></td>
            <td><a href="delete.php?delete_post=<?php echo $value['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>

<a href= "userProfile.php"> My Profile </a> <br>
<a href="logout.php"> Logout </a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>

        $("form").on('submit',function(e){
        e.preventDefault();

        formData = {};

            $(this).find("textarea").each(function(i,v)
            { 
            formData[$(this).attr("name")] = $(this).val();
            }) ;  

        $.ajax({
        url:"dashboardajax.php",
        type:"POST",
        dataType:"html",
        cache:false,
        data:formData,
        success:function(response)
            {     
                $("table > tbody").prepend(response);
            } 
        }) 

        }) 
    </script>
</body>
</html>