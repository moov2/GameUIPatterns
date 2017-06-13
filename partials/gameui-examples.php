<?php
// Find connected pages
$connected = new WP_Query( array(
    'connected_type' => 'posts_to_pages',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
) );

// Display connected pages
if ( $connected->have_posts() ) :
    ?>
    <div class="examples">
        <h3>Game Examples:</h3>
        <ul>
            <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                <li class="examples__item">
                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                    <?php endif; ?>

                    <?php if(get_field('display_title')) { echo '<h4>' . get_field('display_title') . '</h4>'; }?>
                    <?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
