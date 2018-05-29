<?php

// filter to replace class on reply link
add_filter('comment_reply_link', 'replace_reply_link_class');
function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link comment__reply", "class='comment__reply text--bold", $class);
    return $class;
}

?>
