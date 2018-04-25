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
?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">Articles</h1>
			</header>

			<?php if ( have_posts() ) : ?>

				<!-- <header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header> --><!-- .page-header -->

				<div class="container__posts">

					<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						// get_template_part( 'content', get_post_format() );
					?>
						<article class="article__post">
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

					<?php
					// End the loop.
					endwhile; ?>

				</div>

				<?php if( show_page_nav() ) : ?>
					<!--  Previous/next post nav link navigation -->
					<nav class="all__articles__navigation">
					    <?php previous_posts_link('Newer Articles') ?>
					    <?php next_posts_link('Older Articles') ?>
					</nav>
					<!-- <nav class="container_page_nav">
						<div class="pagination_loop">
							<?php 
								// Previous/next page navigation. 
								the_posts_pagination( array(
									'prev_text' => __( 'Prev', 'retrospec' ),
									'next_text' => __( 'Next', 'retrospec' )
								) );
							?>
						</div>
					</nav> -->
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
