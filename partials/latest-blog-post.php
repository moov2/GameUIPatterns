<?php
// Find connected pages
$connected = new WP_Query( array(
    'post_type' => 'post',
    'showposts' => 1
) );

// Display connected pages
if ( $connected->have_posts() ) :
    ?>
    <div class="padding--default">
        <div class="flex flex--justify-between margin--bottom-small text--small">
            <span class="text--grey">Latest Blog Post</span>
            <a href="/blog-posts" title="<?php the_title_attribute(); ?>" class="text--grey text--chevron">Visit blog </a>
        </div>
        <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
            <div>
            <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog__thumbnail', ['class' => 'post__thumbnail margin--bottom-small', 'title' => get_the_title()]); // Fullsize image for the single post ?></a>
            <?php endif; ?>

            <h3 class="margin--bottom-small"><?php the_title(); ?></h3>
            <?php $meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
            <?php if($meta) {?>
                <p class="margin--bottom-small text--small"><?php echo $meta;?></p>
            <?php } ?>
                <a href="<?php the_permalink(); ?>" title="Read more about <?php the_title_attribute(); ?>" class="text--orange text--small text--bold text--chevron">Read more </a>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    // Prevent weirdness
    wp_reset_postdata();

endif;
?>
