<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<section class="section bg-gray bt-1">
	<h6 class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'thesaas' ); ?></h6><br>
	<?php get_search_form(); ?>
</section>

<?php get_footer();
