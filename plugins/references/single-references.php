<?php
 /*Template Name: New Template
 */
get_header(); ?>
<h3>test single reference</h3>
<div id="primary">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
      <h1><?php the_title(); ?></h1>
      <p><em><?php the_time('l, F jS, Y'); ?></em></p>

      <?php the_content(); ?> 

      <hr />
      <?php comments_template(); ?>
    <?php endwhile; else: ?> 
      <p><?php _e('Sorry, this page does not exist.'); ?></p> 
  <?php endif; ?> 
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>


