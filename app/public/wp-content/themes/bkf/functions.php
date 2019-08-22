<?php
//Enqueue scripts and styles
function load_scripts()
{
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap.min.js'), array('jquery'), '4.3.1', true);
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/css/bootstrap.min.css'), array(), '1.0', 'all');
    wp_enqueue_style('custom-css', get_theme_file_uri('style.css'), array(), microtime(), 'all'); //TODO: remove microtime

    //custom animation scripts:
    wp_enqueue_script('animation-js', get_theme_file_uri('/js/animate.js'), array('jquery'), microtime(), true);
    wp_enqueue_style('animation-css', get_theme_file_uri('/css/animate.css'), array(), microtime(), 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');

add_theme_support('post-thumbnails');

function bkf_config()
{
    // $args = array(
    //     'height' => 225,
    //     'width' => 1920 //more arguments available
    // );
    add_theme_support('post-thumbnails'); //add support for thumbnails
    add_theme_support('title-tag');
    add_theme_support('yoast-seo-breadcrumbs');
}
add_action('after_setup_theme', 'bkf_config', 0); //hook

//custom

function insert_nav($splash = true)
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