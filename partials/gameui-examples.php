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
                <li>			<!-- post thumbnail -->
                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                    <?php endif; ?>
                    <!-- /post thumbnail -->
                    <?php if(get_field('display_title'))
                    {
                        echo get_field('display_title');
                    }?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
