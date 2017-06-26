<?php
// Find connected pages
$connected = new WP_Query( array(
    'post_type' => 'gameui',
    'showposts' => 12
) );

// Display connected pages
if ( $connected->have_posts() ) :
    ?>
    <section class="padding--default">
        <h3 class="padding--horizontal-small">Latest UI Patterns</h3>
        <div class="column-container column-size--4">
            <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                <div class="column padding--small">
                    <h4 class="margin--bottom-tiny"><?php the_title(); ?></h4>

                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<h5 class="text--grey">&#187; ';
                        echo esc_html( $categories[0]->name );
                        echo '</h5>';
                    }
                    ?>

                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <?php the_post_thumbnail('pattern__thumbnail', ['class' => 'pattern__thumbnail', 'title' => 'Feature image']); // Fullsize image for the single post ?>
                    <?php endif; ?>
                    <?php $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
                    <?php if($meta) {?>
                        <p><?php echo $meta;?></p>
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
