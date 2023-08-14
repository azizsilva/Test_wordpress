<?php
/**
 * Plugin Name: Aziz Rezgui News Articles
 * Description: Adds a news article custom post type organized by topics.
 * Version: 1.0
 * Author: Mohamed Aziz Rezgui
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Aziz_Rezgui_Plugin {

    public function __construct() {
        add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'register_custom_taxonomy'));
    }

    public function register_custom_post_type() {
        $labels = array(
            'name' => __('News Articles', 'aziz-rezgui'),
           
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'taxonomies' => array('news_topics'),
        );

        register_post_type('news_article', $args);
    }

    public function register_custom_taxonomy() {
        $labels = array(
            'name' => __('Topics', 'aziz-rezgui'),
           
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'news-topic'),
        );

        register_taxonomy('news_topics', array('news_article'), $args);
    }
}

new Aziz_Rezgui_Plugin();
