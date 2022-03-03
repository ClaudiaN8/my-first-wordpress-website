<?php 

get_header();


    if ( have_posts() ) {

        the_posts_pagination();
        
        while ( have_posts() ) {
            the_post(); 
            
            get_template_part( 'template-parts/post/content', 'excerpt');
            
        } // end while

        the_posts_pagination();
    } // end if




get_sidebar();

get_footer();

?>