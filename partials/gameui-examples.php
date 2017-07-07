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
    <div class="padding--large">
        <h3>Game Examples:</h3>
        <ul class="list examples">
            <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                <li class="examples__item">
                    <?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>
                    <div>
                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'examples__thumbnail'); ?>
                        <?php if(get_field('focus_image')) { ?>
                            <img class="examples__thumbnail" src="<?php echo $featured_img_url; ?>" onmouseover="this.src='<?php echo get_field('focus_image'); ?>'" onmouseout="this.src='<?php echo $featured_img_url; ?>'">
                        <?php } else { ?>
                            <img class="examples__thumbnail" src="<?php echo $featured_img_url; ?>" onmouseover="this.src='<?php echo $featured_img_url; ?>'" onmouseout="this.src='<?php echo $featured_img_url; ?>'">
                        <?php } ?>
                    <?php endif; ?>

                    <?php if(get_field('display_title')) { echo '<h4>' . get_field('display_title') . '</h4>'; }?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
