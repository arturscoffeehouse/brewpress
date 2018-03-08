<?php
/**
 * Template part for displaying posts in grid style.
 */

?>

<section class="section bg-gray">
	<div class="container">

		<div class="row gap-y">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					?>
					<div class="col-12 col-md-6 col-lg-4">
						<div id="post-<?php the_ID(); ?>" <?php post_class('card card-hover-shadow'); ?>>

							<?php if ( '' !== get_the_post_thumbnail() ) : ?>
								<a href="<?php esc_url( the_permalink() ); ?>">
									<?php the_post_thumbnail( 'thesaas-featured-image', [ 'class' => 'card-img-top' ] ); ?>
								</a>
							<?php endif; ?>

							<div class="card-block">

								<?php if ( empty( get_the_title() ) ) : ?>
									<h4 class="card-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_date(); ?></a></h4>
								<?php else: ?>
									<h4 class="card-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
								<?php endif; ?>

								<?php
									if ( has_excerpt() ) {
										the_excerpt();
										echo '<p><a class="more-link" href="'. get_permalink( get_the_ID() ) .'"><span>'. esc_html__( 'Read more', 'thesaas' ) .' <i class="fa fa-chevron-right"></i></span></a></p>';
									}
									else {
										the_content( sprintf(
											'<span>'. esc_html__( 'Read more', 'thesaas' ) .' <i class="fa fa-chevron-right"></i></span>'
										) );

										wp_link_pages( array(
											'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'thesaas' ),
											'after'       => '</div>',
											'link_before' => '<span class="page-number">',
											'link_after'  => '</span>',
										) );
									}

								?>
							</div>
						</div>
					</div>
					<?php
				endwhile;

			else :

				if ( is_search() ) { ?>
					<div class="col-12">
						<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thesaas' ); ?></p><br>
					<?php get_search_form(); ?>
					</div>
					<?php
				}
				else {
					get_template_part( 'include/view/post/content', 'none' );
				}

			endif;
			?>

		</div>


		<nav class="flexbox mt-30">
			<div>
				<?php previous_posts_link( '<i class="ti-arrow-left fs-9 mr-4"></i> Newer' ); ?>
			</div>
			<div>
				<?php next_posts_link( 'Older <i class="ti-arrow-right fs-9 ml-4"></i>' ); ?>
			</div>
		</nav>

	</div>
</section>
