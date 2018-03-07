<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 */

$body_classes = implode( ' ', get_body_class() );

if ( false === strpos( $body_classes, 'elementor-page' ) ) :

	get_template_part( 'include/view/page/default' );

else :

	get_template_part( 'include/view/page/elementor' );

endif;
