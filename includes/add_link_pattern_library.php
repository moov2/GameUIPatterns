<?php
// Link to Pattern Library
function register_my_custom_menu_page() {
    add_menu_page( 'GameUIPatterns Pattern Library', 'Pattern Library', 'manage_options', '../wp-content/themes/GameUIPatterns/pattern-library/dist/index.html', '', 'dashicons-book', 3 );
}
add_action( 'admin_menu', 'register_my_custom_menu_page' );
?>
