<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section class="section padding--top-large">

		<div class="section__content">

			<h1><?php single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
