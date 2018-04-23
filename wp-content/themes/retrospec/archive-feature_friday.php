<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */

	// begin all latest feature friday posts - custom limit
	// $argsFfPosts = array(
	// 	'post_type' => array('feature_friday'),
	// 	// 'category__not_in' => '344',
	// 	// 'tag__not_in' => '2',
	// 	'posts_per_page' => '6',
	// 	'orderby' => 'date',
	// 	'paged' => get_query_var( 'paged' )
	// );
	// $the_query_ff_posts = new WP_Query( $argsFfPosts );
	// end all latest posts section

?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">Feature Fridays</h1>
				<?php
					// the_archive_title( '<h1 class="page-title">', '</h1>' );
					// the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php if ( have_posts() ) : ?>

				<div class="container__posts">

					<?php while ( have_posts() ) : the_post(); ?>

						<article class="ff__post">
							<div class="post__date"><?php echo get_the_date('M j, Y'); ?></div>
							<h2 class="post__title"><?php the_title(); ?></h2>
							<div class="post__image">
								<a href="<?php the_permalink(); ?>">
									<?php // the_post_thumbnail('large'); ?>
									<img src="http://via.placeholder.com/350x150?text=img" alt="" />
								</a>
							</div>
							<div class="post__excerpt">
								<?php the_excerpt(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="button post__read__more">See It</a>
						</article>

					<?php endwhile; ?>

				</div>

				<?php if( show_page_nav() ) : ?>
					<!--  Previous/next post nav link navigation -->
					<nav class="all__feature__friday__navigation">
					    <?php previous_posts_link('Newer Feature Fridays') ?>
					    <?php next_posts_link('Older Feature Fridays') ?>
					</nav>
					<!-- <nav class="container_page_nav"> -->
						<!-- <div class="pagination_loop"> -->
							<?php 
								// Previous/next page navigation. 
								// the_posts_pagination( array(
								// 	'prev_text' => __( 'Prev', 'retrospec' ),
								// 	'next_text' => __( 'Next', 'retrospec' )
								// ) );
							?>
						<!-- </div> -->
					<!-- </nav> -->
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

				<?php // get_template_part( 'content', 'custom-search-form' ); ?>

			<?php
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
			endif;
			?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
