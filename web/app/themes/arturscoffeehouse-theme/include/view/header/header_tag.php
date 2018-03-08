<?php
$bg_img = get_theme_mod( 'page_bg_img', false );
$inverse = 'header-inverse';

if ( false == get_theme_mod( 'header_inverse_color', true ) ) {
	$inverse = '';
}

if ( false === $bg_img || empty( $bg_img ) ) {
	$bg_color = get_theme_mod( 'header_bg_color', '#c2b2cd' );
	?>
	<header class="header <?php echo $inverse; ?>" style="background-color: <?php esc_attr_e( $bg_color ); ?>">
	<?php
}
else {
	$overlay_color = get_theme_mod( 'page_overlay_color', '#191919' );
	$overlay_opacity = get_theme_mod( 'page_overlay_opacity', '7' );
	if ( '10' == $overlay_opacity ) {
	  $overlay_opacity = '1';
	}
	else {
	  $overlay_opacity = '0.'. $overlay_opacity;
	}
	?>
  <header class="header <?php echo $inverse; ?> bg-fixed pb-80" style="background-image: url(<?php echo esc_url( $bg_img ); ?>);">
    <div class="header-overlay" style="background-color: <?php esc_attr_e( $overlay_color ); ?>; opacity: <?php esc_attr_e( $overlay_opacity ); ?>;"></div>
	<?php
}

?>