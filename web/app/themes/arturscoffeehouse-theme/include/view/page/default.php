<?php
/**
 * Template part for displaying single post.
 */


while ( have_posts() ) : the_post();

	get_header();
	?>
	<section class="section">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>
	<?php

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.

get_footer();
