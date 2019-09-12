<?php
//Enqueue scripts and styles
function load_scripts()
{
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap.min.js'), array('jquery'), '4.3.1', true);
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/css/bootstrap.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('custom-css', get_theme_file_uri('style.css'), array(), microtime(), 'all'); //TODO: remove microtime

    //custom scripts
    wp_enqueue_script('global-js', get_theme_file_uri('/js/global.js'), array('jquery'), microtime(), true);
}
add_action('wp_enqueue_scripts', 'load_scripts');

add_theme_support('post-thumbnails');

function bkf_config()
{
    add_theme_support('post-thumbnails'); //add support for thumbnails
    add_theme_support('title-tag');
    add_theme_support('yoast-seo-breadcrumbs');
}
add_action('after_setup_theme', 'bkf_config', 0); //hook

function register_my_menus()
{
    register_nav_menus(
        array(
            'header_menu_location' => __('Header Menu Location'),
            'mobile_header_menu_location' => __('Mobile Header Menu Location'),
            'header_menu_location_inst' => __('Header Menu Location (Institutional)'),
            'mobile_header_menu_location_inst' => __('Mobile Header Menu Location (Institutional)'),
            'footer_what_to_clean_location' => __('What to Clean Location (Footer)'),
            'footer_our_products_location' => __('Our Products Location (Footer)'),
            'footer_about_us_location' => __('About Us Location (Footer)'),
        )
    );
}
add_action('init', 'register_my_menus');

function insert_nav($splash = true, $inst = false)
{
    switch ($splash) {
        case true:
            include(locate_template('template-parts/nav/nav.php', false, false));
            break;
        case false:
            include(locate_template('template-parts/nav/nav.php', false, false));
            include(locate_template('template-parts/nav/offset.php', false, false));
            break;
    }
}

function insert_widget($type, $title = "ERROR NO TITLE")
{
    include(locate_template('template-parts/widgets/' . $type . '.php', false, false));
}

function insert_slider($id, $is_pod = true)
{
    include(locate_template('template-parts/sliders/slider.php', false, false));
}

//rewrite rules
add_action('init', function () {
    add_rewrite_rule(
        '^blog/category/([^/]+)([/]?)(.*)',
        'index.php?pagename=blog&category=$matches[1]',
        'top'
    );
});

add_filter('query_vars', function ($vars) {
    $vars[] = 'pagename';
    $vars[] = 'category';
    return $vars;
});

//change [...] to ...
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//=============================================================================================================
//AJAX blog page reloading
//=============================================================================================================

function load_posts_by_ajax_callback()
{
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];

    //$col = $_POST['col']; //get which column we're on
    $category = $_POST['cat'];
    $ppp = $_POST['ppp']; //posts per page (value set on index.php)

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'paged' => $paged,
        'category_name' => $category,
    );
    $my_posts = new WP_Query($args);

    //see if there's another post after this
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'paged' => $paged + 1,
        'category_name' => $category,
    );
    $next_post = new WP_Query($args);


    //$count = 0;
    if ($my_posts->have_posts()) : while ($my_posts->have_posts()) : $my_posts->the_post();
            include(locate_template('template-parts/index/blog-list-post-filtered.php', false, false));
        endwhile;
        if ($next_post->found_posts == 0) {
            echo "<span id='no-more-posts'></span>";
        }
    endif;

    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

//global vars for walker
$last_item_parent;
$walker_parent_tracker;

class BKF_Mobile_Nav_Walker extends Walker_Nav_Menu
{
    //Don't put unordered list after 1st level
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        if ($depth >= 1) {
            // $output = "";
            return;
        } else {
            parent::start_lvl($output, $depth, $args);
        }
    }

    //Don't put unordered list after 1st level
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        if ($depth >= 1) {
            // $output = "";
            return;
        } else {
            parent::end_lvl($output, $depth, $args);
        }
    }

    //add back button to start of list
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $last_item_parent;
        global $walker_parent_tracker;
        //if this item's parent is different from the last item's parent
        if ($last_item_parent != $item->menu_item_parent) {
            //and if the depth is currently at level 1
            if ($depth == 1) {
                //if the last level 1 parent was different from this parent
                if ($walker_parent_tracker != $item->menu_item_parent) {
                    // $output .= "<li class='special-back-button'>Lvl 1 Parent={$item->menu_item_parent} Title=" . get_the_title($item->menu_item_parent) . "</li>";
                    $output .= "<li class='special-back-button'>< Back to " . get_the_title($item->menu_item_parent) . "</li>";
                    $walker_parent_tracker = $item->menu_item_parent;
                }
            }
        }
        $last_item_parent = $item->menu_item_parent;
        parent::start_el($output, $item, $depth, $args, $id);
    }
}

function get_post_primary_category($post_id, $term = 'category', $return_all_categories = false)
{
    $return = array();

    if (class_exists('WPSEO_Primary_Term')) {
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term($term, $post_id);
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)) {
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories) {
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)) {
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories) {
            $return['all_categories'] = array();

            if (!empty($categories_list)) {
                foreach ($categories_list as &$category) {
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}