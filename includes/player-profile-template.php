<?php
/**
 * Handles the display of individual player profiles.
 */

function bct_player_profile_template( $template ) {
    if ( is_singular( 'player_profile' ) ) {
        $template = plugin_dir_path( __FILE__ ) . '../templates/single-player_profile.php';
    }
    return $template;
}
add_filter( 'template_include', 'bct_player_profile_template' );
