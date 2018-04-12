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
	$argsAllPosts = array(
		'post_type' => array('post'),
		'category__not_in' => '344',
		'tag__not_in' => '2',
		'posts_per_page' => '3',
		'orderby' => 'date'
	);
	$the_query_all_posts = new WP_Query( $argsAllPosts );
	// end all latest posts section
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

			<div class="slide-<?= $postNum; ?> <?= ($postNum == 1) ? 'active' : ''; ?>" style="background-image: url('http://via.placeholder.com/350x150?text=logo');">

				<div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a class="button mobile-slider" href="<?php the_permalink(); ?>">go</a>
				</div>

			</div>

		<?php endwhile; ?>

	</div>

	<?php wp_reset_postdata(); ?>

<?php else : ?>

	no featured posts here!

<? endif; ?>

<!-- end slider -->

<!-- begin all latest posts (except chosen as home post) -->

<section class="block-1">

	<?php if ( $the_query_all_posts->have_posts() ) : ?>

		<?php $counter = 0; ?>

		<?php while ( $the_query_all_posts->have_posts() ) : $the_query_all_posts->the_post(); ?>
			
			<?php 
				$postType = get_post_type_object(get_post_type());
			?>

			<?php if ($counter % 2 === 0) : ?>

				<article class="row home-post ltr">
					<div class="medium-7 medium-push-5 columns">
						<div class="post-meta">
							<span class="post-meta-category">
								<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
							</span>
							<span class="post-meta-date"><?php echo get_the_date('M j, Y'); ?></span>
							<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
						</div>
						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<div class="medium-5 medium-pull-7 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large'); ?>
						</a>
					</div>
				</article>

			<?php else: ?>

				<article class="row home-post rtl">
					<div class="medium-7 columns">
						<div class="post-meta">
							<!-- <span class="post-meta-comments"><?php comments_number( '0', '1', '%' ); ?></span> -->
							<span class="post-meta-date"><?php echo get_the_date('M j, Y'); ?></span>
							<span class="post-meta-category">
								<a href="/<?= strtolower(str_replace(" ", "-", $postType->labels->name)); ?>"><?= $postType->labels->name; ?></a>
							</span>
						</div>
						<a href="<?php the_permalink(); ?>" class="post-title"><h2><?php the_title(); ?></h2></a>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<div class="medium-5 columns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large'); ?>
						</a>
					</div>
				</article>

			<?php endif; ?>

			<?php $counter++; ?>

		<?php endwhile; ?>
		
	<?php else: ?>

		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->

		<article class="row home-post ltr">
			<div class="medium-7 medium-push-5 columns">
				<div class="post-meta">
					<span class="post-meta-category">
						<a href="/">category name</a>
					</span>
					<span class="post-meta-date"><?= date('M j, Y'); ?></span>
				</div>
				<a href="/" class="post-title"><h2>post title</h2></a>
				<div class="post-excerpt">
					<p>The post excerpt goes here</p>
				</div>
				<a href="/" class="read-more">Read More</a>
			</div>
			<div class="medium-5 medium-pull-7 columns">
				<a href="/">
					<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-icon.png" alt="destinations on a dash logo" />
				</a>
			</div>
		</article>

		<article class="row home-post rtl">
			<div class="medium-7 columns">
				<div class="post-meta">
					<span class="post-meta-date"><?= date('M j, Y'); ?></span>
					<span class="post-meta-category">
						<a href="/">category name</a>
					</span>
				</div>
				<a href="/" class="post-title"><h2>post title</h2></a>
				<div class="post-excerpt">
					<p>The post excerpt goes here</p>
				</div>
				<a href="/" class="read-more">Read More</a>
			</div>
			<div class="medium-5 columns">
				<a href="/">
					<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-icon.png" alt="destinations on a dash logo" />
				</a>
			</div>
		</article>

		<article class="row home-post ltr">
			<div class="medium-7 medium-push-5 columns">
				<div class="post-meta">
					<span class="post-meta-category">
						<a href="/">category name</a>
					</span>
					<span class="post-meta-date"><?= date('M j, Y'); ?></span>
				</div>
				<a href="/" class="post-title"><h2>post title</h2></a>
				<div class="post-excerpt">
					<p>The post excerpt goes here</p>
				</div>
				<a href="/" class="read-more">Read More</a>
			</div>
			<div class="medium-5 medium-pull-7 columns">
				<a href="/">
					<img src="<?= get_stylesheet_directory_uri(); ?>/dist/icons/logo/DOD-icon.png" alt="destinations on a dash logo" />
				</a>
			</div>
		</article>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</section>

<!-- end all latest posts -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
