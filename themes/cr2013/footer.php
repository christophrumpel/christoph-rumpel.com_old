	</div>
	<footer class="main-footer">
		<div class="wrapper">
			<div class="grid-wrapper main-footer">
				<div class="grid one-third palm-one-whole main-footer__left">© 2013 Christoph Rumpel</div>
				<div class="grid one-third palm-one-whole main-footer__middle">
					Built with <a target="_blank" href="http://wordpress.org/">Wordpress</a>, <a target="_blank" href="http://inuitcss.com/">inuitcss</a> and <a target="_blank" href="http://en.wikipedia.org/wiki/Love">love</a>
				</div>
				<div class="grid one-third palm-one-whole main-footer__right">
					<nav>
						<ul class="nav footer-nav">
							<li class="footer-nav__twitter"><a href="https://twitter.com/christophrumpel" target="_blank">Twitter</a></li>
							<!-- <li class="footer-nav__github"><a href="#">Github</a></li> -->
							<li class="footer-nav__codepen"><a href="http://codepen.io/christophrumpel" target="_blank">Codepen</a></li>
							<li class="footer-nav__treehouse"><a href="http://teamtreehouse.com/christophrumpel" target="_blank">Treehouse</a></li>
							<!-- <li class="footer-nav__rss"><a href="#">RSS</a></li> -->
						</ul>
					</nav>
				</div>
			</div> <!-- END OF FOOTER GRID WRAPPER -->
		</div>
	</footer>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script> 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27343938-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</body>

</html>
