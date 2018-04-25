<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container_main_content">

				<section class="error-404">

					<header class="page-header">
						<h1 class="page-title"><?php _e( 'You must be lost! Nothing here to see here.', 'retrospec' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						
						<div class="container__not__found__content">
							<!-- <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'retrospec' ); ?></p> -->
							<p>Maybe try a search?</p>
						</div>

						<?php // get_search_form(); ?>

						<?php get_template_part( 'content', 'custom-search-form' ); ?>

					</div><!-- .page-content -->

				</section><!-- .error-404 -->

			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
