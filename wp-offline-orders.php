<?php
/**
 * @package WordPress Offline Orders
 * @version 1.0
 */
/*
Plugin Name: WordPress Offline Orders
Plugin URI: https://nfmohit.pro/plugins/customer-panel
Description: A simple plugin that lets you add offline orders on behalf of your customers so that they can login and see their purchase history in a simple clean interface.
Author: Nahid Ferdous Mohit
Version: 1.0
Author URI: https://nfmohit.pro
Text Domain: wp-offline-orders
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * On plugin activation
 */
function activate_customer_panel() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activation.php';
}
register_activation_hook( __FILE__, 'activate_customer_panel' );

// Current plugin version.
define( 'WP_OFFLINE_ORDERS_VERSION', '1.0.0' );

//Calling the core file
require_once plugin_dir_path( __FILE__ ) . 'inc/core.php';