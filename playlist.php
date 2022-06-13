<?php
include('includes/connect.php');
include('function/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My playlist</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
	<!--navbar-->
    <!--100% width navbar-->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand text-light" href="#"> MovieLiv <i class="fa-solid fa-film"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Explore</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-light" href="./user_area/registration.php">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="playlist.php">My List <i class="fa-solid fa-list-check"></i></a>
      </li>


    </ul>
    
  </div>
</nav>
    </div>
    <?php
    playlist();
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
       
<?php
if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'> Welcome Guest</a>
  </li>";
  }
    else{
      echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
    }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./user_area/login.php'>Login</a></li>";
}
  else{
    echo "<li class='nav-item'>
  <a class='nav-link' href='./user_area/logout.php'>Logout</a></li>";
  }

?>
</ul>
    </nav>

    <div class="bg-light">
    <h3 class="text-center">MOVIELIV</h3>
    <p class="text-center">"Movies can and do have tremendous influence in shaping young lives in the realm of entertainment towards the ideals and objectives of normal adulthood." ~ Walt Disney</p>
</div>



<!--playlist-->
<div class="container">
    <div class="row">
        <table class="table table-bordered text-center">
            
            <!--php code-->
            <?php
            global $con;
            $ip=getIPAddress();
            $list_query="Select * from`playlist` where ip_address='$ip'";
            $result=mysqli_query($con, $list_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
                echo "<thead>
                <tr>
                    <th>Movie Title</th>
                    <th>Movie Image</th>
                    <th>Movie Description</th>
                    <th>Watch Movie</th>
                    
                </tr>
            </thead>
            
            <tbody>";


            while($row=mysqli_fetch_array($result)){
                $movie_id=$row['p_id'];
                $select_movies="Select * from `movie` where p_id='$movie_id'";
                $result_movies=mysqli_query($con,$select_movies);
                while($row_movie=mysqli_fetch_array($result_movies)){
                    $movie_title=$row_movie['p_title'];
                    $movie_image=$row_movie['p_image'];
                    $movie_description=$row_movie['p_desc'];
                    
                
            ?>

            <tr>
                <td><?php echo $movie_title ?></td>
                <td><img src="./images/<?php echo $movie_image ?>" alt=""></td>
                <td><?php echo $movie_description ?></td>
                <td><button class="bg-info px-3 py-2 border-0 mx-3 text-light">Watch</button></td>
                
            </tr>

            <?php
        }}}
        else{
            echo "<h2 class='text-center text-danger'>Playlist is empty</h2>";
        }
        ?>
            </tbody>
        </table>
        <div class="mb-5"><a href="index.php"><button class="bg-info px-3 py-2 mx-3 border-0 mx-3 text-light">Continue Exploring</button></a></div>
    </div>
</div>



    <div class="bg-info p-3 text-center"><p>All rights reserved ⓒ- Designed by Muskan Garg</p></div>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  </body>
</html>
