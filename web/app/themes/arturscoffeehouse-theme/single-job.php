<?php
/**
 * The template for displaying all single posts
 */

while ( have_posts() ) : the_post();
	get_header();

	get_template_part( 'include/view/post/job' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
