<?php 
	// THIS IS THE TEMPLATE FOR FRONT PAGE
	
	// begin set up hero img slider feature
	$argsSlider = array(
		'posts_per_page' => '-1',
		'tag' => 'featured'
	);
	$the_query_slider = new WP_Query( $argsSlider );
	// end set up
	
	// begin all latest posts section (not in featured tag)
	// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	// $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	// $argsAllPosts = array(
	// 	'post_type' => array('post'),
	// 	// 'category__not_in' => '344',
	// 	'tag__not_in' => '2',
	// 	'posts_per_page' => '6',
	// 	'orderby' => 'date',
	// 	// 'paged' => $paged
	// );
	// $the_query_all_posts = new WP_Query( $argsAllPosts );
	// echo '<pre>';
	// print_r($the_query_all_posts);
	// exit;
	// end all latest posts section

	// Pagination fix - use the_query_all_posts instead of original WP query
	// $temp_query = $wp_query;
	// $wp_query   = NULL;
	// $wp_query   = $the_query_all_posts;	
?>

<?php get_header(); ?>

<!-- begin slider -->

<?php if ( $the_query_slider->have_posts() ) : ?>

	<?php $postNum = 0; ?>

	<div class="owl-carousel" id="js-owl-carousel">

		<?php while ( $the_query_slider->have_posts() ) : $the_query_slider->the_post(); ?>

			<?php 
				$postNum++;
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
				$url = $thumb['0'];
			?>

			<div class="slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>" style="background-image: url('http://via.placeholder.com/350x150?text=bgImg');">

				<div class="slider__content">
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a class="button" href="<?php the_permalink(); ?>">See It</a>
				</div>

			</div>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	</div>

<?php else : ?>

	<!-- DEFAULT RETROSPEC -->
	<div class="slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>" style="background-image: url('http://via.placeholder.com/350x150?text=logo');">

		<div>
			<h2><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
			<a class="button" href="<?php the_permalink(); ?>">See It</a>
		</div>

	</div>

<? endif; ?>

<!-- end slider -->

<!-- begin all latest posts (except chosen as home post) -->

<section class="container__posts">
	
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php $postType = get_post_type_object(get_post_type()); ?>

			<article class="home__post">

				<!-- <div class="post__metadata"> -->
					<!-- <span class="post__category"> -->
						<!-- <a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a> -->
					<!-- </span> -->
					<div class="post__date"><?php echo get_the_date('M j, Y'); ?></div>
					<!-- <a href="<?php the_permalink(); ?>" class="post__title"> -->
					<h2 class="post__title"><?php the_title(); ?></h2>
					<!-- </a> -->
					<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
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
				<!-- </div> -->
				
			</article>

		<?php endwhile; ?>

		<!--  Previous/next post nav link navigation -->
		<nav class="all__post__navigation">
		    <?php previous_posts_link('Newer Articles') ?>
		    <?php next_posts_link('Older Articles') ?>
		</nav>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>

		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->

	<?php endif; ?>

	<?php 
		// Pagination fix - reset WP query
		// $wp_query = NULL;
		// $wp_query = $temp_query;
	?>

</section>

<!-- end all latest posts -->
<!-- <pre><?php var_dump( $wp_query->posts ); ?></pre> -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
