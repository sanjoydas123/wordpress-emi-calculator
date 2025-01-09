<?php
/*
Plugin Name: SKD EMI Calculator
Description: A custom plugin to calculate EMI with real-time updates and display it with a circular progress chart.
Version: 1.0
Author: Sanjoy Das
*/

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin directory paths
define('SEC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SEC_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required files
require_once SEC_PLUGIN_DIR . 'includes/class-skd-emi-calculator.php';

// Initialize the plugin
function sec_initialize_plugin()
{
    $skd_emi_calculator = new skd_emi_calculator();
    $skd_emi_calculator->register();
}
add_action('plugins_loaded', 'sec_initialize_plugin');

// // Plugin activation hook
// function sec_activate_plugin()
// {
//     $skd_emi_calculator = new skd_emi_calculator();
//     $skd_emi_calculator->create_custom_post_type();
//     $skd_emi_calculator->create_custom_taxonomies();
//     flush_rewrite_rules();
// }
// register_activation_hook(__FILE__, 'sec_activate_plugin');

// // Plugin deactivation hook
// function sec_deactivate_plugin()
// {
//     flush_rewrite_rules();
// }
// register_deactivation_hook(__FILE__, 'sec_deactivate_plugin');
