<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 */

/*
$body_classes = implode( ' ', get_body_class() );
$elementor_data = get_post_meta( get_the_ID(), '_elementor_data', false );
$is_elementor_page = true;
if ( false === $elementor_data || ! is_array( $elementor_data ) ) {
  $is_elementor_page = false;
}
elseif ( count( $elementor_data ) > 0 && strlen( $elementor_data[0] ) < 9 ) {
  $is_elementor_page = false;
}

if ( isset( $_GET['elementor-preview'] ) ) {
  $is_elementor_page = true;
}
*/
$body_classes = implode( ' ', get_body_class() );
$is_elementor_page = false;

if ( strpos( $body_classes, 'elementor-page' ) > 0 ) {
  $is_elementor_page = true;
}

if ( isset( $_GET['elementor-preview'] ) ) {
  $is_elementor_page = true;
}


if ( $is_elementor_page ) :
	get_template_part( 'include/view/page/elementor' );

else :
  get_template_part( 'include/view/page/default' );

endif;
