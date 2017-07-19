<?php get_header(); ?>

	<main role="main" id="main_content">
		<!-- section -->
		<section class="section padding--top-large">

			<div class="section__content">

				<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
