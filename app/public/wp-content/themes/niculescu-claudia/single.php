<?php 

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

        <h1>
            <?php the_title(); ?>
        </h1>
        <small><?php the_time('F jS, Y'); ?> | by <?php the_author_posts_link(); ?></small>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <small class="postmetadata"><?php _e('Posted in '); the_category(', '); ?></small>
          
<?php
	}
} ?>

<hr>

<?php 
// the query
$post_id=get_the_ID();
$post_category=get_the_category($post_id);
$args = array(
    'post_type' => 'post',
    'category__in' => array($post_category),
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'rand',
    
);

$my_query = new WP_Query( $args );
if ($my_query -> have_posts()): ?>

    <h4>Din aceeasi categorie: </h4>
<?php while ($my_query -> have_posts()): $my_query -> the_post(); ?>
    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<?php endwhile;
wp_reset_postdata();
endif;


get_footer();

?>