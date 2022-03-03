<?php require_once('includes/header.php'); ?>
<?php 

$movie_id = $_GET['movie_id']; 

$movies_filtered = array_filter($movies, 'find_movie_by_id');

if(isset($movies_filtered) && $movies_filtered){
    $movie = reset($movies_filtered);
}

?>

<?php if(isset($movie) && $movie){ ?>

    <?php 
    
    if(isset($_COOKIE['fav_movies'])){
        $fav_movies = (array) json_decode($_COOKIE['fav_movies']);
    } else {
        $fav_movies = array();
    }
    
    if(isset($_POST['fav'])){
        if($_POST['fav'] === '1'){
            // adauga in cookie acest film
            if(in_array($movie['id'], $fav_movies)){
                $fav_movies[] = $movie['id'];
                setcookie('fav_movies', json_encode($fav_movies), time()+3600*24*365 );
            }
        } elseif($_POST['fav'] === '0') {
            // sterge din cookie acest film
            if(($key = array_search($movie['id'], $fav_movies)) !== false){
                unset($fav_movies[$key]);
                setcookie('fav_movies', json_encode($fav_movies), time()+3600*24*365 );
            }
        } else {
    
        }
    }

    ?>

    <div class="container my-3">
        <h1><?php echo $movie['title']; ?></h1>
        <form action="" method="POST" class="mb-3">
            <input type="hidden" name="fav" value="1">
            <input type="submit" value="Add to favourites" class="btn btn-secondary">
        </form>

        <div class="row">
            <div class="col-md-4 col-lg-3">
                <img 
                    class="card-img-top"
                    src="<?php echo $movie['posterUrl']; ?>"
                    alt="<?php echo $movie['title']; ?>"
                />
            </div>
            <div class="col-md-8 col-lg-9">
                <?php if(isset($movie['year']) && $movie['year']){ ?>
                    <div class="h3"><?php echo $movie['year']; ?> 
                            <?php echo check_old_movie($movie['year']);?>
                    </div>
                <?php } ?>
                <?php if(isset($movie['runtime']) && $movie['runtime']){ ?>
                    <div class="mb-3"><strong>Runtime: </strong><?php echo runtime_prettier ($movie['runtime']); ?></div>
                <?php } ?>
                <?php if(isset($movie['genres']) && $movie['genres']){ ?>
                    <div class="mb-3"><strong>Genre: </strong><?php echo implode(', ', $movie['genres']); ?></div>
                <?php } ?>
                <?php if(isset($movie['plot']) && $movie['plot']){ ?>
                    <div class="description mb-3">
                    <?php echo $movie['plot']; ?>
                    </div>
                <?php } ?>
                <?php if(isset($movie['director']) && $movie['director']){ ?>
                    <div class="mb-3"><strong>Directed by: </strong><?php echo $movie['director']; ?></div>
                <?php } ?>
                <?php if(isset($movie['actors']) && $movie['actors']){ ?>
                    <h5>Cast: </h5>
                    <ul>
                        <?php 
                        $actors_array = array(explode(', ', $movie['actors']));
                        $actors = reset($actors_array);
                        foreach($actors as $actor){ ?>
                            <li><?php echo $actor; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>

<?php } else { ?>
    <h2>Movie page</h2>
    <h5>Error! Movie not found.</h5>
    <a href="movies.php" class="btn btn-info">Back to movies</a>
<?php } ?>

<?php require_once('includes/footer.php'); ?>