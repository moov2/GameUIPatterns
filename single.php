<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section margin--bottom-huge padding--top-large">
				<div class="section__content">

					<h1>
						<?php the_title(); ?>
					</h1>

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<div title="<?php the_title(); ?>" class="margin--bottom-default">
							<?php the_post_thumbnail('wrapper'); // Fullsize image for the single post ?>
						</div>
					<?php endif; ?>
					<!-- /post thumbnail -->

					<?php the_content(); // Dynamic Content ?>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
				</div>
			</section>
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
