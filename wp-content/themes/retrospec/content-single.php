<?php
/**
 * An specfic template for displaying single post content
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container__post">

		<div class="post__feature__img">
			<?php // the_post_thumbnail(); ?>
			<?php // $src_small  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );?>
			<?php // $src_medium_up = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large' );?>
			<!-- <div class="container_bg_img small">
				<div class="bg_img" style="background-image: url('<? echo $src_small[0]; ?>')"></div>
			</div>
			<div class="container_bg_img medium_up">
				<div class="bg_img" style="background-image: url('<? echo $src_medium_up[0]; ?>')"></div>
			</div> -->
		</div>
		
		<header class="entry-header">

			<!-- <div class="container_post_meta"> -->

			<div class="post__title">
				<?php
					the_title( '<h1 class="entry-title">', '</h1>' );
					// if ( is_single() ) :
					// 	the_title( '<h1 class="entry-title">', '</h1>' );
					// else :
					// 	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					// endif;
				?>
			</div>

				<!-- <div class="post_author">
					<span>Written by <span><?php the_author(); ?></span></span>
				</div> -->

			<!-- </div> -->

			<div class="post__date">
				<span><?php the_time('j'); ?></span>
				<span><?php the_time('F'); ?></span>
				<span><?php the_time('Y'); ?></span>
				<?php // if( get_post_meta($post->ID, 'Read Time', true) ) : ?>
					<!-- <p><?php echo '<i class="genericon genericon-time"></i>' . get_post_meta($post->ID, 'Read Time', true); ?></p> -->
				<?php // endif; ?>
			</div>
			
		</header><!-- .entry-header -->

		<div class="entry-content">

			<!-- <div class="table"> -->

				<!-- <div class="post_type table_cell">
					<i class="genericon genericon-pinned"></i>
				</div> -->

				<!-- <div class="container_cats_comments table_cell">

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

				</div> -->

			<!-- </div> -->

			<?php
				/* translators: %s: Name of current post */
				// the_content( sprintf(
				// 	__( 'Continue reading %s', 'retrospec' ),
				// 	the_title( '<span class="screen-reader-text">', '</span>', false )
				// ) );
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

		</div><!-- .entry-content -->

		<footer class="entry-footer container__social">
			<?php
				// Get current page URL 
				$retrospecURL = urlencode( get_permalink() );
		 
				// Get current page title
				$retrospecTitle = str_replace( ' ', '%20', get_the_title() );
						 
				// Construct sharing URL without using any script
				$twitterURL  = 'https://twitter.com/intent/tweet?text='.$retrospecTitle.'&amp;url='.$retrospecURL.'&amp;via=retrospec';
				$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$retrospecURL;
				$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$retrospecURL.'&amp;title='.$retrospecTitle;
		 		 
				// Create sharing buttons
				$socialLinks  = '';
				$socialLinks .= '<div class="post__social">';
				$socialLinks .= '<h3>share on</h3>';
				$socialLinks .= '<a class="button retrospec__twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
				$socialLinks .= '<a class="button retrospec__facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
				$socialLinks .= '<a class="button retrospec__linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
				$socialLinks .= '</div>';
				
				// Display in template
				echo $socialLinks; 
			?>

			<!-- <?php edit_post_link( __( 'Edit', 'retrospec' ), '<span class="edit-link">', '</span>' ); ?> -->
		
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
