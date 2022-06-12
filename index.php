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
    <title>Movie Library</title>
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
        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
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
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_movie">
    </form>
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


<div class="row px-1">
    <div class="col-md-10">
        <!--movies-->
        <div class="row">
          <!--fetching movies-->
          <?php
          getmovies();
          get_unique_genres();
          $ip = getIPAddress();  
          echo 'User Real IP Address - '.$ip;  
          ?>
            

<!--row end-->
</div>
<!--col end-->
</div>
<div class="col-md-2 bg-secondary p-0">
    <!--sidenav-->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Genres</h4></a>
        </li>
        <?php
        getgenres();
        
       ?>
        
        
    </ul>

</div>
</div>


    <div class="bg-info p-3 text-center"><p>All rights reserved ⓒ- Designed by Muskan Garg</p></div>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  </body>
</html>