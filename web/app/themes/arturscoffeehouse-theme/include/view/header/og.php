
<?php

if ( is_single() ) {

	$og_image = get_the_post_thumbnail_url( null, 'thesaas-og-image' );
	$title = wp_strip_all_tags( esc_attr( get_the_title() ) );
	$description = wp_strip_all_tags( esc_attr( get_the_excerpt() ) );
	$description = substr($description, 0, 500);
	if ( ! empty( $og_image ) ) {
	?>
	<!--  Open Graph Tags -->
	<meta property="og:title" content="<?php echo $title ?>">
	<meta property="og:description" content="<?php echo $description; ?>">
	<meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
	<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<?php
	}

} elseif ( is_page() ) {
	$og_image = thesaas_get_the_meta( 'og_image' );
	$title = wp_strip_all_tags( esc_attr( thesaas_get_the_meta( 'og_title' ) ) );
	$description = wp_strip_all_tags( esc_attr( thesaas_get_the_meta( 'og_description' ) ) );
	$description = substr($description, 0, 500);
	if ( ! empty( $og_image ) ) {
	?>
	<!--  Open Graph Tags -->
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<?php echo $description; ?>">
	<meta property="og:image" content="<?php echo esc_url( $og_image['url'] ); ?>">
	<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<?php
	}
}

?>
