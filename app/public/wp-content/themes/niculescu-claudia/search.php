<?php 
get_header();

if (strlen($_GET['s']) < 3){ ?>

    <h3 class="mt-3">Search key too short!</h3>
    <h4 class="mb-3">Try sometring else.</h4>

   <?php get_search_form();

}else if( have_posts() ) {
    ?>
    <h4 class="my-3">Search results for: <span><?php echo $_GET['s']; ?></span></h4>

    <?php the_posts_pagination(); ?>
    <div class="cards">
	<?php while ( have_posts() ) {
		the_post(); 
         
        include('template-parts/my_movies/content-excerpt.php');
    } ?>
    </div>
    <?php the_posts_pagination();

} else {
    ?>
    <h3 class="mt-3">No results!</h3>
    <h4 class="mb-3">Try sometring else.</h4>

   <?php get_search_form();

}
get_sidebar();
get_footer();
?>