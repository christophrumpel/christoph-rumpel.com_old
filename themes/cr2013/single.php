<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

        <div class=" grid-wrapper">
            <div class="grid seven-tenths palm-one-whole">
                <article <?php post_class('article') ?> id="post-<?php the_ID(); ?>">
                    <h3 class="article__title"><?php the_title(); ?></h3>
                    <h5 class="article__date"><?php the_date(); ?></h5>
                    <?php the_content(); ?>
                </article>
            </div>
            <div class="grid three-tenths hide--palm">
                
            </div>
        </div>
    <?php endwhile; endif; ?>

    <?php comments_template('', true); ?>

         
<?php get_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery-1.7.2.min.js" ></script> 
<script src="<?php bloginfo('template_directory'); ?>/_/js/lightbox.js" ></script> 
  