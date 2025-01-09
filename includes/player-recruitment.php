<?php
/**
 * Handles player recruitment form and submission.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bct_recruit_player'])) {
    $name = sanitize_text_field($_POST['player_name']);
    $position = sanitize_text_field($_POST['player_position']);
    $height = sanitize_text_field($_POST['player_height']);
    $stats = sanitize_textarea_field($_POST['player_stats']);

    // Create a new post of type 'player_profile'
    $player_id = wp_insert_post(array(
        'post_type' => 'player_profile',
        'post_title' => $name,
        'post_status' => 'pending',
        'meta_input' => array(
            'position' => $position,
            'height' => $height,
            'stats' => $stats,
        ),
    ));

    if ($player_id) {
        echo '<p>Player recruited successfully!</p>';
    }
}

// Add a custom page template for the recruitment form
function bct_recruitment_form_template($template) {
    if (is_page('recruit-new-player')) {
        $template = plugin_dir_path( __FILE__ ) . '../templates/recruit-player.php';
    }
    return $template;
}
add_filter('template_include', 'bct_recruitment_form_template');
