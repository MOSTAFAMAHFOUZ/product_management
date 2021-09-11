<?php include 'inc/conn.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >

    <title>Login</title>
  </head>
  <body>
    <h1 class="p-5 text-center">Login</h1>

    <?php 

        

        if(isset($_GET['id'])){
            echo $_GET['id'];
        }
        if(isset($_POST['email'])){
            // $email = mysqli_real_escape_string($conn,htmlspecialchars(htmlentities($_POST['email'])));
            // $password =  mysqli_real_escape_string($conn,htmlspecialchars(htmlentities($_POST['password'])));
            // $pass = password_verify($password,'$2y$10$IHKzbUpId7mXbI.Ez3B5besMHI3w3KH0Z4jGWBf.7M2kXhqbQGq/2');
           
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            echo $count;
           
            // $sql = "SELECT * FROM users  WHERE email='$email' and password='$password'";
            // echo $sql;
            // $result = mysqli_query($conn,$sql);
            // $count = mysqli_num_rows($result);
            // echo "<br>";
            // // anythig' or 'a'='a
            // // var_dump($count);
            while($row = mysqli_fetch_array($result))
            {
                echo $row['name']. "<br>";
            }
            // if($result){
            //     echo "sdfasdff";
            //     var_dump(mysqli_fetch_assoc($result));
            // }
            // echo  htmlspecialchars( htmlentities($_POST['email']));

        }

    ?> 

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" name="password" class="form-control" id="pass" >
                    </div>
        
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>


<!-- <script>window.addEventListener("load",(event)=>{const pass=document.getElementById("pass");console.log(pass.addEventListener("keyup",function(){console.log(pass.value)}))});</script> -->
<!-- form.addEventListener("submit",function(){alert("email is : "+email)}); -->

  </body>
</html>

<!-- <script>window.addEventListener("load",(event)=>{const%20email=document.getElementById("email");console.log(email.addEventListener("keyup",function(){console.log(email.value)}))});</script>s -->

<!-- https://github.com/MOSTAFAMAHFOUZ/php-workshop-1-design.git -->

<!-- foreach(getallheaders() as $key => $val){
            echo $key . " => " . $val . "<br>";
        }

        var_dump(apache_request_headers());
        var_dump(get_headers("https://www.youtube.com/")); -->