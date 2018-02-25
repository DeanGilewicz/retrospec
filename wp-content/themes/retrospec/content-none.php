<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage retrospec
 * @since 1.0
 * @version 1.0
 */

// args

$args = array(
	'posts_per_page' => 3
);

// the query
$lastest_posts_query = new WP_Query( $args );

?>

<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title search_term"><?php printf( __( 'Nothing found for: %s', 'retrospec' ), get_search_query() ); ?></h1>
	</header>

	<!-- <header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'retrospec' ); ?></h1>
	</header> -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'retrospec' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<!-- <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'retrospec' ); ?></p> -->
			
			<div class="container_not_found_content">
				<p>It seems we can't find what you're looking for. Check out the latest posts or try a different search.</p>
			</div>

			<?php 

				// get_search_form(); 

				if ( $lastest_posts_query->have_posts() ) :

					// Start the loop.
					while ( $lastest_posts_query->have_posts() ) : $lastest_posts_query->the_post();

						/*
						 * Run the loop to output the latest 3 posts results.
						 * If you want to overload this in a child theme then include a file
						 * called content-none.php and that will be used instead.
						 */
						get_template_part( 'content' );

					// End the loop.
					endwhile;

					wp_reset_postdata();

				endif;

			?>

			<?php get_template_part( 'content', 'custom-search-form' ); ?>

		<?php endif; ?>
	</div><!-- .page-content -->

</section><!-- .no-results -->