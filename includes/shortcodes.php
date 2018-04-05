<?php
/**
 * WordPress Manual Orders Shortcodes
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

// Adding the [wp-manual-orders] shortcode

function wpmanualorders_shortcode( $aats ) {
	if ( ! is_user_logged_in() ) {
		echo '<h3 class="wpmanualorders_customer_login_title">Log In</h3>';
		echo wp_login_form();
	} else {
		require_once plugin_dir_path(dirname(__FILE__)) . 'templates/wpmanualorders-shortcode.php';
	}
}
add_shortcode( 'wp-manual-orders', 'wpmanualorders_shortcode' );