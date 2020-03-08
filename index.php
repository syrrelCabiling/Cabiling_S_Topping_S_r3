<?php

require_once 'load.php'; //the complete path is inside LOAD

if(isset($_GET['filterNav'])){
    //filter
    $args = array(
        'tbl'=>'tbl_users',
        'filter'=>$_GET['filter']
    );
    $getMovies = getMoviesByFilter($args); 
}else{
    $movie_table = 'tbl_movies';
    $getMovies = getAll($movie_table);  
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the movie cms!</title>
   
</head>
<body>
    <?php while($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
        <div class="movie-item">
            <img src="images/<?php echo $row['movies_cover']; ?>" alt="<?php echo $row['movies_title'];?>"/>
            <h2><?php echo $row['movies_title'];?>  </h2>
            <h4>Movie Released: <?php echo $row['movies_year'];?></h4>
            <a href="details.php?id=<?php echo $row['movies_id'];?>">Read More...</a>
        </div>
    
    <?php endwhile?>
    <?php include 'templates/footer.php';?>
</body>
</html>