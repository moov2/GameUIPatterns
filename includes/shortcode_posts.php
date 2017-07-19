<?php
// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'rmcc_post_listing_parameters_shortcode' );
function rmcc_post_listing_parameters_shortcode( $atts ) {
    ob_start();

    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'gameui',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'color' => '',
        'fabric' => '',
        'category' => '',
    ), $atts ) );

    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'color' => $color,
        'fabric' => $fabric,
        'category_name' => $category,
    );
    $connected = new WP_Query( $options );
    // run the loop based on the query
    if ( $connected->have_posts() ) { ?>
        <section class="section section--wide">
            <div class="section__content">
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
                                <?php $post_type = get_post_type( $post->ID ); ?>
                                <?php if($post_type == 'gameui') { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  class="bg--color-blue"><?php the_post_thumbnail('pattern__thumbnail', ['class' => 'ui__thumbnail transition--scale-down', 'title' => 'Feature image']); // Fullsize image for the single post ?></a>
                                <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class=""><?php the_post_thumbnail('pattern__thumbnail', ['class' => 'ui__thumbnail', 'title' => 'Feature image']); // Fullsize image for the single post ?></a>
                                <?php } ?>
                            <?php endif; ?>
                            <?php $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
                            <?php if($meta) {?>
                                <p class="margin--top-default"><?php echo $meta;?></p>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="text--orange text--chevron text--small text--bold">Read more </a>

                            <hr class="hr hr--grey-light margin--top-small">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

?>
