<?php 

get_header();


    if ( have_posts() ) {

        the_posts_pagination();
        
        while ( have_posts() ) {
            the_post(); ?>
            
            <div class="container my-3">
                <h1><?php the_title(); ?></h1>
                <form action="" method="POST" class="mb-3">
                    <input type="hidden" name="fav" value="1">
                    <input type="submit" value="Add to favourites" class="btn btn-secondary">
                </form>

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
                            <div class="h3">
                                <?php 
                                the_terms( $post->ID, 'my_years', ' ', ', ', ' ');
                                $the_post_id = get_the_ID();
                                $terms = wp_get_post_terms($the_post_id, ['my_years']);
                                if(!empty($terms) && is_array($terms)){
                                    echo check_old_movie($terms[0]->name);
                                } 
                                ?>   
                            </div>
                        <?php
                        $runtime = get_post_meta( $post->ID, 'my_runtime', true );
                        if ( ! empty( $runtime ) ) { ?>
                            <div class="mb-3"><strong>Runtime: </strong><?php echo runtime_prettier ($runtime); ?></div>
                        <?php } ?>
                            <div class="mb-3"><strong>Genres: </strong><?php the_terms( $post->ID, 'my_genres', '', ', ', '' ); ?></div>
                            <div class="description mb-3"><strong>Description: </strong><?php the_content(); ?></div>

                            <?php $connected = new WP_Query( [
                                'relationship' => [
                                    'id'   => 'movies_to_directors',
                                    'from' => get_the_ID(),
                                ],
                                'nopaging' => true,
                            ] );
                            if($connected->have_posts() && $connected->have_posts() != 'N/A'){
                                echo "<div class='mb-3 directors'>";

                                echo '<strong>' . __('Directors', 'text_domain') . ": " . '</strong>';
                                
                                $i = 0; 
                                while ( $connected->have_posts() ){ 
                                    $connected->the_post();
                                    
                                    if($i !== 0){echo ", ";}
                                    echo "<li><a href='". get_the_permalink() ."'>". get_the_title() ."</a></li>";
                                    
                                    $i++; 
                                } 
                                wp_reset_postdata(); 
                                unset($i); 
                                
                                echo "</div>"; // div class="directors"
                            }
                            unset($connected); ?>

                            <?php $connected = new WP_Query( [
                                'relationship' => [
                                    'id'   => 'movies_to_actors',
                                    'from' => get_the_ID(),
                                ],
                                'nopaging' => true,
                            ] );
                            if($connected->have_posts()){
                                echo "<div class='mb-3 actors'>";

                                echo '<strong>' . __('Actors', 'text_domain') . ": " . '</strong>';
                                
                                $i = 0; 
                                while ( $connected->have_posts() ){ 
                                    $connected->the_post();
                                    
                                    //if($i !== 0){echo ", ";}
                                    echo "<li><a href='". get_the_permalink() ."'>". get_the_title() ."</a></li>";
                                    
                                    $i++; 
                                } 
                                wp_reset_postdata(); 
                                unset($i); 
                                
                                echo "</div>"; // div class="actors"
                            }
                            unset($connected); ?>

                    </div>
                </div>
            </div>

        <?php } // end while

        the_posts_pagination();
    } // end if




get_sidebar();

get_footer();

?>