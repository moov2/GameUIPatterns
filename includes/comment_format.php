<?php

function format_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <li class="comment list__item margin--bottom-default">

        <?php echo get_avatar( $current_user->user_email, 64, null, null, array('class' => array('comment__avatar', 'border-radius--circle') ) ); ?>

        <div class="comment__meta text--grey text--small">
            Posted: <?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?> by <?php printf(__('%s'), get_comment_author_link()) ?>
        </div>

        <?php if ($comment->comment_approved == '0') : ?>
            <php _e('Your comment is awaiting moderation.') ?><br />
        <?php endif; ?>

        <?php comment_text(); ?>

        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

    </li>

<?php } ?>
