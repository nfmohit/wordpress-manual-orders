<?php
/**
 * Handle user roles and capabilities
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

/**
  * Add capabilities for the shop administrator role
  */
function add_wpmo_shop_admin_role_caps() {
    // gets the subscriber role
    $roles = array('wpmo_shop_admin','editor','administrator');

    foreach($roles as $the_role) { 
    	$role = get_role($the_role);

    	if ( $role ) {
			$role->add_cap( 'read' );
			$role->add_cap( 'read_wpmo_order' );
			$role->add_cap( 'read_private_wpmo_orders' );
			$role->add_cap( 'edit_wpmo_order' );
			$role->add_cap( 'edit_wpmo_orders' );
			$role->add_cap( 'edit_others_wpmo_orders' );
			$role->add_cap( 'edit_published_wpmo_orders' );
			$role->add_cap( 'publish_wpmo_orders' );
			$role->add_cap( 'delete_others_wpmo_orders' );
			$role->add_cap( 'delete_private_wpmo_orders' );
			$role->add_cap( 'delete_published_wpmo_orders' );
		}	
	}	
}
add_action( 'admin_init', 'add_wpmo_shop_admin_role_caps' );

/**
  * Hide Toolbar for customer user role
  */
function remove_admin_bar_wpmo_customer() {
	$current_user   = wp_get_current_user();
    $role_name      = $current_user->roles;

    if ( 'wpmo_customer' === $role_name ) {
        show_admin_bar(false);
    }
}
add_action('init', 'remove_admin_bar_wpmo_customer');