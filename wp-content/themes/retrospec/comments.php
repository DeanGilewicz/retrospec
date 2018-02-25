<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage retrospec
 * @since retrospec 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="dg_grid_container">

	<div id="comments" class="comments-area">

		<?php if ( have_comments() ) : ?>

			<span class="post_comments">
				<h6><?php comments_number(); ?></h6>
			</span>		

			<!--<h2 class="comments-title">
				<?php
					printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'retrospec' ),
						number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h2>-->

			<?php // retrospec_comment_nav(); ?>

			<ul class="comment_list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 32
					) );
				?>
			</ul><!-- .comment-list -->

			<?php // retrospec_comment_nav(); ?>

		<?php endif; // have_comments() ?>


		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'retrospec' ); ?></p>
		<?php endif; ?>



		<?php // comment_form(); ?>

		<?php

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields =  array(

			'author' =>
				'<p class="comment-form-author">
					<label for="author">Name<span>*</span></label>
					<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
				</p>',

			'email' =>
				'<p class="comment-form-email">
					<label for="email">Email<span>*</span></label>
					<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
				</p></div>'

			// 'url' =>
			// 	'<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
			// 	'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			// 	'" size="30" /></p>'
		);

		// Comment form for users to leave a comment
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment_reply_title">',
			'title_reply'        => 'leave a reply',
			'title_reply_after'  => '</h2>',
			'comment_field' 	 => '<p class="comment_form_comment">
										<label for="comment">Comment<span>*</span></label>
    									<textarea id="comment" name="comment" aria-required="true"></textarea>
    								</p>',
    		'comment_notes_after' => '<div class="respond-inputs">',
    		'class_submit' => 'button',
    		'label_submit' => 'Submit',
    		'fields' => apply_filters( 'comment_form_default_fields', $fields )
		) );
	?>

	</div>

</div><!-- .comments-area -->
