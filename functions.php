<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('examples__thumbnail', 400, 400, true);
    add_image_size('wrapper', 850, '', true);
    add_image_size('wrapper-full', 1560, '', true);
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function gameui_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load GameUI styles
function gameui_styles()
{
    wp_register_style('gameui', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('gameui'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_gameui_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'gameui'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'gameui'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'gameui') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

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
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

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

function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'posts_to_pages',
        'from' => 'gameui',
        'to' => 'gameexample'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );


// Remove jQuery Migrate Script from header and Load jQuery from Google API
function stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'stop_loading_wp_embed_and_jquery');

// Remove WP Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Link to Pattern Library
function register_my_custom_menu_page() {
    add_menu_page( 'GameUIPatterns Pattern Library', 'Pattern Library', 'manage_options', '../wp-content/themes/gameuipatterns/pattern-library/dist/index.html', '', 'dashicons-book', 3 );
}
add_action( 'admin_menu', 'register_my_custom_menu_page' );

// Allow SVG files to be uploaded to the media library
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
    .attachment-266x266, .thumbnail img {
        height: auto !important;
    }
    </style>';
}
add_action( 'admin_head', 'fix_svg' );

// Remove Wordpress in footer of admin dashboard
function wpse_edit_footer() {
    add_filter( 'admin_footer_text', 'wpse_edit_text', 11 );
}

function wpse_edit_text($content) {
    return "";
}

add_action( 'admin_init', 'wpse_edit_footer' );

// Include custom post types in 'At a glance' widget
add_action( 'dashboard_glance_items', 'at_glance_content_ui_patterns' );
function at_glance_content_ui_patterns() {
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';

    $post_types = get_post_types( $args, $output, $operator );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
        }
    }
}


function format_comment($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment; ?>

    <li class="comment list__item margin--bottom-default">

        <?php echo get_avatar( $current_user->user_email, 64, null, null, array('class' => array('comment__avatar', 'border-radius--circle') ) ); ?>

        <?php if ($comment->comment_approved == '0') : ?>
            <php _e('Your comment is awaiting moderation.') ?><br />
        <?php endif; ?>

        <?php comment_text(); ?>

        <div class="flex flex--align-end flex--justify-between margin--bottom-default">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

            <div class="comment__meta text--grey">
                Posted: <?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?> by <?php printf(__('%s'), get_comment_author_link()) ?>
            </div>
        </div>

    </li>

<?php }


// filter to replace class on reply link
add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment__reply text--bold", $class);
    return $class;
}

?>
