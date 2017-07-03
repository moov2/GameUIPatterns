<?php
// Find connected pages
$connected = new WP_Query( array(
    'post_type' => 'gameui',
    'showposts' => 12
) );

// Display connected pages
if ( $connected->have_posts() ) :
    ?>
    <section class="section section--wide">
        <div class="section__content padding--small">
            <h2 class="padding--horizontal-small">Latest UI Patterns</h2>
            <div class="column-container column-container--grow column-size--4">
                <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                    <div class="column padding--small flex flex--direction-column flex--grow margin--bottom-default">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class=""><h4 class="margin--bottom-tiny"><?php the_title(); ?></h4></a>

                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<h5 class="text--grey">&#187; ';
                            echo esc_html( $categories[0]->name );
                            echo '</h5>';
                        }
                        ?>

                        <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class=""><?php the_post_thumbnail('pattern__thumbnail', ['class' => 'ui__thumbnail margin--bottom-default', 'title' => 'Feature image']); // Fullsize image for the single post ?></a>
                        <?php endif; ?>
                        <?php $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
                        <?php if($meta) {?>
                            <p><?php echo $meta;?></p>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="text--orange text--chevron text--small text--bold">Read more </a>

                        <hr class="hr hr--grey-light margin--top-small">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
