<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title search_term"><?php printf( __( 'Search Results for: %s', 'retrospec' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<?php
					/*
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );

				// End the loop.
				endwhile; ?>

				<?php if( show_page_nav() ) : ?>
					<nav class="container_page_nav">
						<div class="pagination_loop">
							<?php 
								// Previous/next page navigation. 
								the_posts_pagination( array(
									'prev_text' => __( 'Prev', 'retrospec' ),
									'next_text' => __( 'Next', 'retrospec' )
								) );
							?>
						</div>
					</nav>
				<?php endif; ?>

				<?php get_template_part( 'content', 'custom-search-form' ); ?>

			<?php

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
