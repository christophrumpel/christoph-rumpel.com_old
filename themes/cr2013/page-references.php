<?php
/*
Template Name: references
Info: Showing overvire of references
*/
?>
<?php get_header(); ?> 


<?php 
	// getting custom post type
	$args = array( 
		'post_type' => 'references',
		'meta_key'=>'reference_year',  
		'orderby' => 'meta_value_num', 
		'order' => DESC 
	);
	$loop = new WP_Query( $args );

	// Counter Variables
	$counters = array(
		'2011' => 0,
		'2012' => 0,
		'2013' => 0
	);


	// looping throug refereces
?>
		<div class="grid-wrapper">
			<!-- Looping through references -->
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="grid one-whole">
				<?php 
					// Checking reference year, output only one times
					$reference_year = esc_html( get_post_meta( get_the_ID(), 'reference_year', true ));

					// Checking if any year has not been put out on the site
					if ($counters[$reference_year] == 0) {

						$counters[$reference_year] = 1;
				?>
						<!-- <img src="<?php bloginfo("template_directory"); ?>/_/img/icon_<?php echo $reference_year; ?>.png" width="141" height="54" class="reference-year" alt="Reference Year"> -->
				<?php 
					} 
				?>
			</div>
			<div class="grid one-whole">

				<article class="reference">
					<div class="grid-wrapper">
						<div class="grid three-fifths lap-one-half palm-one-whole">
							<div class="reference__image-wrapper">
								<div class="reference__image-shadow"></div>
									<?php
										$domsxe = simplexml_load_string(get_the_post_thumbnail());
										$thumbnailsrc = $domsxe->attributes()->src;
									?>			
								<a target="_blank" href="<?php echo esc_html( get_post_meta( get_the_ID(), 'reference_url', true ) ); ?>">
									<img class="reference__image" src="<?php echo $thumbnailsrc; ?>" alt="Reference Image">
								</a>
							</div>
						</div>
						<div class="grid two-fifths lap-one-half palm-one-whole">
							<h5 class="reference__cat"><?php term_clean($post->ID, 'references_reference_type'); ?></h5>
							<h3 class="reference__title"><?php the_title(); ?></h3>
							<p class="reference__info">
								<?php echo get_the_content(); ?>
							</p>
							<div class="btn btn-ref"><a target="_blank" href="<?php echo esc_html( get_post_meta( get_the_ID(), 'reference_url', true ) ); ?>">View Project</a></div>
						</div>
					</div>
				</article>
			</div>

			<? endwhile; ?>
		</div> <!-- END GRID WRAPPER -->

<?php get_footer(); ?>


