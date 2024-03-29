<?php

if (!function_exists('izone_setup')) :

    function izone_setup()
    {

        load_theme_textdomain('izone', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'izone'),
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        add_theme_support('custom-background', apply_filters('izone_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'izone_setup');

function izone_content_width()
{
    $GLOBALS['content_width'] = apply_filters('izone_content_width', 640);
}

add_action('after_setup_theme', 'izone_content_width', 0);

function custom_rewrite()
{
    // add_rewrite_rule('^test/category/([^/]*)/?$', 'archive-test.php?category=$1', 'top');
    // add_rewrite_rule('^test/category/([^/]*)/([^/]*)/?$', 'archive-test.php?category=$2', 'top');
}

add_action('init', 'custom_rewrite');

function izone_scripts()
{
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/all.css');
    wp_enqueue_style('elegant-font', get_template_directory_uri() . '/assets/lib/elegant-font/css/elegant-font.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.css');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/lib/owl-carousel/assets/owl.carousel.css');
    wp_enqueue_style('owl.theme.default', get_template_directory_uri() . '/assets/lib/owl-carousel/assets/owl.theme.default.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/app/css/style.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/app/css/responsive.css');
    wp_enqueue_style('global-style', get_stylesheet_uri());

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/lib/jquery-2.2.4.min.js', array(), false, true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/lib/jquery-ui-1.12.1.min.js', array(), false, true);
    wp_enqueue_script('jquery.cookie', get_template_directory_uri() . '/assets/lib/cookie/jquery.cookie.js', array(), false, true);
    wp_enqueue_script('bootstrap.bundle', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/lib/owl-carousel/owl.carousel.js', array(), false, true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/lib/turnjs4/extras/modernizr.2.5.3.min.js', array(), false, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/app/js/main.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'izone_scripts');

function admin_scripts() {
  wp_enqueue_style( 'admin', get_template_directory_uri() . '/assets/app/css/admin.css');
}

add_action( 'admin_enqueue_scripts', 'admin_scripts');

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

add_action('after_switch_theme', 'my_rewrite_flush');

function my_rewrite_flush()
{
    flush_rewrite_rules();
}

function course_init()
{
    $labels = array(
        'name' => _x('Courses', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Course', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Courses', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Course', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Course', 'textdomain'),
        'new_item' => __('New Course', 'textdomain'),
        'edit_item' => __('Edit Course', 'textdomain'),
        'view_item' => __('View Course', 'textdomain'),
        'all_items' => __('All Courses', 'textdomain'),
        'search_items' => __('Search Courses', 'textdomain'),
        'parent_item_colon' => __('Parent Courses:', 'textdomain'),
        'not_found' => __('No courses found.', 'textdomain'),
        'not_found_in_trash' => __('No courses found in Trash.', 'textdomain'),
        'featured_image' => _x('Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'course'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag', 'category')
    );

    register_post_type('course', $args);
}

add_action('init', 'course_init');

function teacher_init()
{
    $labels = array(
        'name' => _x('Teachers', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Teacher', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Teachers', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Teacher', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Teacher', 'textdomain'),
        'new_item' => __('New Teacher', 'textdomain'),
        'edit_item' => __('Edit Teacher', 'textdomain'),
        'view_item' => __('View Teacher', 'textdomain'),
        'all_items' => __('All Teachers', 'textdomain'),
        'search_items' => __('Search Teachers', 'textdomain'),
        'parent_item_colon' => __('Parent Teachers:', 'textdomain'),
        'not_found' => __('No teachers found.', 'textdomain'),
        'not_found_in_trash' => __('No teachers found in Trash.', 'textdomain'),
        'featured_image' => _x('Teacher Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Teacher archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into teacher', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this teacher', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter teachers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Teachers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Teachers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'teacher'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag', 'category')
    );

    register_post_type('teacher', $args);
}

add_action('init', 'teacher_init');

function test_init()
{
    $labels = array(
        'name' => _x('Tests', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Test', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Tests', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Test', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Test', 'textdomain'),
        'new_item' => __('New Test', 'textdomain'),
        'edit_item' => __('Edit Test', 'textdomain'),
        'view_item' => __('View Test', 'textdomain'),
        'all_items' => __('All Tests', 'textdomain'),
        'search_items' => __('Search Tests', 'textdomain'),
        'parent_item_colon' => __('Parent Tests:', 'textdomain'),
        'not_found' => __('No tests found.', 'textdomain'),
        'not_found_in_trash' => __('No tests found in Trash.', 'textdomain'),
        'featured_image' => _x('Test Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Test archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into test', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this test', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter tests list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Tests list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Tests list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'test'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag', 'category')
    );

    register_post_type('test', $args);
}

add_action('init', 'test_init');

function document_init()
{
    $labels = array(
        'name' => _x('Documents', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Document', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Documents', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Document', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Document', 'textdomain'),
        'new_item' => __('New Document', 'textdomain'),
        'edit_item' => __('Edit Document', 'textdomain'),
        'view_item' => __('View Document', 'textdomain'),
        'all_items' => __('All Documents', 'textdomain'),
        'search_items' => __('Search Documents', 'textdomain'),
        'parent_item_colon' => __('Parent Documents:', 'textdomain'),
        'not_found' => __('No documents found.', 'textdomain'),
        'not_found_in_trash' => __('No documents found in Trash.', 'textdomain'),
        'featured_image' => _x('Document Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Document archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into document', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this document', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter documents list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Documents list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Documents list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'document'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag', 'category')
    );

    register_post_type('document', $args);
}

add_action('init', 'document_init');

function student_init()
{
    $labels = array(
        'name' => _x('Students', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Student', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Students', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Student', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Student', 'textdomain'),
        'new_item' => __('New Student', 'textdomain'),
        'edit_item' => __('Edit Student', 'textdomain'),
        'view_item' => __('View Student', 'textdomain'),
        'all_items' => __('All Students', 'textdomain'),
        'search_items' => __('Search Students', 'textdomain'),
        'parent_item_colon' => __('Parent Students:', 'textdomain'),
        'not_found' => __('No students found.', 'textdomain'),
        'not_found_in_trash' => __('No students found in Trash.', 'textdomain'),
        'featured_image' => _x('Student Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Student archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into student', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this student', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter students list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Students list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Students list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'student'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag', 'category')
    );

    register_post_type('student', $args);
}

add_action('init', 'student_init');

function add_cover_video_meta_box()
{
    add_meta_box(
        'cover_video_meta_box',
        'Cover Video',
        'show_cover_video_meta_box',
        'student',
        'side',
        'high'
    );
}

add_action('add_meta_boxes', 'add_cover_video_meta_box');

function show_cover_video_meta_box()
{
    global $post;
    $meta = get_post_meta($post->ID, 'cover_video_embed', true);
    echo '
        <input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />
        <table class="form-table">
            <tr>
                <td>
                    <input type="url" name="cover_video_embed" id="cover_video_embed" value="' . $meta . '" style="width:100%" />
                    <br />
                    <span class="description">Paste your video code here to show a video instead of a featured image.</span>
                </td>
            </tr>
        </table>';
}

// Save the Data
function save_cover_video($post_id)
{
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $old = get_post_meta($post_id, 'cover_video_embed', true);
    $new = $_POST['cover_video_embed'];
    if ($new && $new != $old) {
        update_post_meta($post_id, 'cover_video_embed', $new);
    } elseif ('' == $new && $old) {
        delete_post_meta($post_id, 'cover_video_embed', $old);
    }
}

add_action('save_post', 'save_cover_video');

function schedule_init()
{
    $labels = array(
        'name' => _x('Schedules', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Schedule', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Schedules', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Schedule', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Schedule', 'textdomain'),
        'new_item' => __('New Schedule', 'textdomain'),
        'edit_item' => __('Edit Schedule', 'textdomain'),
        'view_item' => __('View Schedule', 'textdomain'),
        'all_items' => __('All Schedules', 'textdomain'),
        'search_items' => __('Search Schedules', 'textdomain'),
        'parent_item_colon' => __('Parent Schedules:', 'textdomain'),
        'not_found' => __('No schedules found.', 'textdomain'),
        'not_found_in_trash' => __('No schedules found in Trash.', 'textdomain'),
        'featured_image' => _x('Schedule Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives' => _x('Schedule archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item' => _x('Insert into schedule', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this schedule', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list' => _x('Filter schedules list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Schedules list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list' => _x('Schedules list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'schedule'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('schedule', $args);
}

add_action('init', 'schedule_init');

function custom_menu()
{
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'mobile-menu' => 'Mobile Menu'
    ));
}

add_action('init', 'custom_menu');

function menu($theme_location)
{
    $menu_list = '';
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        if ($theme_location == 'main-menu')
            $menu_list .= '<ul class="list-unstyled">' . "\n";
        else if ($theme_location == 'mobile-menu')
            $menu_list .= '<ul>' . "\n";

        $count = 0;
        $submenu1 = false;
        $submenu2 = false;
        $level1_id = null;
        $level2_id = null;
        foreach ($menu_items as $menu_item) {
            $currentClass = ($menu_item->object_id == get_queried_object_id()) ? 'active' : '';
            $link = $menu_item->url;
            $title = $menu_item->title;

            if (!$menu_item->menu_item_parent) {
                $level1_id = $menu_item->ID;
                $menu_list .= '<li class="' . $currentClass . '">' . "\n";
                if ($menu_items[$count + 1]->menu_item_parent == $level1_id) {
                    if ($theme_location == 'main-menu')
                        $menu_list .= '<a title="" class="d-flex justify-content-between align-items-center" href="' . $link . '">' . $title . '<i class="fa fa-angle-down ml-2" aria-hidden="true"></i></a>' . "\n";
                    else if ($theme_location == 'mobile-menu')
                        $menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
                } else {
                    $menu_list .= '<a title="" class="" href="' . $link . '">' . $title . '</a>' . "\n";
                }
            }

            if ($level1_id == $menu_item->menu_item_parent) {
                $level2_id = $menu_item->ID;
                if (!$submenu1) {
                    $submenu1 = true;
                    if ($theme_location == 'main-menu')
                        $menu_list .= '<ul class="list-unstyled">' . "\n";
                    else if ($theme_location == 'mobile-menu')
                        $menu_list .= '<ul>' . "\n";
                }

                $menu_list .= '<li class="' . $currentClass . '">' . "\n";
                $menu_list .= '<a title="" class="" href="' . $link . '">' . $title . '</a>' . "\n";
            }

            if ($level2_id == $menu_item->menu_item_parent) {
                if (!$submenu2) {
                    $submenu2 = true;
                    if ($theme_location == 'main-menu')
                        $menu_list .= '<ul class="list-unstyled">' . "\n";
                    else if ($theme_location == 'mobile-menu')
                        $menu_list .= '<ul>' . "\n";
                }

                $menu_list .= '<li class="' . $currentClass . '">' . "\n";
                $menu_list .= '<a title="" class="" href="' . $link . '">' . $title . '</a>' . "\n";
                $menu_list .= '</li>' . "\n";
            }

            if($level2_id && $submenu2 && (!isset($menu_items[$count + 1]) || $menu_items[$count + 1]->menu_item_parent != $level2_id)) {
                $menu_list .= '</ul></li>' . "\n";
                $submenu2 = false;
            }

            if($level1_id && $submenu1 && (!isset($menu_items[$count + 1]) || ($menu_items[$count + 1]->menu_item_parent != $level1_id && $menu_items[$count + 1]->menu_item_parent != $level2_id))) {
                $menu_list .= '</ul></li>' . "\n";
                $submenu1 = false;
            }


            $count++;
        }

        $menu_list .= '</ul>' . "\n";
    }
    echo $menu_list;
}

function fb_metadata() {
    $str = "";
    if(is_single() && !is_admin()) {
        $str .= '
            <meta property="og:url" content="' . get_permalink() . '" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="' . get_the_title() . '" />
            <meta property="og:image" content="' . (get_the_post_thumbnail_url() ?? get_template_directory_uri() . '/assets/app/images/noimage.jpg') . '" />
            <meta property="og:description"   content="' . strip_tags(get_the_excerpt()) . '" />
        ';
    }
    echo $str;
}

function sn_action()
{
?>
    <div class="post-share d-flex justify-content-center">
        <div class="fb-like" data-layout="button_count" data-size="large" data-share="true" data-width="450" data-show-faces="true"></div>
    </div>
<?php
}

function sn_comment()
{
?>
    <div class="post-cmt">
        <div class="fb-comments" data-href="<?php the_permalink(); ?>" loading="lazy" data-numposts="10" width="100%" data-colorscheme="light" data-version="v2.3"></div>
    </div>

<?php
}

function list_course_shortcode()
{
    global $post;
    $parent_category = get_category_by_slug('course');
    if ($parent_category) {
        $child_categories = get_categories([
            'parent' => $parent_category->term_id,
            'orderby' => 'slug',
            'hide_empty' => false,
        ]);
    }
    $query = [
        'post_type' => 'course',
        'post_status' => 'publish',
        'numberposts' => -1,
        'order' => 'ASC',
    ];
    $posts = [];
    if(!empty($child_categories)) {
        foreach($child_categories as $child_category) {
            $query['cat'] = $child_category->term_id;
            $temp = get_posts($query);
            $posts = array_merge($posts, $temp);
        }
    } else {
        $temp = get_posts($query);
        $posts = array_merge($posts, $temp);
    } 
    $str = '';
    if ($posts) {
        $str .= '
        <section class="home-course-section pt-3 pt-md-4 pb-3 pb-md-5 bg-lighter">
            <div class="container">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h3 class="display-4 font-bold text-center mb-0">CÁC KHÓA HỌC</h3>
                    <a class="lead-more" href="' . get_post_type_archive_link('course') . '"><span>Xem thêm</span> <i></i></a>
                </div>
                <div class="">
                    <div class="gv-slider owl-carousel owl-theme owl-loaded owl-drag" id="course-slider">';
        $temp = ['danger', 'primary', 'info', 'warning'];
        $i = -1;
        foreach ($posts as $post) {
            $i++;
            setup_postdata($post);
            $str .= '
                            <div class="item">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <h5 class="fs-14 fs-md-17 h3 mb-0">' . get_the_title() . '</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="">';
            if (has_post_thumbnail()) {
                $str .= '<img src="' . get_the_post_thumbnail_url() . '" alt="">';
            } else {
                $str .= '<img src="' . get_template_directory_uri() . '/assets/app/images/noimage.jpg" alt="">';
            }
            $str .= '
                                        </div>
                                        <div class="p-4">
                                            <ul class="list-unstyled mb-4 hide-on-mobile">';
            $excerpt_items = [];
            if(has_excerpt()) {
                $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
            }
            foreach ($excerpt_items as $item) {
                if($item) {
                    $str .= '
                                                <li class="mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="icon icon-xs icon-shape bg-gradient-' . $temp[$i % 4] . ' text-white shadow rounded-circle"></div>
                                                        <span class="pl-2 text-sm d-block">' . $item . '</span>
                                                    </div>
                                                </li>';
                }
            }
            $str .= '
                                            </ul>
                                            <a href="' . get_the_permalink() . '" class="btn btn-block btn-' . $temp[$i % 4] . '">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        }
        wp_reset_postdata();
        $str .= '
                    </div>
                </div>
            </div>
        </section>';
    }
    return $str;
}

add_shortcode('list-course-shortcode', 'list_course_shortcode');

function list_test_shortcode($args)
{
    $category_color_classes = [
        'listening' => 'bg-blue',
        'speaking' => 'bg-pink',
        'writing' => 'bg-violet',
        'reading' => 'bg-oranges',
        'vocabulary-grammar' => 'bg-green'
    ];
    $parent_category = get_category_by_slug($args['slug']);
    if (!$parent_category) {
        return;
    }
    $child_categories = get_categories([
        'parent' => $parent_category->term_id,
        'orderby' => 'slug',
        'hide_empty' => false,
    ]);
    global $post;
    $posts = get_posts([
        'post_type' => 'test',
        'category_name' => $args['slug'],
        'post_status' => 'publish',
        'numberposts' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    $str = '';
    if ($posts) {
        $str .=  '
        <div class="col-study-step wow animated fadeIn animated" data-wow-delay="0.1s" style="">
            <div class="d-flex study-mobile-col">
                <div class="' . $category_color_classes[$args['slug']] . ' span_1_of_4">
                    <ul class="menu-step">
                        <h3><b>' . $parent_category->name . '</b></h3>
                        <h2>Chọn mục tiêu</h2>';
        foreach ($child_categories as $child_category) {
            $str .= '<li><a href="' . get_category_link($child_category) . '" title=""><i class="fa fa-caret-right" aria-hidden="true"></i> ' . $child_category->name . '</a></li>';
        }
        $str .= '
                    </ul>
                </div>
                <div class="span_3_of_4">
                    <ul class="list_hot_post">';
        foreach ($posts as $post) {
            setup_postdata($post);
            $str .= '
                            <li class="top_post_item col-md-3 col-sm-6 col-xs-12">
                                <div class="frame">
                                    <a href="' . get_the_permalink() . '" title="">
                                        <img title="" alt="" src="' . (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') . ' ">
                                    </a>
                                </div>
                                <h3><a class="title title_bold" href="' . get_the_permalink() . '" title="">' . get_the_title() . '</a></h3>
                            </li>';
        }
        wp_reset_postdata();
        $str .= '
                    </ul>
                </div>
            </div>
        </div>';
    }
    return $str;
}

add_shortcode('list-test-shortcode', 'list_test_shortcode');

function list_document_shortcode($args)
{
    global $post;
    $posts = get_posts([
        'post_type' => 'document',
        'post_status' => 'publish',
        'numberposts' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    $str = '';
    if ($posts) {
        $str .= '
        <section class="home-test-onine-section py-5 bg-cta-one">
            <div class="container">
                <h3 class="display-3 font-bold mb-5 text-center">TÀI LIỆU LUYỆN THI IELTS ONLINE</h3>
                <ul class="col-botro">';
        foreach ($posts as $post) {
            setup_postdata($post);
            $str .= '     
                    <li>
                        <a href="' . get_the_permalink() . '" title="" class="d-flex align-items-start">
                            <i class="fa fa-chevron-circle-right text-warning mr-1" aria-hidden="true"></i>
                            <span class="text-default">' . get_the_title() . '</span>
                        </a>
                    </li>
                    ';
        }
        wp_reset_postdata();
        $str .= '
                </ul>
            </div>
            <div class="mt-4 d-flex justify-content-center mt-4">
            <a href="' . get_post_type_archive_link('document') . '" class="btn btn btn-outline-warning">Xem thêm</a>
        </div>
        </section>';
    }
    return $str;
}

add_shortcode('list-document-shortcode', 'list_document_shortcode');

function list_teacher_shortcode($args)
{
    global $post;
    $posts = get_posts([
        'post_type' => 'teacher',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    $str = '';
    if ($posts) {
        $str .= '
        <section class="home-techer-section py-5 hot-gv-home">
            <div class="container">
                <div class="mb-4 d-flex align-items-center justify-content-center">
                    <h3 class="display-3 font-bold mb-3 text-center text-teacher-title">ĐỘI HÌNH GIẢNG VIÊN</h3>
                </div>
                <div class="gv-slider owl-carousel owl-theme" id="gv-slider">';
        foreach ($posts as $post) {
            setup_postdata($post);
            $excerpt = '';
            $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
            foreach ($excerpt_items as $item) {
                if ($item) {
                    $class = ''; 
                    if(preg_match ('/^\d\.\d(.*)ielts/' , strtolower($item)) || preg_match ('/^ielts(.*)\d\.\d/' , strtolower($item))) {
                        $class = 'ielts-point'; 
                    }
                    $excerpt .= '<small class="text-center d-block mb-0 h4 font-weight-normal text-white '. $class .'">' . $item . '</small>';
                }
            }
            $str .= '     
                    <div class="gv-item">
                        <div class="card">
                            <!-- Card header -->
                            <!-- Card image -->
                            <!-- List group -->
                            <!-- Card body -->
                            <div class="card-body gv-card-body">
                                <div class="gv-avatar">
                                    <img src="' . (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') . ' " alt="">
                                </div>
                                <div class="pt-4">
                                    <div class="mb-4 text-center">
                                        <h5 class="h3 title">
                                            <span class="mb-1 teacher-name">' . get_the_title() . '</span>
                                            <small class="mt-4 d-block h4 font-weight-light text-truncate-3 text-justify">' . $excerpt . '</small>
                                        </h5>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="' . get_the_permalink() . '" class="btn m-auto btn-outline-white lead-more-teacher">Xem chi tiết<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        wp_reset_postdata();
        $str .= '
                </div>
            </div>
        </section>';
    }
    return $str;
}

add_shortcode('list-teacher-shortcode', 'list_teacher_shortcode');

function list_student_shortcode($args)
{
    global $post;
    $posts = get_posts([
        'post_type' => 'student',
        'post_status' => 'publish',
        'numberposts' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    $str = '';
    if ($posts) {
        $str .= '
        <section class="hs-slider-section py-5">
            <div class="container">
                <div class="mb-4 d-flex align-items-center justify-content-center">
                    <h3 class="display-3 font-bold mb-3 text-center">HỌC VIÊN IZONE</h3>
                </div>
                <div class="owl-carousel owl-theme gv-slider" id="hs-slider">';
        foreach ($posts as $post) {
            setup_postdata($post);
            $excerpt = '';
            $excerpt_items = preg_split("/\r\n|\n|\r/", get_the_excerpt());
            foreach ($excerpt_items as $item) {
                if ($item)
                    $excerpt .= '<small class="text-center d-block mb-0 h4 font-weight-normal text-muted">' . $item . '</small>';
            }
            $cover_video = get_post_meta(get_the_ID(), 'cover_video_embed', true);
            $str .= '  
                    <a href="' . get_the_permalink() . '">   
                        <div class="item-video">';
            if ($cover_video)
                $str .= '       
                            <div class="video-youtube d-flex flex-column flex-xl-row" data-url="' . $cover_video . '">
                                <div class="youtube-thumb w-100">
                                    <div class="thumb-ratio ratio-16-9">
                                        <img src="" alt="">
                                    </div>
                                </div>
                            </div>';
            else
                $str .= '
                            <div class="frame">
                                <img title="" alt="" src="' . (has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/app/images/noimage.jpg') . ' ">
                            </div>';

            $str .= '
                            <div class="pt-3">
                                <div class="mb-4 text-center">
                                    <h5 class="h3 title">
                                        <span class="d-block mb-2">' . get_the_title() . '</span>
                                        <small class="h4 font-weight-light text-muted text-justify">' . $excerpt . '</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </a>';
        }
        wp_reset_postdata();
        $str .= '
                </div>
                <div class="mt-4 d-flex justify-content-center mt-4">
                    <a href="' . get_post_type_archive_link('student') . '" class="btn btn btn-outline-info">Xem thêm nhận xét của các học viên khác</a>
                </div>
            </div>
        </section>';
    }
    return $str;
}

add_shortcode('list-student-shortcode', 'list_student_shortcode');

function nav_pagination()
{
    if (is_singular())
        return;
    global $wp_query;
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    if ($paged >= 1)
        $links[] = $paged;
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    /** Hiển thị thẻ đầu tiên \n để xuống dòng code */
    echo '
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item ' . ($paged != 1 ? '' : 'disabled') . '">
                <a class="page-link" href="' . esc_url(get_pagenum_link($paged - 1)) . '">
                    <i class="fa fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
            </li>';

    /** Nếu đang ở trang 1 thì nó sẽ hiển thị đoạn này */
    if (!in_array(1, $links)) {
        echo '
            <li class="page-item ' . (1 == $paged ? 'active' : '') . '">
                <a class="page-link" href="' . esc_url(get_pagenum_link(1)) . '">
                    1
                </a>
            </li>';
        if (!in_array(2, $links))
            echo '<li class="page-item disabled"><a class="page-link" href="#">…</a></li>';
    }
    /** Hiển thị khi đang ở một trang nào đó đang được lựa chọn */
    sort($links);
    foreach ((array) $links as $link) {
        echo '
            <li class="page-item ' . ($link == $paged ? 'active' : '') . '">
                <a class="page-link" href="' . esc_url(get_pagenum_link($link)) . '">
                    ' . $link . '
                </a>
            </li>';
    }

    /** Hiển thị khi đang ở trang cuối cùng */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li class="page-item disabled"><a class="page-link" href="#">…</a></li>';
        echo '
        <li class="page-item ' . ($max == $paged ? 'active' : '') . '">
            <a class="page-link" href="' . esc_url(get_pagenum_link($max)) . '">
                ' . $max . '
            </a>
        </li>';
    }

    /** Hiển thị link về trang sau */
    echo '
            <li class="page-item ' . ($paged != $max ? '' : 'disabled') . '">
                <a class="page-link" href="' . esc_url(get_pagenum_link($paged + 1)) . '">
                    <i class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>';
}

add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && is_category()) {
        $categories = explode('/', $query->query['category_name']);
        if ($categories[0] == 'test' || $categories[0] == 'student' || $categories[0] == 'schedule' || $categories[0] == 'document' || $categories[0] == 'teacher') {
            $query->set('post_type', $categories[0]);
        }
    }
});

function generate_breadcrumb()
{
    global $wp_query;
    $displayed_post_type = [
        'test' => 'Luyện Thi IELTS Online',
        'teacher' => 'Đội hình giảng viên',
        'course' => 'Khóa học',
        'document' => 'Tài liệu luyện thi ielts online',
        'schedule' => 'Lịch khai giảng',
        'student' => 'Ý kiến học viên'
    ];
    $str = '<li class="breadcrumb-item"><a href="' . get_home_url() . '" rel="nofollow">Trang chủ</a></li>';
    if (is_single()) {
        $str .= '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link(get_post_type()) . '">' . $displayed_post_type[get_post_type()] . '</a></li>';
        $str .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
    } else if (is_archive()) {
        if (is_category()) {
            $str .= '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($wp_query->query_vars['post_type']) . '">' . $displayed_post_type[$wp_query->query_vars['post_type']] . '</a></li>';
            $categories = explode('/', $wp_query->query['category_name']);
            foreach ($categories as $i => $category) {
                if (!isset($displayed_post_type[$category])) {
                    $category_object = get_category_by_slug($category);
                    if ($i == count($categories) - 1) {
                        $str .= '<li class="breadcrumb-item active">' . $category_object->name . '</li>';
                    } else {
                        $str .= '<li class="breadcrumb-item"><a href="' .  get_category_link($category_object) . '">' . $category_object->name . '</a></li>';
                    }
                }
            }
        } else {
            $str .= '<li class="breadcrumb-item active">' . $displayed_post_type[$wp_query->query_vars['post_type']] . '</li>';   
        }
    }
    echo $str;
}


//cout view post
function get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    if($count)
        return $count;
    else return 0;
}
function set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'posts_column_views' );
add_action( 'manage_posts_custom_column', 'posts_custom_column_views' );