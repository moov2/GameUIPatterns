<?php
function order_category_archives( $query ) {
  if ( is_category() && $query->is_main_query() ){ // is_category() can specify a category, if necessary
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}

add_action( 'pre_get_posts', 'order_category_archives' );
?>
