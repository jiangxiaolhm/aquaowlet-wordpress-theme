<?php

function aquaOwlet_resources() {

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

add_action('wp_enqueue_scripts', 'aquaOwlet_resources');

// Navigation Menus
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu')
));

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
