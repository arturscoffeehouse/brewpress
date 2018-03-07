<?php
/**
 * A file which is responsible for displaying blog posts.
 */

get_header();

$valid = array( 'grid', 'list', 'classic' );

if ( isset( $_GET['type'] ) && in_array( $_GET['type'], $valid ) ) {
  get_template_part( 'include/view/blog/blog', $_GET['type'] );
}
else {
  get_template_part( 'include/view/blog/blog', get_theme_mod( 'blog_list_style', 'grid' ) );
}

get_footer();
