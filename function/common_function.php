<?php

//including connect file
//include('./includes/connect.php');


//getting movies
function getmovies()
{
    global $con;

    if(!isset($_GET['category'])){
    $select_query="Select * from `movie` order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $movie_id=$row['p_id'];
            $movie_title=$row['p_title'];
            $movie_description=$row['p_desc'];
            $movie_image=$row['p_image'];
            $category_id=$row['c_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img class='card-img-top' src='./adminarea/movie_images/$movie_image' alt='$movie_title'>
            <div class='card-body'>
              <h5 class='card-title'>$movie_title</h5>
              <p class='card-text'>$movie_description</p>
              <a href='index.php?playlist=$movie_id' class='btn btn-info'><i class='fa-solid fa-circle-plus'></i></a>
            </div>
      </div>
</div>";
    }
}
}

//getting unique genres
function get_unique_genres()
{
    global $con;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="Select * from `movie` where c_id=$category_id";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $movie_id=$row['p_id'];
            $movie_title=$row['p_title'];
            $movie_description=$row['p_desc'];
            $movie_image=$row['p_image'];
            $category_id=$row['c_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img class='card-img-top' src='./adminarea/movie_images/$movie_image' alt='$movie_title'>
            <div class='card-body'>
              <h5 class='card-title'>$movie_title</h5>
              <p class='card-text'>$movie_description</p>
              <a href='index.php?playlist=$movie_id' class='btn btn-info'><i class='fa-solid fa-circle-plus'></i></a>
            </div>
      </div>
</div>";
    }
}
}

//displaying genres
function getgenres()
{
    global $con;
    
    $select_categories="Select * from `categories`";
        $result_categories=mysqli_query($con,$select_categories);
        //echo $row_data['c_title'];
        while($row_data=mysqli_fetch_assoc($result_categories))
        {
          $c_title=$row_data['c_title'];
          $c_id=$row_data['c_id'];
          echo"<li class='nav-item'>
          <a href='index.php?category=$c_id' class='nav-link text-light'>$c_title</a>
      </li>";
        }
}

//searching movies
function search_movies()
{
    global $con;

    if(isset($_GET['search_data_movie'])){
        $search_data_value=$_GET['search_data'];
    $search_query="Select * from `movie` where p_keywords like '%$search_data_value%'";
          $result_query=mysqli_query($con,$search_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
              echo "<h2 class='text-center text-danger'> No results found! </h2>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $movie_id=$row['p_id'];
            $movie_title=$row['p_title'];
            $movie_description=$row['p_desc'];
            $movie_image=$row['p_image'];
            $category_id=$row['c_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img class='card-img-top' src='./adminarea/movie_images/$movie_image' alt='$movie_title'>
            <div class='card-body'>
              <h5 class='card-title'>$movie_title</h5>
              <p class='card-text'>$movie_description</p>
              <a href='index.php?playlist=$movie_id' class='btn btn-info'><i class='fa-solid fa-circle-plus'></i></a>
            </div>
      </div>
</div>";
    }
}}

//get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  


//playlist function
function playlist()
{
    if(isset($_GET['playlist'])){
        global $con;
        $ip = getIPAddress();  
        $get_movie_id=$_GET['playlist'];
        $select_query="Select * from `playlist` where ip_address='$ip' and p_id=$get_movie_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows>0){
              echo "<script> alert('This movie is already added to the playlist')</script>";
              echo "<script>window.open('index.php','_self')</script>";
          }
          else{
              $insert_query="insert into `playlist` (p_id,ip_address,quantity) values ($get_movie_id,'$ip',0)";
              $result_query=mysqli_query($con,$insert_query);
              echo "<script> alert('This movie has been added to the playlist')</script>";
              echo "<script>window.open('index.php','_self')</script>";


          }

    }
}

?>
