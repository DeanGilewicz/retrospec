<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container_main_content" role="main">

			<?php
				// if( function_exists('custom_breadcrumbs') ) {
				// 	custom_breadcrumbs();
				// }
			?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				// get_template_part( 'content', get_post_format() );

				// override and get custom single content

				if( get_post_type() === 'feature_friday' ) {
					get_template_part( 'content', 'feature-friday' );
				} else {
					get_template_part( 'content', 'single' );
				}

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

				// Previous/next post navigation.
				// the_post_navigation( array(
				// 	'prev_text'          => '&lt; Prev',
				// 	'next_text'          => 'Next &gt;',
				// 	'in_same_term'       => false,
				// 	'excluded_terms'     => '',
				// 	'taxonomy'           => 'category',
				// 	'screen_reader_text' => 'Post Navigation'
				// ) );
				?>
				
				<?php //if( show_page_nav() ) : ?>
					<nav class="post__navigation">
						<?php previous_post_link( '%link', '&lt; Prev' ); ?> 
						<!-- link to all posts -->
						<a href="/category/articles" class="button button--link">See All</a>
						<?php next_post_link( '%link', 'Next &gt;' ); ?>
					</nav>
				<?php //endif; ?>

			<?php
			// End the loop.
			endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
