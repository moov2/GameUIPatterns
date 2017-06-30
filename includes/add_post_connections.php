<?php
function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'posts_to_pages',
        'from' => 'gameui',
        'to' => 'gameexample'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );
?>
