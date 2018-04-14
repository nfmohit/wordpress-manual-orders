<?php
/**
 * Execute the following code during plugin activation
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

/**
 * Adding required user roles, only on plugin activation
 */

// Customer
add_role( 
	'wpmo_customer',
	__( 'Customer', 'wp-manual-orders' ),
	array(
		'read' => true,
	) 
);

// Shop Administrator
add_role(
	'wpmo_shop_admin',
	__( 'Shop Administrator', 'wp-manual-orders' ),
	array(
		'read' => true,
	)
);