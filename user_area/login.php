<?php
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
  
      
      

    <div class="bg-light">
    <h3 class="text-center">MOVIELIV</h3>
    <p class="text-center">"Movies can and do have tremendous influence in shaping young lives in the realm of entertainment towards the ideals and objectives of normal adulthood." ~ Walt Disney</p>
</div>

      <div class="container-fluid my-3">
          <h2 class="text-center">Login</h2>
          <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-12 col-xl-6">

              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-outline mb-4">
                      <!--username field-->
                      <label for="user_username" class="form-label">Username</label>
                      <input type="text" id="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                  </div>

                  <div class="form-outline mb-4">
                      <!--password field-->
                      <label for="user_password" class="form-label">Password</label>
                      <input type="password" id="text" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                  </div>
                  <div class="mt-4 pt-2">
                  <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                  <p class="small fw-bold mt-2 pt-1 mb-0">New user?<a href="registration.php" class="text-danger"> Create New Account</a></p>
</div>

</form>               
</div>
</div>
</div>
</body>
</html>
<?php

if(isset($_POST['user_login'])){
    $username=$_POST['user_username'];
    $password=$_POST['user_password'];

    $select_query="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_array($result);
    if($row_count>0)
    {
        $_SESSION['username']=$username;
        if($password=$row_data['user_password']){
            echo "<script>alert('Login successfull.')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
        else{
            echo "<script>alert('Invalid Credentials.')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials.')</script>";
    }
}

?>