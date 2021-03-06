<?php get_header(); ?>

	<main role="main" id="main_content">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- section -->
				<section class="section padding--default padding--top-large">
					<div class="section__content">

						<?php if( get_field('show_title') == 'yes' ): ?>
							<h1><?php the_title(); ?></h1>
						<?php endif; ?>

						<?php the_content(); ?>

					</div>
				</section>

				<?php $post_link_text = 'Edit ' . get_the_title() . ' Page'; ?>

				<?php edit_post_link( __( $post_link_text, 'textdomain' ), '', '', null, 'link link--float' ); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
