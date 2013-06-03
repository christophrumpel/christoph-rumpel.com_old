<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
			<section class="section-me"> <!-- START SECTION ME -->
				<div class="grid-wrapper">
					<div class="grid one-fifth hide--lap hide--palm">
						<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_person.png" width="136" height="124" alt="Image Profile">
					</div>
					<div class="grid four-fifths lap-one-whole palm-one-whole">
						<div class="grid-wrapper">
							<div class="grid one-sixth lap-one-whole palm-one-whole text--center">
								<img class="section-me__icon-hi" src="<?php bloginfo('template_directory'); ?>/_/img/icon_hi.png" width="112" height="126" alt="Image saying Hi">
							</div>
							<div class="grid five-sixths lap-one-whole palm-one-whole grid--header-group">
								<hgroup class="header-group">
									<h1 class="header-group__name">I'm Christoph</h1>
									<h2 class="header-group__passion">A Passionate Web Developer</h2>
								</hgroup>
								<div class="info info--job animated delay-one fadeInDown">working for <a href="http://liechtenecker.at/" target="_blank">liechtenecker.at</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="separator seperator--me">
					<div class="separator__content">
						<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_heart_small.png" width="20" height="18" alt="Icon Of A Small Heart">
					</div>
				</div>
			</section> <!-- END SECTION ME -->

			<section class="section-location"> <!-- START SECTION LOCATION -->
				<div class="grid-wrapper">
					<div class="grid one-fifth hide--lap hide--palm">
						<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_location.png" width="110" height="128" alt="Location Icon">
					</div>
					<div class="grid four-fifths lap-one-whole palm-one-whole grid--location">
						<div class="from-austria">
							<h2 class="from-austria__from">i am from beautiful</h2>
							<h1 class="from-austria__austria">Austria</h1>
						</div>
						<div class="map">
							<img class="map__austria" src="<?php bloginfo('template_directory'); ?>/_/img/icon_map.png" alt="">
							<img class="map__location" src="<?php bloginfo('template_directory'); ?>/_/img/icon_map_location.png" width="35" height="48" alt="image of a locator">
						</div>
					</div>
				</div>
				<div class="separator seperator--location">
					<div class="separator__content">
						<span>&</span>
					</div>
				</div>
			</section> <!-- START SECTION LOCATION -->

			<section class="section-love"> <!-- START SECTION LOVE -->
				<div class="grid-wrapper">
					<div class="grid one-fifth hide--lap hide--palm">
						<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_heart.png" width="125" height="106" alt="Image of a heart">
					</div>
					<div class="grid four-fifths portable-one-whole">
						<h2 class="header-iwanttheweb">I want to make the web<br />look & feel</h2>
						<div class="awesome-sign">
							<img class="awesome-sign__shadow" src="<?php bloginfo('template_directory'); ?>/_/img/icon_awesome_shadow.png" alt="Shadow Of Awesome Sign">
							<img class="awesome-sign__awesome" src="<?php bloginfo('template_directory'); ?>/_/img/icon_awesome.png" alt="Icon Of Awesome Sign">
							<img class="awesome-sign__arrow" width="115" height="163" src="<?php bloginfo('template_directory'); ?>/_/img/icon_arrow.png" alt="Icon Of An Arrow">
							<div class="awesome-sign__devices">
								<img class="awesome-sign__device awesome-sign__devices-phone" width="56" height="157" src="<?php bloginfo('template_directory'); ?>/_/img/icon_device_phone.png" alt="Image of A Phone">
								<img class="awesome-sign__device awesome-sign__devices-tablet" width="66" height="168" src="<?php bloginfo('template_directory'); ?>/_/img/icon_device_tablet.png" alt="Image of A Phone">
								<img class="awesome-sign__device awesome-sign__devices-desktop" width="123" height="188" src="<?php bloginfo('template_directory'); ?>/_/img/icon_device_desktop.png" alt="Image of A Phone">
							</div>
						</div>
					</div>
				</div>
			</section> <!-- END SECTION LOVE -->

<?php get_footer(); ?>