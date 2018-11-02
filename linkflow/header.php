<?php

/**
 * The Header template for our theme
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="keywords" content="linkflow,发掘,培育,连接客户,数字营销,销售,营销,转化,转化优化"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<script src="https://static.linkflowtech.com/linkflow.min.js?token=OS0xMjBmNDIwOS02OGUwLTRhNDgtODhkNi1kMTFkMjFkYjk1ZjE%3D&baseDomain=https://app.linkflowtech.com"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/global_brain.js" type="text/javascript"></script>
<?php wp_head(); ?>
<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/swiper-3.3.1.min.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper-3.3.1.min.js"></script> -->
<link rel="stylesheet" id="font-awesome-css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" media="all">
</head>

<body <?php body_class(); ?>>
<!-- #mobile-navigation -->
<div id="topFloatBar">
	<div id="topFloatBar_r"><a href="###"></a></div>
	<a href="/" id="topFloatBar_m"></a>
	<?php 
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(array( 'theme_location' => 'primary','container_id'=>'mobileMenu') ); 
	} ?>
</div>
<!-- #mobile-navigation end-->

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<div id="top-info">
				<a id="top-apply" href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button3"><?php _e( "申请试用", 'linkflow' ); ?></a>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</hgroup>
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		<?php endif; ?>
	</header><!-- #masthead -->