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
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/07f52386ae.js" crossorigin="anonymous"></script>
</head>
<body>

<?php require('constant.php'); ?>
<?php require('connection.php'); ?>

    <div class="wall-main-div">
        <div class="icon-div" title="User profile"><a href="userProfile.php"><i class="fas fa-user"></i></a></div>

        <h1>Dashboard</h1> 

        <form method="post">
            <label for="post"><?php echo TEXTAREA_LABEL ?></label><br>
            <textarea name="userArea" placeholder="What's on your mind?!"></textarea><br>
            <input type="submit" name="submit" value="Post">
        </form>

        <?php
            $sessionId          = $_SESSION['userId'];
            $selectQuery        = "Select id,post from user_posts where user_id = $sessionId order by id desc";
            $resultSet          = mysqli_query($sqliConnection,$selectQuery);            
            $fetchingRecords    = mysqli_fetch_all($resultSet,MYSQLI_ASSOC);    
        ?>
        <table>

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Posts</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($fetchingRecords as $key => $value) {                    
                ?>

                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td class="postTd"><?php echo $value['post'] ?></td>
                    <td class="actions"><a class="actions-anchor" href="edit.php?editPost=<?php echo $value['id'] ?>">Edit</a></td>
                    <td class="actions"><a class="actions-anchor" href="delete.php?deletePost=<?php echo $value['id'] ?>">Delete</a></td>
                </tr>

                <?php
                    }
                ?>
            </tbody>

        </table>
        <div class="div"><a href="logout.php" class="logout">Logout</a></div>
    </div>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $('form').on('submit',function(e){
            
            e.preventDefault();

            textAreaData = {};

            $(this).find('textarea').each(function(){
                textAreaData[$(this).attr('name')] = $(this).val();
            });

            $.ajax({
                url         : "ajax.php",
                type        : "POST",
                dataType    : "html",
                cache       : false,
                data        : textAreaData,
                success     : function(response){

                    swal("Posted")
                    .then(function(e){
                        $('table > tbody').prepend(response);
                        $("form").trigger("reset");
                    })
                    
                }

            });

        })
    </script>
</body>
</html>








