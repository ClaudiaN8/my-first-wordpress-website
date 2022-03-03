
<div class="col-12 col-md-6 col-lg-4 mb-4" id = "movie-<?php echo $movie["id"]; ?>">
    <div class="card">
        <img
            class="movie-poster card-img-top"
            src="<?php echo $movie["posterUrl"] ?>"
            alt="<?php echo $movie["title"]; ?>">
        </img>
        <div class="card-body">
            <h5 class="card-title"><?php echo $movie["title"]; ?></h5>
            <p class="card-runtime">Runtime: <?php echo runtime_prettier($movie["runtime"]); ?></p>
            <p class="card-text"><?php echo $movie["plot"]; ?></p>
            <a href="movie.php?movie_id=<?php echo $movie['id']; ?>" class="btn btn-info"
                >Read more</a>
        </div>
    </div>
</div>