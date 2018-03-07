
<?php

if ( is_page() ) {

	$js = thesaas_get_the_meta( 'page_custom_js' );
	if ( ! empty( $js ) ) {
	?>
	<!-- Custom JS code from page builder -->
	<script>
    <?php echo $js; ?>
  </script>
	<?php
	}

}

?>
