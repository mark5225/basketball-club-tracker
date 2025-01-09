<?php
/**
 * Template for recruiting a new player.
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
        'post_status' => 'pending',  // You can set to 'publish' if you want it to be immediately available
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

?>

<div class="recruit-player-form">
    <h2>Recruit New Player</h2>
    <form method="POST">
        <label for="player_name">Player Name</label>
        <input type="text" id="player_name" name="player_name" required>

        <label for="player_position">Position</label>
        <input type="text" id="player_position" name="player_position" required>

        <label for="player_height">Height</label>
        <input type="text" id="player_height" name="player_height" required>

        <label for="player_stats">Stats</label>
        <textarea id="player_stats" name="player_stats" required></textarea>

        <button type="submit" name="bct_recruit_player">Recruit Player</button>
    </form>
</div>
