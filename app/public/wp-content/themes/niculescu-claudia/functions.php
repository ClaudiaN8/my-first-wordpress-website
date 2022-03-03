<?php

if ( ! function_exists( 'theme_setup' ) ) {
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which runs
		 * before the init hook. The init hook is too late for some features, such as indicating
		 * support post thumbnails.
		 */
		function theme_setup() {
		 
		    /**
		     * Make theme available for translation.
		     * Translations can be placed in the /languages/ directory.
		     */
		    load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
		 
		    /**
		     * Add default posts and comments RSS feed links to <head>.
		     */
		    add_theme_support( 'automatic-feed-links' );
		 
		    /**
		     * Enable support for post thumbnails and featured images.
		     */
		    add_theme_support( 'post-thumbnails' );
		 
		    /**
		     * Add support for two custom navigation menus.
		     */
		    register_nav_menus( array(
		        'primary'   => __( 'Primary Menu', 'text_domain' ),
		        'secondary' => __('Secondary Menu', 'text_domain' )
		    ) );
		 
		    /**
		     * Enable support for the following post formats:
		     * aside, gallery, quote, image, and video
		     */
		    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
		}
} // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );

function add_theme_scripts() {
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style( 'style', get_stylesheet_uri(), array('bootstrap'), filemtime( get_stylesheet_directory() .'/style.css' ));
    
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/**
 * Adding Custom Logo support
 */

function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


function my_awesome_sidebar() {
  $args = array(
    'name'          => 'Footer Widgets',
    'id'            => 'footer-widgets',
    'description'   => 'The Footer Widgets is shown on the bottom side of blog pages in this theme',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  );

  register_sidebar( $args );
}

add_action( 'widgets_init', 'my_awesome_sidebar' );

// Our custom post type function
function create_my_custom_post_types_and_taxonomies() {
 
    register_post_type( 'my_movies',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movie'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-video-alt3',
 
        )
    );

    register_post_type( 'my_actors',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Actors' ),
                'singular_name' => __( 'Actor' )
            ),
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'actor'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-universal-access-alt',
 
        )
    );

    register_post_type( 'my_directors',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Directors' ),
                'singular_name' => __( 'Director' )
            ),
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'director'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-businessman',
 
        )
    );

    // Add taxonomies
    //first do the translations part for GUI
 
	$labels = array(
        'name' => _x( 'Genres', 'taxonomy general name' ),
        'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Genres' ),
        'all_items' => __( 'All Genres' ),
        'parent_item' => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item' => __( 'Edit Genre' ), 
        'update_item' => __( 'Update Genre' ),
        'add_new_item' => __( 'Add New Genre' ),
        'new_item_name' => __( 'New Genre Name' ),
        'menu_name' => __( 'Genres' ),
    );    

        // Now register the taxonomy
    register_taxonomy('my_genres', 
        array('my_movies'), 
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'genre' ),
    ));

    $labels = array(
        'name' => _x( 'Years', 'taxonomy general name' ),
        'singular_name' => _x( 'Year', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Years' ),
        'all_items' => __( 'All Years' ),
        'parent_item' => __( 'Parent Year' ),
        'parent_item_colon' => __( 'Parent Year:' ),
        'edit_item' => __( 'Edit Year' ), 
        'update_item' => __( 'Update Year' ),
        'add_new_item' => __( 'Add New Year' ),
        'new_item_name' => __( 'New Year Name' ),
        'menu_name' => __( 'Years' ),
    );    

        // Now register the taxonomy
    register_taxonomy('my_years', 
        array('my_movies'), 
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'year' ),
    ));

}
// Hooking up our function to theme setup
add_action( 'init', 'create_my_custom_post_types_and_taxonomies' );

add_action( 'mb_relationships_init', function() {
    MB_Relationships_API::register( [
        'id'   => 'movies_to_actors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Actors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_actors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );

    MB_Relationships_API::register( [
        'id'   => 'movies_to_directors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Directors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_directors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );
} );

function runtime_prettier($runtime = 0){

    if ($runtime == 0 || !is_numeric($runtime)){
        return 'No runtime info';
    } else if ($runtime == 1) {
        return $runtime . ' minute';
    } else if ($runtime > 1 && $runtime < 60){
        return $runtime . ' minutes';
    } else {
        $h = intval($runtime/60);
        $min = $runtime%60;

        return $h . ( ($h == 1) ? ' hour' : ' hours' ) . ' ' . $min . ( ($min == 1) ? ' minute' : ' minutes' );

    }

};

function person_age($byear){
    $current_year = date('Y');
    $person_age = $current_year - $byear;
    if ($byear){
        return 'age '. $person_age . ' </span>';
    } else return false;
}


function check_old_movie($movie_birth){
    $current_year = date('Y');
    $movie_age = $current_year - $movie_birth;
    if ($movie_age > 40 && $movie_birth){
        return '<span class = "badge bg-warning text-dark">Old movie: '. $movie_age . ' years</span>';
    } else return false;
}



