<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="section padding--default padding--top-large">

			<div class="section__content">
				<h1>404</h1>
				<h2 class="text--grey-dark">We couldn't find this page.</h2>

				<p>Maybe there isn't a page for that pattern yet? You can submit your own pattern using <a href="/submit">this page</a>.</p>

				<p>You can always checkout our latest patterns at <a href="/">our homepage</a>.</p>

				<?php get_template_part('partials/gameui', 'three'); ?>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
