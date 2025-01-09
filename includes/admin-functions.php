<?php
/**
 * Admin functionality for player profiles.
 */

function bct_add_custom_columns( $columns ) {
    $columns['position'] = 'Position';
    $columns['height'] = 'Height';
    return $columns;
}
add_filter( 'manage_player_profile_posts_columns', 'bct_add_custom_columns' );

function bct_custom_column_content( $column, $post_id ) {
    if ( $column == 'position' ) {
        echo get_post_meta( $post_id, 'position', true );
    }
    if ( $column == 'height' ) {
        echo get_post_meta( $post_id, 'height', true );
    }
}
add_action( 'manage_player_profile_posts_custom_column', 'bct_custom_column_content', 10, 2 );
