<?php require_once('includes/header.php'); ?>

<?php 

if(isset($_GET['s']) && strlen($_GET['s']) >= 3){
    $s = $_GET['s']; ?>

    <div class="container my-3">
        <h3>Search results for: <strong><?php echo $s; ?></strong></h3>
        <?php  
        $movies_filtered = array_filter($movies, 'find_movie_by_title');

        if(count($movies_filtered) === 0){ ?>
            <h3>No results!</h3>
            <h4>Try sometring else.</h4>
            <?php include('includes/search-form.php'); ?>

        <?php } else { ?>
                <div class="row movies-list">
                    <?php
                        foreach ($movies_filtered as $movie){   
                        require('includes/archive-movie.php');
                    }?>
                </div>
        <?php } ?>
    </div>                
<?php } elseif(isset($_GET['s']) && strlen($_GET['s']) < 3){ ?>
                <div class="container my-3">
                <h3>Invalid search.</h3>
                <h4>Too short keyword. Try again.</h4>
                <?php include('includes/search-form.php'); ?>
                </div>
<?php } else { ?>
                <div class="container my-3">
                <h3>Invalid search.</h3>
                <h4>Try something else.</h4>
                <?php include('includes/search-form.php'); ?>
                </div>
<?php } ?>

<?php require_once('includes/footer.php'); ?>