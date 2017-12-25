<?php

function aquaowlet_resources() {

    $css = get_stylesheet_uri();
    $path = './wp-content/themes/aquaowlet/style.css';

    if (file_exists($path)) {
        wp_enqueue_style('style', $css, NULL, filemtime($path));
    } else if (file_exists($css)) {
        wp_enqueue_style('style', $css, NULL, filemtime($css));
    } else {
        wp_enqueue_style('style', $css, NULL);
    }
}

add_action('wp_enqueue_scripts', 'aquaowlet_resources');

// Get top ancestor
function get_top_ancestor_id() {

    global $post;

    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}

// Does page have children?
function has_children() {

    global $post;

    $children = get_children($post->ID);
    return count($children);
}

// Customize excerpt word count length
function custom_excerpt_length() {
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function aquaowlet_setup() {
    // Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));
    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 1080, 270, array('center', 'center'));
    
    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'aquaowlet_setup');


// Add Widget Location
function aquaowlet_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
}

add_action('widgets_init', 'aquaowlet_widgets_init');