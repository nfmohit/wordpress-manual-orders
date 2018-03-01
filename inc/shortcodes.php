<?php
/**
 * WordPress Offline Orders Shortcodes
 *
 * @since      1.0.0
 * @package    WordPress Offline Orders
 * @author     Nahid Ferdous Mohit
 */

// Adding the [wp-offline-orders] shortcode

function offorders_shortcode( $aats ) {
	if ( ! is_user_logged_in() ) {
		echo '<h3 class="offorders_customer_login_head">Log In</h3>';
		echo wp_login_form();
	} else {
		require_once plugin_dir_path(dirname(__FILE__)) . 'templates/offorders-shortcode.php';
	}
}
add_shortcode( 'wp-offline-orders', 'offorders_shortcode' );