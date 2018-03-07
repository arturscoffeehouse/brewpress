<?php
/**
 * The template for displaying comments.
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

<div class="section comments-area bt-1 bg-grey" id="comments">
	<div class="container">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">


				<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) : ?>

					<ol class="comment-list">
						<?php
							wp_list_comments( array(
								'avatar_size' => 48,
								'style'       => 'ol',
								'reply_text'  => esc_html__( 'Reply', 'thesaas' ),
							) );
						?>
					</ol>

					<?php the_comments_pagination( array(
						'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'thesaas' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'thesaas' ) . '</span>',
					) );

					echo '<hr>';

				endif; // Check for have_comments().

				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'thesaas' ); ?></p>
				<?php
				endif;

				$comments_args = array(
					'label_submit' => esc_html__( 'Send', 'thesaas' ),
					'class_submit' => 'btn btn-primary btn-block',
					'fields' => apply_filters( 'comment_form_default_fields', array(

						'author' =>
							'<div class="form-group"><input id="author" name="author" class="form-control" type="text" placeholder="' . esc_html__( 'Name', 'thesaas' ) . ' *"></div>',

						'email' =>
							'<div class="form-group"><input id="email" name="email" class="form-control" type="text" placeholder="' . esc_html__( 'Email', 'thesaas' ) . ' *"></div>',

						'url' =>
							'<div class="form-group"><input id="url" name="url" class="form-control" type="text" placeholder="' . esc_html__( 'Website', 'thesaas' ) . '"></div>'
						)
					),

					'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" aria-required="true" class="form-control" placeholder="' . esc_html__( 'Comment', 'thesaas' ) . ' *" rows="5"></textarea></div>',

				);

				comment_form( $comments_args );
				?>

			</div>
		</div>

	</div>
</div>
