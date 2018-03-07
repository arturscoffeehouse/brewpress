<?php

$body_classes = implode( ' ', get_body_class() );
$background_color = get_theme_mod( 'header_bg_color', '#c2b2cd' );
$background_color = thesaas_get_the_meta( 'header_bg_color', $background_color );

/**
 * Using get_page_template()
 */

if ( false === strpos( $body_classes, 'elementor-page' ) || false !== strpos( $body_classes, 'page-template-page-elementor-header' ) ) :

	?>
	<?php get_template_part( 'include/view/header/header_tag' ); ?>
		<div class="container text-center">

			<div class="row">
				<div class="col-12 col-lg-8 offset-lg-2">

					<h1><?php the_title(); ?></h1>
					<p class="fs-20 opacity-70"><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></p>

				</div>
			</div>

		</div>
	</header>
	<?php

else :



endif;
