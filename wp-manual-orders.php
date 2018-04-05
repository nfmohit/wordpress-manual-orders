<?php
/**
 * @package WordPress Manual Orders
 * @version 1.0
 */
/*
Plugin Name: WordPress Manual Orders
Plugin URI: https://nfmohit.pro/plugins/customer-panel
Description: A simple plugin that lets you add manual orders on behalf of your customers so that they can login and see their purchase history in a simple clean interface.
Author: Nahid Ferdous Mohit
Version: 0.0.1
Author URI: https://nfmohit.pro
Text Domain: wp-manual-orders
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currentl plugin version.
 */
define( 'WP_MANUAL_ORDERS_VERSION', '0.0.1' );

/**
 * Code that runs on plugin activation
 */
function activate_wp_manual_orders() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activation.php';
}
register_activation_hook( __FILE__, 'activate_wp_manual_orders' );

//Calling the core file
require_once plugin_dir_path( __FILE__ ) . 'includes/core.php';