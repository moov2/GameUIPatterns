<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section margin--bottom-huge padding--small padding--top-large">
				<div class="section__content">

					<?php
						$categories = get_the_category();

						if ( ! empty( $categories ) ) {
							echo '<p itemscope itemtype="http://schema.org/Article" itemref="_articleSection2 _articleSection3 _articleSection4 _articleBody5" class="padding--horizontal-none@desktop margin--bottom-small text--grey">';
							echo esc_html( $categories[0]->name );
							echo ' / </p>';
						}
					?>

					<span itemscope itemtype="http://schema.org/Article" itemref="_articleSection2 _articleSection3 _articleSection4">
						<h1 itemprop="name" class="padding--horizontal-none@desktop">
							<?php the_title(); ?>
						</h1>
						<!-- /post title -->

						<div id="_articleBody5" itemprop="articleBody" class="box box--description">

							<?php
							if(get_field('description'))
							{
								echo get_field('description');
							}; ?>

						</div>
					</span>

				</div>
			</section>

			<section class="section section--wide section--blueprint margin--bottom-huge">
				<div class="section__content">

					<?php
					if(get_field('blueprint_svg_code'))
					{
						echo get_field('blueprint_svg_code');
					}; ?>

				</div>
			</section>

			<section class="section section--wide padding--small margin--bottom-huge">
				<div class="section__content">

					<ul class="list list--double padding--horizontal-default">
						<li id="_articleSection2" itemprop="articleSection" class="list__item">

							<h2 class="text--large">When to use</h2>

							<?php if(get_field('when_to_use'))
							{
								echo get_field('when_to_use');
							}; ?>

						</li>
						<li id="_articleSection3" itemprop="articleSection" class="list__item">

							<h2 class="text--large">Solution</h2>

							<?php if(get_field('solution'))
							{
								echo get_field('solution');
							}; ?>

						</li>
					</ul>

				</div>
			</section>

			<?php

			$connected = new WP_Query( array(
			    'connected_type' => 'posts_to_pages',
			    'connected_items' => get_queried_object(),
			    'nopaging' => true,
			) );

			if ( $connected->have_posts() ) {
			?>

			<section class="section section--fill section--examples margin--bottom-huge">
				<div class="section__content">

					<?php get_template_part('partials/gameui', 'examples'); ?>

				</div>
			</section>

			<?php } ?>

			<section class="section padding--small margin--bottom-huge">
				<div id="_articleSection4" itemprop="articleSection" class="section__content">

					<h2>Technical Details</h2>

					<?php if(get_field('technical_details'))
					{
						echo get_field('technical_details');
					}

					?>

				</div>
			</section>

			<section class="section margin--bottom-huge padding--small">
				<div class="section__content">

				    <?php comments_template(); ?>

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

</main>

<?php get_footer(); ?>
