<?php
// Create custom post type called gameui
function create_post_type_gameexample()
{
    register_taxonomy_for_object_type('category', 'gameexample'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'gameexample');
    register_post_type('gameexample', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Game Example', 'gameexample'), // Rename these to suit
            'singular_name' => __('Game Example', 'gameexample'),
            'add_new' => __('Add New', 'gameexample'),
            'add_new_item' => __('Add New Game Example', 'gameexample'),
            'edit' => __('Edit', 'gameexample'),
            'edit_item' => __('Edit Game Example', 'gameexample'),
            'new_item' => __('New Game Example', 'gameexample'),
            'view' => __('View Game Example', 'gameexample'),
            'view_item' => __('View Game Example', 'gameexample'),
            'search_items' => __('Search Game Example', 'gameexample'),
            'not_found' => __('No Game Example found', 'gameexample'),
            'not_found_in_trash' => __('No Game Examples found in Trash', 'gameexample')
        ),
        'menu_icon' => 'dashicons-book',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'comments'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
    ));
}
?>
