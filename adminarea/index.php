<?php
include('../includes/connect.php');
if(isset($_POST['insert_movie'])){
    $movie_title=$_POST['movie_title'];
    $description=$_POST['description'];
    $movie_keywords=$_POST['movie_keywords'];
    $movie_genre=$_POST['movie_genre'];
    $movie_status='true';

    //accessing image
    $movie_image=$_FILES['movie_image']['name'];

    //accessing image tmp name
    $temp_image=$_FILES['movie_image']['tmp_name'];

    //checking empty condition
    if($movie_title=='' or $description=='' or $movie_keywords=='' or $movie_genre=='' or $movie_image=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"./movie_images/$movie_image");

        //insert query
        $insert_movies="insert into `movie` (p_title,p_desc,p_keywords,c_id,p_image,date,status) values ('$movie_title','$description','$movie_keywords','$movie_genre','$movie_image',NOW(),'$movie_status')";
        $result_query=mysqli_query($con,$insert_movies);
        if($result_query){
            echo "<script>alert('Success')</script>";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Products</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <h1 class="text-center">Insert Movies</h1>
  <form action="" method="post" enctype="multipart/form-data">
      <!--title--> 
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="movie_title" class="form-label">Movie title</label>
        <input type="text" name="movie_title" id="movie_title" class="form-control" placeholder="Enter movie title" autocomplete="off" required="required">
    </div>
    <!--description-->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label">Movie description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" required="required">
    </div>
    <!--keywords-->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="movie_keywords" class="form-label">Movie keywords</label>
        <input type="text" name="movie_keywords" id="movie_keywords" class="form-control" placeholder="Enter keywords" autocomplete="off" required="required">
    </div>
    <!--genres-->
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="movie_genre" id="" class="form-select">
            <option value="">Select a genre</option>
            <?php
            $select_query="Select * from `categories`";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query))
            {
                $c_title=$row['c_title'];
                $c_id=$row['c_id'];
                echo "<option value='$c_id'>$c_title</option>";
            }
            ?>
        </select>
    </div>
    <!--image-->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="movie_image" class="form-label">Movie Images</label>
        <input type="file" name="movie_image" id="movie_image" class="form-control" required="required">
    </div>
    <!--submit--> 
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_movie" class="btn btn-info mb-3 px-3" value="Insert Movie">
    </div>
    
</form>
</div>
</body>
</html>