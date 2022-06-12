<?php

$con=mysqli_connect('sql208.epizy.com','epiz_31940039','j2NEJZhuZx5nl','epiz_31940039_movieliv');
if($con){
    echo "connection successful";
}else{
    die(mysqli_error($con));
}

?>