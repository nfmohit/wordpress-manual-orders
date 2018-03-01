<?php
/**
 * Handle Users
 *
 * @since      1.0.0
 * @package    Customer Panel
 * @author     Nahid Ferdous Mohit
 */

// Add user capabilities to shop administrator user role
function add_offorders_shop_admin_role_caps() {
    // gets the subscriber role
    $roles = array('offorders_shop_admin','editor','administrator');

    foreach($roles as $the_role) { 
    	$role = get_role($the_role);

    	if ( $role ) {
			$role->add_cap( 'read' );
			$role->add_cap( 'read_offorders_order' );
			$role->add_cap( 'read_private_offorders_orders' );
			$role->add_cap( 'edit_offorders_order' );
			$role->add_cap( 'edit_offorders_orders' );
			$role->add_cap( 'edit_others_offorders_orders' );
			$role->add_cap( 'edit_published_offorders_orders' );
			$role->add_cap( 'publish_offorders_orders' );
			$role->add_cap( 'delete_others_offorders_orders' );
			$role->add_cap( 'delete_private_offorders_orders' );
			$role->add_cap( 'delete_published_offorders_orders' );
		}	
	}	
}
add_action( 'admin_init', 'add_offorders_shop_admin_role_caps' );

// Hide Toolbar for customers
function remove_admin_bar_offorders_customer() {
	$current_user   = wp_get_current_user();
    $role_name      = $current_user->roles;

    if ( 'offorders_customer' === $role_name ) {
        show_admin_bar(false);
    }
}
add_action('init', 'remove_admin_bar_offorders_customer');