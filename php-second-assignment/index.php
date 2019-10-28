<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require('connection.php'); ?>
    <form method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br><br>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br><br>
        <label for="age">Age:</label>
        <input type="text" name="age" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <label for="re-password">Confirm password:</label>
        <input type="password" name="re-password" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        $selectQuery = "select * from users";
        $selectQueryResult = mysqli_query($sqliConnection,$selectQuery);
        $fetchRecords = mysqli_fetch_all($selectQueryResult,MYSQLI_ASSOC);
        // var_dump($fetchRecords);
    ?>
    <h1>Records</h1>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>
        </thead>
        <tfoot style="display: table-header-group !important;" class="searchForm">
            <tr>
                <th>Search</th>
                <th><input placeholder="First Name" class="search" name="searchFirstName" value="<?php echo isset($_POST['firstName'])  ? $_POST['firstName'] : ""  ?>" ></th>
                <th><input placeholder="Last Name" class="search" name="searchLastName" value="<?php echo isset($_POST['lastName'])  ? $_POST['lastName'] : ""  ?>"></th>
                <th><input placeholder="Age" class="search" name="searchAge" value="<?php echo isset($_POST['age'])  ? $_POST['age'] : ""  ?>"></th>
                <th><input placeholder="Email" class="search" name="searchEmail" value="<?php echo isset($_POST['email'])  ? $_POST['email'] : ""  ?>"></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                foreach ($fetchRecords as $value) {
                    ?>
                        <tr id="<?php echo $value['Id']; ?>" class="class">
                        <td><input type="checkbox" class="checkbox" name="id" value="<?php echo $value["Id"]; ?>"></td>
                        <td><?php echo $value['First_name'] ?></td>
                        <td><?php echo $value['Last_name'] ?></td>
                        <td><?php echo $value['Age'] ?></td>
                        <td><?php echo $value['Email'] ?></td>
                        <td><a href="edit.php?editPost=<?php echo $value['Id'] ?>">Edit</a></td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <button type="button" name="delete" id="delete">Delete</button>
    
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script>
        
            
            
            $('form').on('submit',function(e){
                e.preventDefault();

                var obj = {};

                $(this).find("input").each(function(){
                obj[$(this).attr("name")] = $(this).val(); 
                }) 

                $.ajax({
                    url     : "indexAjax.php",
                    data    : obj,
                    type    : "POST",
                    dataType: "html",
                    success : function(response){
                        $(".class").show();
                        $('.searchTr').hide();
                        $("table > tbody").append(response);
                        $("form").trigger("reset");
                    }
                })
            })

            $('#delete').on('click',function(){
                if(confirm('Are you sure to delete?')){
                    var Id = [];
                    $('.checkbox:checked').each(function(e){
                        Id[e] = $(this).val();
                    })
                    if(Id.length === 0){
                        alert("Please select checkbox");
                    }
                    else{
                        $.ajax({
                            url : 'delete.php',
                            method : 'POST',
                            data : {Id:Id},
                            success : function(){
                                for(i=0; i<Id.length; i++){
                                    $('tr#'+Id[i]+'').remove();
                                    
                                }
                            }
                        })
                    }
                }
            })

            $('.search').keyup(function(e) {
                if(e.keyCode == 13) {
                    console.log('Hey');
                    searchFormData={};
                    $('.searchForm').find('input').each(function(){
                        searchFormData[$(this).attr('name')] = $(this).val();
                    });
                    $.ajax({
                    type:"post",
                    url:"search.php",
                    dataType: "html",
                    data: searchFormData,
                    success:function(response){
                            $(".class").fadeOut();
                            if($('.searchTr').length){
                                $('.searchTr').hide();
                            }
                            $("table > tbody").append(response);
                            $(".search").val("");
                        }
                    }); 
                }
            })
        
    </script>
</body>
</html>