<?php
/**
 * Core plugin file
 *
 * @since      0.0.1
 * @package    WordPress Manual Orders
 * @author     Nahid Ferdous Mohit
 */

// CSS and JS assets
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/assets.php';

// File containing code for the orders post type and it's metaboxes
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/order.php';

// Handle users and capabilities
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/users.php';

// Shortcodes
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/shortcodes.php';