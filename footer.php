
		<?php wp_footer(); ?>

		<footer role="contentinfo" class="footer padding--small text-align--center">
			<div>
				<?php get_template_part('partials/copyright'); ?>
			</div>
			<nav class="margin--top-default">
				<?php get_template_part('partials/social', 'follow'); ?>
			</nav>
		</footer>

		<!-- W3TC-include-js-head -->


		<?php if(get_field('custom_javascript')) { ?>
			<script>
				<?php the_field('custom_javascript'); ?>
			</script>
		<?php } ?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-101506196-1', 'auto');
			ga('send', 'pageview');
		</script>

	</body>
</html>
