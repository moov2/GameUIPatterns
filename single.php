<?php get_header(); ?>

	<main role="main" id="main_content">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section margin--bottom-huge padding--small padding--top-large">
				<div class="section__content">

					<?php
						$categories = get_the_category();

						if ( ! empty( $categories ) ) {
							echo '<p itemscope itemtype="http://schema.org/Article" itemref="_articleSection2 _articleSection3 _articleSection4 _articleBody5" class="padding--horizontal-none@desktop margin--bottom-small text--grey-dark">';
							echo '<a class="margin--bottom-small text--grey-dark" href="/">Homepage</a> / ';
							echo '<a class="margin--bottom-small text--grey-dark" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							echo ' / </p>';
						}
					?>

					<span itemscope itemtype="http://schema.org/Article" itemref="_articleSection2 _articleSection3 _articleSection4">

						<?php if( get_field('show_title') == 'yes' ): ?>
							<h1 itemprop="name" class="padding--horizontal-none@desktop"><?php the_title(); ?></h1>
						<?php endif; ?>

						<div class="flex flex--justify-between flex--direction-column flex--direction-row@tablet flex--align-center@tablet">
							<?php get_template_part('partials/author', 'strap'); ?>
							<?php get_template_part('partials/social', 'share'); ?>
						</div>

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<div title="<?php the_title(); ?>" class="margin--bottom-default">
								<?php the_post_thumbnail('wrapper'); // Fullsize image for the single post ?>
							</div>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<?php the_content(); // Dynamic Content ?>

					</span>

				</div>
			</section>

			<?php $post_link_text = 'Edit Post'; ?>

			<?php edit_post_link( __( $post_link_text, 'textdomain' ), '', '', null, 'link link--float' ); ?>

			<!-- REMOVE COMMENTS TO ENABLE RELATED ITEMS
			<section class="section section--wide padding--small margin--bottom-default">
				<div class="section__content">
					<?php get_template_part('partials/related', 'random'); ?>
				</div>
			</section>
			-->

		</article>

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
