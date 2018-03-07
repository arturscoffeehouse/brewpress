<?php
/**
 * Template part for displaying single post.
 */

$permalink = esc_url( get_permalink() );
?>

<article class="section" id="section-content">
	<div class="container">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">

				<?php
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'thesaas' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );
				?>

				<div class="post-tags">
					<?php echo get_the_tag_list(); ?>
				</div>

				<?php if ( ! get_theme_mod( 'hide_post_share', true ) ): ?>
				<div class="social social-sm social-color-brand">
					<span class="mr-2 text-uppercase ls-1 fw-600 text-light fs-11">Share: </span>
          <a class="social-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>"><i class="fa fa-facebook"></i></a>
          <a class="social-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $permalink; ?>&text=<?php echo esc_attr( get_the_title() ); ?>"><i class="fa fa-twitter"></i></a>
          <a class="social-gplus" href="https://plus.google.com/share?url=<?php echo $permalink; ?>"><i class="fa fa-google-plus"></i></a>
        </div>
      	<?php endif; ?>


			</div>
		</div>

	</div>
</article>
