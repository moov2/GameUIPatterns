<?php
// Create custom post type called gameui
function create_post_type_gameui()
{
    register_taxonomy_for_object_type('category', 'gameui'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'gameui');
    register_post_type('gameui', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('UI Component', 'gameui'), // Rename these to suit
            'singular_name' => __('UI Component', 'gameui'),
            'add_new' => __('Add New', 'gameui'),
            'add_new_item' => __('Add New UI Component', 'gameui'),
            'edit' => __('Edit', 'gameui'),
            'edit_item' => __('Edit UI Component', 'gameui'),
            'new_item' => __('New UI Component', 'gameui'),
            'view' => __('View UI Component', 'gameui'),
            'view_item' => __('View UI Component', 'gameui'),
            'search_items' => __('Search UI Component', 'gameui'),
            'not_found' => __('No UI Component found', 'gameui'),
            'not_found_in_trash' => __('No UI Components found in Trash', 'gameui')
        ),
        'menu_icon' => 'dashicons-layout',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'comments'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
?>
