<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container_post">
		
		<header class="entry-header">

			<div class="post_date">
				<span><?php the_time('j'); ?></span>
				<span><?php the_time('F'); ?></span>
				<span><?php the_time('Y'); ?></span>
				<?php if( get_post_meta($post->ID, 'Read Time', true) ) : ?>
					<p><?php echo '<i class="genericon genericon-time"></i>' . get_post_meta($post->ID, 'Read Time', true); ?></p>
				<?php endif; ?>
			</div>

			<?php if( get_field('vehicle') ): ?>
    			<h2><?php the_field('vehicle'); ?></h2>
			<?php endif; ?>

			<?php if( get_field('owner') ): ?>
    			<h2><?php the_field('owner'); ?></h2>
			<?php endif; ?>

			<?php if( get_field('location') ): ?>
    			<h2><?php the_field('location'); ?></h2>
			<?php endif; ?>

			<div class="container_post_meta">
				
				<div class="post_title">
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
				</div>

				<div class="post_author">
					<span>Written by <span><?php the_author(); ?></span></span>
				</div>

			</div>
			
		</header><!-- .entry-header -->

		<div class="post_feature_img">
			<?php // the_post_thumbnail(); ?>
			<?php $src_small  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );?>
			<?php $src_medium_up = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large' );?>
			<div class="container_bg_img small">
				<div class="bg_img" style="background-image: url('<? echo $src_small[0]; ?>')"></div>
			</div>
			<div class="container_bg_img medium_up">
				<div class="bg_img" style="background-image: url('<? echo $src_medium_up[0]; ?>')"></div>
			</div>
		</div>

		<div class="entry-content">

			<?php
				/* translators: %s: Name of current post */
				// the_content( sprintf(
				// 	__( 'Continue reading %s', 'retrospec' ),
				// 	the_title( '<span class="screen-reader-text">', '</span>', false )
				// ) );
				// the_excerpt();
				the_content();

				// wp_link_pages( array(
				// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'retrospec' ) . '</span>',
				// 	'after'       => '</div>',
				// 	'link_before' => '<span>',
				// 	'link_after'  => '</span>',
				// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'retrospec' ) . ' </span>%',
				// 	'separator'   => '<span class="screen-reader-text">, </span>',
				// ) );
			?>

			<!-- <a href="<?php the_permalink(); ?>" class="button">Read more</a> -->

			<?php if( have_rows('images') ): ?>

				<?php $imageNum = 0; ?>

				<div class="owl-carousel" id="js-owl-carousel-ff">

					<?php while( have_rows('images') ): the_row(); 
						// variables
						$imageNum++;
						$image = get_sub_field('image');
					?>

						<?php if( $imageNum <= 4 ) : ?>
							<div class="slide-<?= $imageNum; ?>">
								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt'] ?>" />
							</div>
						<?php else: ?>
							<div class="slide-<?= $imageNum; ?>">
								<img class="owl-lazy" data-src="<?php echo $image['sizes']['thumbnail']; ?>" data-src-retina="<?php echo $image['sizes']['thumbnail']; ?>" alt="">
							</div>
						<?php endif; ?>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>			

		</div><!-- .entry-content -->

		<footer class="entry-footer table">

			<div class="post_type table_cell">
				<i class="genericon genericon-pinned"></i>
			</div>

			<div class="container_cats_comments table_cell">
				
				<span class="post_cats">
					<?php foreach ( get_the_category() as $cat ) : ?>
						<?php 
							$category_name  = $cat->cat_name;
							$category_link  = get_category_link( $cat->cat_ID );
						?>
						<div class="cat_link">
							<i class="genericon genericon-category"></i>
							<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr( $category_name ); ?>"><?php echo esc_html( $category_name ); ?></a>
						</div>
					<?php endforeach; ?>
				</span>

				<span class="post_comments">
					<i class="genericon genericon-comment"></i>
					<a href="<?php echo get_comments_link( $post->ID ); ?>"><?php comments_number(); ?></a>
				</span>

			</div>

			<!-- <?php edit_post_link( __( 'Edit', 'retrospec' ), '<span class="edit-link">', '</span>' ); ?> -->
		
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
