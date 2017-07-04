<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section margin--bottom-huge padding--small padding--top-large">
				<div class="section__content">

					<?php
					// Find connected pages
					$connected = new WP_Query( array(
					  'connected_type' => 'posts_to_pages',
					  'connected_items' => get_queried_object(),
					  'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected->have_posts() ) :
					?>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
						<?php
							$categories = get_the_category();

							if ( ! empty( $categories ) ) {
								echo '<p itemscope itemtype="http://schema.org/Article" itemref="_articleSection2 _articleSection3 _articleSection4 _articleBody5" class="padding--horizontal-none@desktop margin--bottom-small text--grey-dark">';
								echo esc_html( $categories[0]->name );
								echo ' / ';
								echo '<a class="text--grey-dark" href="';
								echo the_permalink();;
								echo '">';
								echo the_title();
								echo '</a></p>';
							}
						?>
					<?php endwhile; ?>
					<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;
					?>


					<h1 itemprop="name" class="padding--horizontal-none@desktop">
						<?php the_title(); ?>
					</h1>
					<?php the_post_thumbnail(); ?>
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

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

</main>

<?php get_footer(); ?>
