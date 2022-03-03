<?php 

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

        <h1>
            <?php the_title(); ?>
        </h1>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        
<?php
	}
} ?>

<hr>

<?php 
if (is_front_page()){
    // the query
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );

    $my_query = new WP_Query( $args );
    if ($my_query -> have_posts()){ ?>

        <h4>Citeste ultimele articole: </h4>
        <div class="d-flex flex-row flex-wrap flex-md-nowrap">

        <?php while ($my_query -> have_posts()){
            $my_query -> the_post(); ?>

            <div class="post-content">
                <h5>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
                <p><?php the_excerpt(); ?></p>
            </div>
            <?php }
            wp_reset_postdata();?>
        </div>    
    <?php } ?>

    <h4>Pentru a vedea toate articolele apasa <a href="<?php echo site_url('/blog'); ?>">aici</a>.</h4>
    
<?php }

get_footer();
?>