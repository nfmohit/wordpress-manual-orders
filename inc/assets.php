<?php
/**
 * Enqueue and handle assets
 *
 * @since      1.0.0
 * @package    WordPress Offline Orders
 * @author     Nahid Ferdous Mohit
 */

// Admin Assets
function offorder_enqueue_admin_assets() {
    wp_enqueue_style( 'plugin-admin-style',  plugin_dir_url(dirname(__FILE__)) . "assets/css/plugin-admin-style.css");
}
add_action( 'admin_print_styles', 'offorder_enqueue_admin_assets' );

// Front-end Assets
function offorder_enqueue_front_assets() {
    wp_enqueue_style( 'plugin-front-style',  plugin_dir_url(dirname(__FILE__)) . "assets/css/plugin-front-style.css");
}
add_action( 'wp_enqueue_scripts', 'offorder_enqueue_front_assets' );