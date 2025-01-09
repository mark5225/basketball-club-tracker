<?php
/**
 * Template for displaying individual Player Profiles.
 */

get_header(); ?>

<div class="player-profile">
    <h1><?php the_title(); ?></h1>
    
    <div class="player-details">
        <p><strong>Position:</strong> <?php the_field('position'); ?></p>
        <p><strong>Height:</strong> <?php the_field('height'); ?></p>
        <p><strong>Stats:</strong> <?php the_field('stats'); ?></p>
        <p><strong>Social Media Highlights:</strong> <?php the_field('social_media'); ?></p>
    </div>
</div>

<?php get_footer(); ?>
