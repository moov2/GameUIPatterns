<?php get_header(); ?>

	<main role="main" id="main_content">
		<!-- section -->
		<section>

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php

			$args = array('post_type'=>array('posts', 'gameui'));

		    query_posts($args);

			?>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
