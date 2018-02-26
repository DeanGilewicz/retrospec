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
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Mono|Rubik:900" />
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

			<div id="page" class="hfeed site"><!-- page wrapper -->
		
				<!-- <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'retrospec' ); ?></a> -->
				
				<div class="global__menu">

					<nav>

						<!-- <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="container_search_input">
								<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'retrospec' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'retrospec' ); ?>" />
								<button type="submit" class="search-submit button">
									Go
								</button>
							</div>
						</form> -->

						<ul>
							<li class="<?php if( is_home() ) { echo 'current-cat'; } ?>">
				                <a href="/">home</a>
				            </li>
							<li class="<?php if( is_page('about-me') ) { echo 'current-cat'; } ?>">
				                <a href="/about-me" class="">about me</a>
				            </li>
				            <li class="<?php if( is_page('featured-fridays') ) { echo 'current-cat'; } ?>">
				                <a href="/featured-fridays" class="">featured fridays</a>
				            </li>
				            <li class="<?php if( is_page('events') ) { echo 'current-cat'; } ?>">
				                <a href="/events" class="">events</a>
				            </li>
				            <li class="<?php if( is_page('events') ) { echo 'current-cat'; } ?>">
				                <a href="/events" class="">events</a>
				            </li>
				            <li class="<?php if( is_page('shop') ) { echo 'current-cat'; } ?>">
				                <a href="/shop" class="">shop</a>
				            </li>
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
