<?php
/**
 * Plugin Name: Basketball Club Tracker
 * Description: Manage basketball club teams, recruit players, track alumni, and more.
 * Version: 1.0
 * Author: ABQ Finest Web Design
 * Text Domain: basketball-club-tracker
 */

// Register plugin activation hook
register_activation_hook( __FILE__, 'bct_activate_plugin' );
function bct_activate_plugin() {
    // Plugin activation code (e.g., set default options or create database tables)
    // Example: You can create tables here to store player data, team data, etc.
}

// Register plugin deactivation hook
register_deactivation_hook( __FILE__, 'bct_deactivate_plugin' );
function bct_deactivate_plugin() {
    // Plugin deactivation cleanup code (optional)
    // Example: remove temporary data from the database or reset options
}

// Initialize the plugin
add_action( 'init', 'bct_init_plugin' );

function bct_init_plugin() {
    // Register custom post types, taxonomies, etc.
    bct_register_custom_post_types();
}

// Register custom post types (CPTs) for Player Profiles and other features
function bct_register_custom_post_types() {
    // Player Profile CPT
    register_post_type( 'player_profile', array(
        'labels' => array(
            'name' => 'Player Profiles',
            'singular_name' => 'Player Profile',
            'add_new' => 'Add New Player',
            'edit_item' => 'Edit Player Profile',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'show_in_rest' => true, // Enable block editor
    ) );

    // You can add other CPTs for 'Teams', 'Games', 'Alumni', etc. in a similar way
}

// Enqueue necessary styles and scripts
add_action( 'wp_enqueue_scripts', 'bct_enqueue_styles_scripts' );
function bct_enqueue_styles_scripts() {
    wp_enqueue_style( 'bct-style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
    wp_enqueue_script( 'bct-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery' ), '1.0', true );
}

// Optionally, create a settings page to manage plugin options (e.g., integration with Hudl, etc.)
function bct_add_settings_page() {
    add_menu_page(
        'Basketball Club Tracker',   // Page title
        'Basketball Club Tracker',   // Menu title
        'manage_options',            // Capability
        'bct-settings',              // Menu slug
        'bct_settings_page_content'  // Callback function to display settings page
    );
}
add_action( 'admin_menu', 'bct_add_settings_page' );

// Content for the plugin's settings page
function bct_settings_page_content() {
    ?>
    <div class="wrap">
        <h1>Basketball Club Tracker Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'bct-settings-group' );
            do_settings_sections( 'bct-settings-group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">API Key for Hudl Integration</th>
                    <td><input type="text" name="hudl_api_key" value="<?php echo esc_attr( get_option('hudl_api_key') ); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
