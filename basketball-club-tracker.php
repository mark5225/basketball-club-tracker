<?php
/**
 * Plugin Name: Basketball Club Tracker
 * Description: Manage basketball club teams, recruit players, track alumni, and more.
 * Version: 1.0
 * Author: ABQ Finest Web Design
 * Text Domain: basketball-club-tracker
 */

// Include the required files
require_once plugin_dir_path( __FILE__ ) . 'includes/player-recruitment.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/player-profile-template.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/admin-functions.php';

// Initialize the plugin
add_action( 'init', 'bct_init_plugin' );
function bct_init_plugin() {
    // Register custom post types, taxonomies, etc.
    bct_register_custom_post_types();
}
