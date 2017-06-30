<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

include_once ('includes/add_link_pattern_library.php');
include_once ('includes/add_post_connections.php');
include_once ('includes/add_scripts.php');
include_once ('includes/add_slug_body_class.php');
include_once ('includes/add_styles.php');
include_once ('includes/add_svg_upload.php');

include_once ('includes/comment_custom_gravatar.php');
include_once ('includes/comment_format.php');
include_once ('includes/comment_reply_link.php');
include_once ('includes/comment_threaded.php');

include_once ('includes/custom_post_category.php');
include_once ('includes/custom_post_dashboard_glance.php');
include_once ('includes/custom_post_gameexample.php');
include_once ('includes/custom_post_gameui.php');

include_once ('includes/login_logo.php');
include_once ('includes/login_force.php');

include_once ('includes/navigation_header.php');
include_once ('includes/navigation_pagination.php');
include_once ('includes/navigation_register.php');

include_once ('includes/plugin_required.php');

include_once ('includes/remove_admin_bar.php');
include_once ('includes/remove_admin_footer.php');
include_once ('includes/remove_category_relationship.php');
include_once ('includes/remove_jquery.php');
include_once ('includes/remove_navigation_attributes.php');
include_once ('includes/remove_navigation_div.php');
include_once ('includes/remove_recent_comments_styles.php');
include_once ('includes/remove_text_css.php');
include_once ('includes/remove_thumbnail_dimensions.php');
include_once ('includes/remove_wp_emoji.php');

include_once ('includes/shortcode_blog_latest.php');
include_once ('includes/shortcode_blog_twelve.php');
include_once ('includes/shortcode_gameui_all.php');
include_once ('includes/shortcode_gameui_twelve.php');
include_once ('includes/shortcode_newsletter.php');

include_once ('includes/theme_languages.php');
include_once ('includes/theme_menus.php');
include_once ('includes/theme_rss_feed.php');
include_once ('includes/theme_thumbnails.php');

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'gameui_styles'); // Add Theme Stylesheet
add_action('init', 'register_gameui_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_gameui'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_gameexample'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
