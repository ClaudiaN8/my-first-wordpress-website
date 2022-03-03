<div class="col-12 col-md-6 col-lg-4 mb-4" >
    <div class="card">
            <a href=<?php the_permalink(); ?>>
            <?php
            if(has_post_thumbnail()) {
                the_post_thumbnail(); 
            } else{ ?>
                <img 
                class="card-img-top"
                src="http://niculescuclaudia.local/wp-content/uploads/2022/02/No-image-available-1.jpg"
                alt="<?php the_title(); ?>"
                />
            <?php } ?>
            </a>
        <div class="card-body">
            <h5 class="card-title"><?php echo the_title(); ?></h5>
            <p class="card-runtime">
            <?php
                $runtime = get_post_meta( $post->ID, 'my_runtime', true );
                if ( ! empty( $runtime ) ) { ?>
                    <div class="mb-3">Runtime: <?php echo runtime_prettier ($runtime); ?></div>
                <?php } ?>
            </p>
            <p class="card-text"><?php echo the_excerpt() ; ?></p>
            <a href=<?php the_permalink(); ?> class="btn btn-info" >Read more</a>
        </div>
    </div>
</div>