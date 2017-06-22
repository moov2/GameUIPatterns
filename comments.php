<?php if (comments_open()) { ?>

<h2>Comments</h2>

<ul class="comment-list list">
    <?php wp_list_comments('type=comment&callback=format_comment'); ?>
</ul>

<?php comment_form(); ?>

<?php } ?>
