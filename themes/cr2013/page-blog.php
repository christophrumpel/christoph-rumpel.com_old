<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<?php $myposts = get_posts(''); ?>

<div class="grid-wrapper">
	<div class=" grid one-whole hide--palm">
		<div class="separator seperator--blog">
			<div class="separator__content"><span>"</span></div>
		</div>
		<p class="blog-intro">I like to write about my experiences in web-design and web-developing. We have an amzing community out there and i am proud to be part of that. In the last years i was able to learn a lot from great people in this community, who were not afraid of sharing their experiences and code in order to help others like me. This blog says “Thank You” to all of them and is hopefully helpful to others.</p>
		<div class="separator seperator--blog">
			<div class="separator__content"><span>"</span></div>
		</div>
	</div>
</div>
<section class="section-articles"> <!-- START SECTION ARTICLES -->
	<div class="grid-wrapper">
		<div class="grid one-whole">
			<ul class="articles">

				<?php
				// Looping posts
				foreach($myposts as $post) :

					setup_postdata($post); ?>
					<li class="articles__item">
						<h4 class="articles__date"><?php the_date(); ?></h4>
						<h3 class="articles__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					</li>

				<?php endforeach; wp_reset_postdata(); ?>

			</ul>
		</div>
	</div>	
</section> <!-- END SECTION ME -->

<?php get_footer(); ?>
