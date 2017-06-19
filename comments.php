<h2>Comments</h2>

<ul class="comments list">
    <?php wp_list_comments('type=comment&callback=format_comment'); ?>
</ul>

<?php comment_form(); ?>
