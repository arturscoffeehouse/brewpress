<?php
/**
 * The template for displaying search results pages
 */

get_header();

if ( have_posts() ):
	get_template_part( 'include/view/search/result' );
else:
	?>
		<section class="section">
			<div class="container">
				<h6 class="text-center"><?php esc_html_e( 'Haven\'t found what you need? Try with another keyword.', 'thesaas' ); ?></h6><br>
				<?php get_search_form(); ?>
			</div>
		</section>
	<?php
endif;

get_footer();
