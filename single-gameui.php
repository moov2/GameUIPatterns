<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h3><?php the_category(); ?> /</h3>

				<!-- post title -->
				<h1>
					<?php the_title(); ?>
				</h1>
				<!-- /post title -->

				<h2>Description</h2>

				<?php
				if(get_field('description'))
				{
					echo get_field('description');
				}

				the_post_thumbnail();

				echo "<h2>When to use</h2>";

				if(get_field('when_to_use'))
				{
					echo get_field('when_to_use');
				}

				echo "<h2>Solution</h2>";

				if(get_field('solution'))
				{
					echo get_field('solution');
				}

				get_template_part('partials/gameui', 'examples');

				echo "<h2>Technical Details</h2>";

				if(get_field('technical_details'))
				{
					echo get_field('technical_details');
				}

				comments_template();

				?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
