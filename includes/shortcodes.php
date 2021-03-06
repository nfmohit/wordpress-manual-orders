<?php
/**
 * WordPress Manual Orders Shortcodes
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

// Adding the [wp-manual-orders] shortcode

function wpmo_shortcode( $aats ) {
	if ( ! is_user_logged_in() ) {
		echo '<h3 class="wpmo_customer_login_title">Log In</h3>';
		echo wp_login_form();
	} else {
		require_once plugin_dir_path(dirname(__FILE__)) . 'templates/wpmo-shortcode.php';
	}
}
add_shortcode( 'wp-manual-orders', 'wpmo_shortcode' );