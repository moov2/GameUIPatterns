<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">

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
