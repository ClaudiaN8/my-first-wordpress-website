<?php 
get_header();
    if ( have_posts() ) { ?>
        <?php the_posts_pagination(); ?>
        <div class="cards">
        <?php 
        while ( have_posts() ) {
            the_post();
            include( 'template-parts/my_movies/content-excerpt.php');
        } ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php } 
get_sidebar();
get_footer();
?>