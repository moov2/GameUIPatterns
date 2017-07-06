<?php get_header(); ?>

<main role="main">
	<section class="section section--wide padding--small padding--top-large">
		<div class="section__content">
			<h1><?php single_cat_title(); ?></h1>

			<div class="column-container column-container--grow column-size--4">
				<?php get_template_part('loop'); ?>
			</div>
		</div>
	</section>

	<?php get_template_part('pagination'); ?>
</main>

<?php get_footer(); ?>
