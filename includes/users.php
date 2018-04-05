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
function add_wpmanualorders_shop_admin_role_caps() {
    // gets the subscriber role
    $roles = array('wpmanualorders_shop_admin','editor','administrator');

    foreach($roles as $the_role) { 
    	$role = get_role($the_role);

    	if ( $role ) {
			$role->add_cap( 'read' );
			$role->add_cap( 'read_wpmanualorders_order' );
			$role->add_cap( 'read_private_wpmanualorders_orders' );
			$role->add_cap( 'edit_wpmanualorders_order' );
			$role->add_cap( 'edit_wpmanualorders_orders' );
			$role->add_cap( 'edit_others_wpmanualorders_orders' );
			$role->add_cap( 'edit_published_wpmanualorders_orders' );
			$role->add_cap( 'publish_wpmanualorders_orders' );
			$role->add_cap( 'delete_others_wpmanualorders_orders' );
			$role->add_cap( 'delete_private_wpmanualorders_orders' );
			$role->add_cap( 'delete_published_wpmanualorders_orders' );
		}	
	}	
}
add_action( 'admin_init', 'add_wpmanualorders_shop_admin_role_caps' );

/**
  * Hide Toolbar for customer user role
  */
function remove_admin_bar_wpmanualorders_customer() {
	$current_user   = wp_get_current_user();
    $role_name      = $current_user->roles;

    if ( 'wpmanualorders_customer' === $role_name ) {
        show_admin_bar(false);
    }
}
add_action('init', 'remove_admin_bar_wpmanualorders_customer');