<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>AJAX-Signup</title>
</head>
<body>

<h1> Sign Up </h1>

<form method="post">
    
        <label>Name</label>
        <input type="text" name="name" Required><br>   

        <label>Gender</label>
        <input type="text" name="gender"><br>

        <label>E-Mail</label>
        <input type="text" name="email" Required><br>
        
        <label>Password</label>
        <input type="password" name="password" Required><br>
        
        <label>Confirm Password</label>
        <input type="password" name="re-password" Required><br>
        
        <label>Phone Number</label>
        <input type="text" name="number"><br>

        <input type="submit" name="submit" value="Submit"><br>
    </form>
    
    <a href="index.php"> Sign In </a>

    <div class="loader" style="position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;text-align: center;background: url('http://themirchievous.consulnet.net/assets/images/loader-2.gif') center no-repeat #fff; opacity:0.25;display:none;">
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
    <script>
        $("form").on("submit",function(e){

            $(".loader").show();
 
                e.preventDefault();
                var obj = {};
                $(this).find("input").each(function(){
                    obj[$(this).attr("name")] = $(this).val(); 
                }) 
                $.ajax({
                    url:"signupAjax.php",
                    data:obj,
                    type:"POST",
                    dataType:"json",
                    success:function(response)
                    {
                        $(".loader").hide();
                        swal("", response.message, response.status)
                        .then(function(e){
                            $("form").trigger("reset");
                        });  
                    }
                })  
        })
    </script>
</body>
</html>