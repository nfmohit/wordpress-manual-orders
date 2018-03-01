<?php
/**
 * Execute the following code during plugin activation
 *
 * @since      1.0.0
 * @package    WordPress Offline Orders
 * @author     Nahid Ferdous Mohit
 */

/**
 * Adding required user roles, only on plugin activation
 */

// Customer
add_role( 
	'offorders_customer', 
	'Customer', 
	array( 
		'read' => true,
		'level_0' => true, 
	) 
);

// Shop Administrator
add_role(
	'offorders_shop_admin',
	'Shop Administrator',
	array(
		'read' => true,
		'level_0' => 1,
	)
);