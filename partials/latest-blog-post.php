<?php
// Find connected pages
$connected = new WP_Query( array(
    'post_type' => 'post',
    'showposts' => 1
) );

// Display connected pages
if ( $connected->have_posts() ) :
    ?>
    <span class="text-colour--grey">Latest Blog Post</span>
    <ul class="list flex flex--direction-column flex--justify-between">
        <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
            <li class="pattern__item margin--bottom-default">
                <div>
                <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                    <?php the_post_thumbnail('pattern__thumbnail', ['class' => 'pattern__thumbnail', 'title' => 'Feature image']); // Fullsize image for the single post ?>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
                <?php $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
                <?php if($meta) {?>
                    <p><?php echo $meta;?></p>
                <?php } ?>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
