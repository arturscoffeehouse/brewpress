<?php
/**
 * Template part for displaying posts in grid style.
 */

?>

<div class="row">
  <div class="col-12 col-lg-6 offset-lg-3">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('mt-90'); ?>>
          <header class="text-center mb-40">
            <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
          </header>

          <a href="<?php esc_url( the_permalink() ); ?>">
          	<?php the_post_thumbnail( 'thesaas-featured-image', [ 'class' => 'rounded' ] ); ?>
          </a>

          <div class="card-block">

						<?php
	            $content = '';
	            if ( has_excerpt() ) {
	              $content = get_the_excerpt();
	            }
	            else {
	              $extended = get_extended( get_post_field( 'post_content' ) );
	              $content = $extended['main'];
	            }
	            echo wpautop($content);
	            echo '<p class="text-center mt-40"><a class="more-link btn btn-primary btn-round" href="'. get_permalink( get_the_ID() ) .'">'. esc_html__( 'Read more', 'thesaas' ) .'</a></p>';

						?>
            
          </div>
        </article>

				<?php if (($wp_query->current_post +1) != ($wp_query->post_count)) {
				  echo '<hr>';
				} ?>
        

				<?php
			endwhile;

		else :

			if ( is_search() ) { ?>
				<div class="card mb-30">
					<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thesaas' ); ?></p><br>
				<?php get_search_form(); ?>
				</div>
				<?php
			}
			else {

				get_template_part( 'include/view/post/none' );
			}

		endif;
		?>


		<nav class="flexbox mt-30">
			<div>
				<?php previous_posts_link( '<i class="ti-arrow-left fs-9 mr-4"></i> Newer' ); ?>
			</div>
			<div>
				<?php next_posts_link( 'Older <i class="ti-arrow-right fs-9 ml-4"></i>' ); ?>
			</div>
		</nav>

	</div>
</div>
