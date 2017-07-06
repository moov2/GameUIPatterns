<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section  margin--bottom-default margin--bottom-huge@desktop padding--small padding--top-large">
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
						<h1 itemprop="name" class="padding--horizontal-none@desktop">
							<?php the_title(); ?>
						</h1>

						<div class="flex flex--justify-between flex--direction-column flex--direction-row@tablet flex--align-center@tablet">
							<?php get_template_part('partials/author', 'strap'); ?>
							<?php get_template_part('partials/social', 'share'); ?>
						</div>


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

			<section class="section section--wide section--blueprint margin--bottom-default margin--bottom-huge@desktop">
				<div class="section__content">

					<?php
					if(get_field('blueprint_svg_code'))
					{
						echo get_field('blueprint_svg_code');
					}; ?>

				</div>
			</section>

			<section class="section section--wide padding--small margin--bottom-default margin--bottom-huge@desktop">
				<div class="section__content">

					<ul class="list list--double padding--horizontal-default">
						<li id="_articleSection2" itemprop="articleSection" class="list__item">

							<h2 class="text--large">When to use</h2>

							<?php if(get_field('when_to_use'))
							{
								$field_name = "when_to_use";
								$field = get_field_object($field_name);
								$str = $field['value'];
								$str = str_replace('<ul', '<ul class="list list--bullets list--divided"', $str);
								$str = str_replace('<li', '<li class="list__item"', $str);

								echo $str;
							}; ?>

						</li>
						<li id="_articleSection3" itemprop="articleSection" class="list__item">

							<h2 class="text--large">Solution</h2>

							<?php if(get_field('solution'))
							{
								$field_name = "solution";
								$field = get_field_object($field_name);
								$str = $field['value'];
								$str = str_replace('<ul', '<ul class="list list--bullets list--divided"', $str);
								$str = str_replace('<li', '<li class="list__item"', $str);

								echo $str;
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

			<section class="section section--fill section--examples margin--bottom-default margin--bottom-huge@desktop">
				<div class="section__content">

					<?php get_template_part('partials/gameui', 'examples'); ?>

				</div>
			</section>

			<?php } ?>

			<section class="section padding--small margin--bottom-default margin--bottom-huge@desktop">
				<div id="_articleSection4" itemprop="articleSection" class="section__content">

					<h2>Technical Details</h2>

					<?php if(get_field('technical_details'))
					{
						echo get_field('technical_details');
					}

					?>

				</div>
			</section>

			<section class="section margin--bottom-default margin--bottom-huge@desktop padding--small">
				<div class="section__content">

				    <?php comments_template(); ?>

				</div>
			</section>

			<?php $post_link_text = 'Edit ' . get_the_title() . ' Page'; ?>

			<?php edit_post_link( __( $post_link_text, 'textdomain' ), '', '', null, 'link link--float' ); ?>

		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>

	<?php endif; ?>

</main>

<?php get_footer(); ?>
