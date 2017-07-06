<div class="author flex flex--align-center margin--bottom-default">
    <?php if( get_field('custom_author') != 'yes' ) { ?>
        <div class="author__avatar">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), '60', $default, $alt, array( 'class' => array( 'border-radius--circle' ) ) ); ?>
        </div>
        <div class="author__meta margin--left-small">
            <h4 class="margin--bottom-none">Created by <?php the_author_meta('display_name'); ?></h4>
            <h5 class="margin--bottom-none text--grey-dark"><?php echo get_the_date( 'jS F' ); ?></h5>
        </div>
    <?php } else { ?>
        <div class="author__avatar">
            <?php
            $image = get_field('author_avatar');

            // vars
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];
            $caption = $image['caption'];

            // thumbnail
            $size = 'thumbnail';
            $thumb = $image['sizes'][ $size ];
            $width = '64px';
            ?>

            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" class="border-radius--circle">
        </div>
        <div class="author__meta margin--left-small">
            <h4 class="margin--bottom-none">Created by <?php the_field('author_name')?></h4>
            <h5 class="margin--bottom-none text--grey-dark"><?php echo get_the_date( 'jS F' ); ?></h5>
        </div>
    <?php } ?>
</div>
