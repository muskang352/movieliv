<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
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
          <h2 class="text-center">New User Registration</h2>
          <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-12 col-xl-6">

              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-outline mb-4">
                      <!--username field-->
                      <label for="user_username" class="form-label">Username</label>
                      <input type="text" id="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                  </div>

                  <div class="form-outline mb-4">
                      <!--email field-->
                      <label for="user_email" class="form-label">E-mail</label>
                      <input type="text" id="text" id="user_email" class="form-control" placeholder="Enter your e-mail" autocomplete="off" required="required" name="user_email"/>
                  </div>

                  <div class="form-outline mb-4">
                      <!--password field-->
                      <label for="user_password" class="form-label">Password</label>
                      <input type="password" id="text" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                  </div>
                  <div class="mt-4 pt-2">
                  <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="login.php" class="text-danger"> Login</a></p>
</div>

</form>               
</div>
</div>
</div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $username=$_POST['user_username'];
    $email=$_POST['user_email'];
    $password=$_POST['user_password'];
    $user_ip=getIPAddress();


    $select_query="Select * from `user_table` where username='$username' or user_email='$email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo "<script>alert('Username and email already exist.')</script>";
    }
    else{
        $insert_query="insert into `user_table` (username, user_email,user_password,user_ip) values('$username','$email','$password','$user_ip')";
    $sql_execute=mysqli_query($con,$insert_query);
    }

    $select_movie_items="Select * from `playlist` where ip_address='$user_ip'";
    $result_list=mysqli_query($con,$select_movie_items);
    $rows_count=mysqli_num_rows($result_list);
    if($rows_count>0)
    {
        $_SESSION['username']=$username;

    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
    
}
?>