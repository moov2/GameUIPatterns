<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<aside>

			<header class="header padding--default" role="banner">

					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img class="logo__icon margin--bottom-small" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
							<p class="logo__text"><?php printf( get_bloginfo ( 'name' ) ); ?></p>
						</a>
					</div>

					<label for="hamburger">Menu</label>
					<input name="hamburger" type="checkbox" id="hamburger" class="display--hidden"></input>
					<nav class="nav" role="navigation">
						<?php gameui_nav(); ?>
						<p class="copyright">
							&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
						</p>
					</nav>

			</header>

		</aside>
