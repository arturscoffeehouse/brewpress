
<?php

if ( is_page() ) {

	$css = wp_strip_all_tags( thesaas_get_the_meta( 'page_custom_css' ) );
	if ( ! empty( $css ) ) {
	?>
	<!-- Custom CSS code from page builder -->
	<style type="text/css"><?php echo $css; ?></style>
	<?php
	}

}

?>
