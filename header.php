<!doctype html>
<html>
	<head>
		<title><?php wp_title(' | ', true, 'right'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="Cache-Control" content="no-transform" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link id="favicon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" rel="icon" type="image/x-icon" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
		<?php wp_head(); ?>
	</head>
	<body>
		<header id="topheader">
			<div id="top_menu">
				<?php wp_nav_menu( array( 'theme_location' => 'top_menu' )); ?>
				<?php get_search_form( true ); ?>
			</div>
			<hgroup>
				<!-- <h1><a href = "<?php bloginfo("url")?>"><?php bloginfo('name'); ?></a>
				</h1>
				<h2><?php bloginfo("description")?></h2> -->
			</hgroup>
			
			
		</header>
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'main_menu' )); ?>
		</nav>