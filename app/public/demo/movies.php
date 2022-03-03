<?php require_once('includes/header.php'); ?>

<div class="container my-3">
    <h1>Movies</h1>
    <div class="row movies-list">
        <?php
        foreach ($movies as $movie){   
        require('includes/archive-movie.php');
        }
        ?>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>