<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Mono|Rubik:900" />
		<?php if( is_home() || get_post_type() === 'feature_friday' ): ?>
			<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/owl.carousel.min.css" />
			<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri(); ?>/dist/css/vendor/owl.theme.default.min.css" />
		<?php endif; ?>
		<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri(); ?>/dist/css/main.min.css" />
		<!-- <link rel="profile" href="http://gmpg.org/xfn/11"> -->
		<!-- <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>

		<script>
			// google analytics here
		</script>
	</head>

	<body <?php body_class(); ?>>

		<div class="site__wrapper"><!-- .site__wrapper -->

			<!-- <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'retrospec' ); ?></a> -->
				
			<div class="global__header">

				<div class="container__top__banner">

					<div class="social">
						<a href="#" class="social__icon">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/icons/logo-facebook.svg" alt="facebook logo" />
						</a>
						<a href="#" class="social__icon">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/icons/logo-instagram.svg" alt="instagram logo" />
						</a>
						<a href="#" class="social__icon">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/icons/logo-twitter.svg" alt="twitter logo" />
						</a>
					</div>

					<form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" class="form__input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'retrospec' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'retrospec' ); ?>" />
						<input type="submit" class="form__submit" value="" />
					</form>

				</div>

				<div class="logo__main">
					<a href="/">
						<img srcset="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-320.jpg 320w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-480.jpg 480w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-640.jpg 640w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-768.jpg 768w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-1024.jpg 1024w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-1280.jpg 1280w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-1440.jpg 1440w,
								<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-1920.jpg 1920w"
							 src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/logos/logo-640.jpg"
							 alt="Restrospec Logo" />
					</a>
				</div>

				<nav class="nav__main">
					<ul class="nav__mobile">
						<li class="nav__label">Menu</li>
						<li class="nav__trigger">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/icons/icon-menu.svg" alt="menu icon">
						</li>
					</ul>
					<ul class="nav__items">
						<li class="mobile__close"></li>
						<li class="<?php if( is_home() ) { echo 'current-cat'; } ?>">
			                <a href="/">home</a>
			            </li>
						<li class="<?php if( is_page('about-retrospec') ) { echo 'current-cat'; } ?>">
			                <a href="/about-retrospec" class="">about</a>
			            </li>
			            <li class="<?php if( get_post_type() === 'feature_friday' ) { echo 'current-cat'; } ?>">
			                <a href="/feature-fridays" class="">feature fridays</a>
			            </li>
			            <li class="<?php if( $_SERVER['REQUEST_URI'] === '/events/' ) { echo 'current-cat'; } ?>">
			                <a href="/events" class="">events</a>
			            </li>
			            <!-- <li class="<?php if( is_page('shop') ) { echo 'current-cat'; } ?>">
			                <a href="/shop" class="">shop</a>
			            </li> -->
			            
						<?php 
							// wp_list_categories( array(
							// 	'orderby' => 'name',
							// 	'title_li' => '',
							// 	'hide_title_if_empty' => true
							// ) );
						?>
					</ul>

			    </nav>

			</div>

			<!-- <div id="sidebar" class="sidebar"> -->
				<?php // get_sidebar(); ?>
			<!-- </div> -->

			<div id="page" class="hfeed site page__wrapper"><!-- page wrapper -->

				<div class="scroll__arrow">
					<img src="<?= get_stylesheet_directory_uri(); ?>/dist/imgs/icons/icon-arrow.svg" alt="arrow icon" />
				</div>
