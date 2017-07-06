<div class="author flex flex--align-center margin--bottom-default">
    <div class="author__avatar">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), '60', $default, $alt, array( 'class' => array( 'border-radius--circle' ) ) ); ?>
    </div>
    <div class="author__meta margin--left-small">
        <h4 class="margin--bottom-none">Created by <?php the_author_meta('display_name'); ?></h4>
        <h5 class="margin--bottom-none text--grey-dark"><?php echo get_the_date( 'jS F' ); ?></h5>
    </div>
</div>
