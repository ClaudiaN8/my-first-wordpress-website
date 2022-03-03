<?php 
get_header();

    if ( have_posts() ) {
        
        while ( have_posts() ) {
            the_post(); ?>
            
            <div class="container my-3">
                <h1><?php the_title(); ?></h1>
                
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                    <?php if(has_post_thumbnail()) {
                        the_post_thumbnail(); 
                    } else{ ?>
                        <img 
                        class="card-img-top"
                        src="http://niculescuclaudia.local/wp-content/uploads/2022/02/No-image-available-1.jpg"
                        alt="<?php the_title(); ?>"
                        />
                    <?php } ?>
                    </div>
                    <div class="col-md-8 col-lg-9 single_movie">
                        <?php
                        $fullname = get_post_meta( $post->ID, 'my_fullname', true );
                        if ( ! empty( $fullname ) ) { ?>
                            <div class="mb-3"><strong>Full Name: </strong><?php echo $fullname; ?></div>
                        <?php } ?>
                        <?php
                        $bday = get_field('my_bday');
                        if ( ! empty( $bday ) ) { ?>
                            <div class="mb-3"><strong>Birthday: </strong><?php echo $bday; ?></div>
                        <?php } 
                        $bplace = get_post_meta( $post->ID, 'my_bplace', true );
                        if ( ! empty( $bplace ) ) { ?>
                            <div class="mb-3"><strong>Place of Birth: </strong><?php echo $bplace; ?></div>
                        <?php }
                        $height = get_post_meta( $post->ID, 'my_height', true );
                        if ( ! empty( $height ) ) { ?>
                            <div class="mb-3"><strong>Height: </strong><?php echo $height . 'm' ; ?></div>
                        <?php } 
                        if ( ! empty(the_content() )) { ?>
                            <div class="description mb-3"><strong>About: </strong><?php the_content(); ?></div>
                        <?php } ?>
                    </div>

                    <hr>

                    <?php $connected = new WP_Query( [
                        'relationship' => [
                            'id'   => 'movies_to_actors',
                            'to' => get_the_ID(),
                        ],
                        'nopaging'     => true,
                    ] );
                    if( $connected->have_posts() ){ ?>
                        <div class="movies mr-1">
                            <div class="h5 py-3">
                                <?php _e('Movies with ', 'text_domain'); ?> <?php the_title(); ?>:
                            </div>
                            <div class="row">
                                <?php while ( $connected->have_posts() ) { $connected->the_post();
                                    get_template_part('template-parts/my_movies/content', 'excerpt');
                                } 
                                wp_reset_postdata();  ?>
                            </div>
                        </div>
                    <?php } else {
                        return 'No movies found'; 
                    }
                    unset($connected); ?>

                    <?php $connected = new WP_Query( [
                        'relationship' => [
                            'id'   => 'movies_to_directors',
                            'to' => get_the_ID(),
                        ],
                        'nopaging'     => true,
                    ] );
                    if( $connected->have_posts() ){   ?>
                        <div class="movies mr-1">
                            <div class="h5">
                                <?php _e('Movies directed by ', 'text_domain'); ?> <?php the_title(); ?>
                            </div>
                            <div class="row">
                                <?php while ( $connected->have_posts() ) { $connected->the_post();
                                    get_template_part('template-parts/my_movies/content', 'excerpt');
                                } 
                                wp_reset_postdata();  ?>
                            </div>
                        </div>
                    <?php } else {
                        return 'No movies found'; 
                    } ?>

                    </div>
                </div>
            </div>

        <?php } // end while
    } // end if
get_sidebar();

get_footer();
?>