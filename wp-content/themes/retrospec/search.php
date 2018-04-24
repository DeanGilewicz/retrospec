<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */

	$sidebarPostsArgs = array(
		'posts_per_page' => '6',
		'orderby' => 'date'
	);
	$the_sidebar_posts = new WP_Query( $sidebarPostsArgs );

	$args = array(
		'posts_per_page' => 3
	);

	// the query
	$lastest_posts_query = new WP_Query( $args );

?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title search_term"><?php printf( __( 'You Searched For: <span>%s</span>', 'retrospec' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<div class="custom__cols">
			
				<div class="col__left">

					<?php if ( have_posts() ) : ?>

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
							<!--  Previous/next post nav link navigation -->
							<nav class="post__search__navigation">
							    <?php previous_posts_link('Newer Articles') ?>
							    <?php next_posts_link('Older Articles') ?>
							</nav>

							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

						<?php // get_template_part( 'content', 'custom-search-form' ); ?>

					<?php

					// If no content, include the "No posts found" template.
					else : 
						// get_template_part( 'content', 'none' );
					?>
						<div class="container__not__found">
							<p>Oh no - we couldn't match your search. Here's a few posts to jump start your search or you can search again yourself!</p>
							<?php // get_template_part( 'content', 'custom-search-form' ); ?>
						</div>

						<?php if ( $lastest_posts_query->have_posts() ) :

							// Start the loop.
							while ( $lastest_posts_query->have_posts() ) : $lastest_posts_query->the_post(); ?>

								<div class="container__search__post" style="max-width: 640px;">
		
									<header class="post__header">

										<div class="post__date">
											<span><?php the_time('j'); ?></span>
											<span><?php the_time('F'); ?></span>
											<span><?php the_time('Y'); ?></span>
										</div>

										<div class="container__post__meta">
											
											<div class="post__title">
												<h2><?php the_title(); ?></h2>
											</div>

											<!-- <div class="post_author">
												<span>Written by <span><?php the_author(); ?></span></span>
											</div> -->

										</div>
										
									</header><!-- .entry-header -->

									<div class="post__feature__img">
										<?php the_post_thumbnail('medium'); ?>
										<?php // $src_small  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );?>
										<?php // $src_medium_up = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large' );?>
										<!-- <div class="container_bg_img small">
											<div class="bg_img" style="background-image: url('<? echo $src_small[0]; ?>')"></div>
										</div>
										<div class="container_bg_img medium_up">
											<div class="bg_img" style="background-image: url('<? echo $src_medium_up[0]; ?>')"></div>
										</div> -->
									</div>

									<div class="entry-content">

										<?php
											/* translators: %s: Name of current post */
											// the_content( sprintf(
											// 	__( 'Continue reading %s', 'retrospec' ),
											// 	the_title( '<span class="screen-reader-text">', '</span>', false )
											// ) );
											the_excerpt();

											// wp_link_pages( array(
											// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'retrospec' ) . '</span>',
											// 	'after'       => '</div>',
											// 	'link_before' => '<span>',
											// 	'link_after'  => '</span>',
											// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'retrospec' ) . ' </span>%',
											// 	'separator'   => '<span class="screen-reader-text">, </span>',
											// ) );
										?>

										<a href="<?php the_permalink(); ?>" class="button post__read__more">Show Me</a>

									</div><!-- .entry-content -->

								</div>

							<?php 
							// End the loop.
							endwhile;

							wp_reset_postdata();

						endif;

					endif;
					?>

				</div>

				<?php if ( have_posts() ) : ?>
					<aside class="col__right">

						<h2>Latest Posts</h2>
						
						<?php if ( have_posts() ) : ?>

							<?php
							// Start the loop.
							while ( $the_sidebar_posts->have_posts() ) : $the_sidebar_posts->the_post(); ?>
								<div class="latest__post">
									<h4><?php echo get_the_date(); ?></h4>
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="post__link">See It</a>
								</div>
							<?php
							// End the loop.
							endwhile; ?>

						<?php

						// If no content, include the "No posts found" template.
						else :
							// get_template_part( 'content', 'none' );
						endif;
						?>
					</aside>

				<?php endif; ?>

			</div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
