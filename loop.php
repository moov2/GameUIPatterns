<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- post title -->
	<h2>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h2>
	<!-- /post title -->

	<?php
	$meta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);

	if ($meta) {
		echo '<p>' . $meta . '</p>';
	}
	?>

<?php endwhile; ?>

<?php else: ?>

	<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

<?php endif; ?>
