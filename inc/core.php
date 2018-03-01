<?php
/**
 * Core file of the plugin created with an intention of organizing the code
 *
 * @since      1.0.0
 * @package    WordPress Offline Orders
 * @author     Nahid Ferdous Mohit
 */

// CSS and JS assets
require_once plugin_dir_path(dirname(__FILE__)) . 'inc/assets.php';

// File containing code for the orders post type and it's metaboxes
require_once plugin_dir_path(dirname(__FILE__)) . 'inc/order.php';

// Handle users and capabilities
require_once plugin_dir_path(dirname(__FILE__)) . 'inc/users.php';

// Shortcodes
require_once plugin_dir_path(dirname(__FILE__)) . 'inc/shortcodes.php';