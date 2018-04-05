<?php
/**
 * Enqueue and handle assets
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

// Admin Assets
function wpmanualorders_enqueue_admin_assets() {
    wp_enqueue_style( 'plugin-admin-style',  plugin_dir_url(dirname(__FILE__)) . "assets/css/plugin-admin-style.css");
}
add_action( 'admin_print_styles', 'wpmanualorders_enqueue_admin_assets' );

// Front-end Assets
function wpmanualorders_enqueue_front_assets() {
    wp_enqueue_style( 'plugin-front-style',  plugin_dir_url(dirname(__FILE__)) . "assets/css/plugin-front-style.css");
}
add_action( 'wp_enqueue_scripts', 'wpmanualorders_enqueue_front_assets' );