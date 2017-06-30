<?php
// Register HTML5 Blank Navigation
function register_gameui_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'gameui'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'gameui'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'gameui') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}
?>
