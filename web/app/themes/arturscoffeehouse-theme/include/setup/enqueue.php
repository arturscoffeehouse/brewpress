<?php


/*
Register Fonts
*/
function thesaas_fonts_url() {
  $font_url = '';
  $font_body = get_theme_mod( 'custom_font_body', 'Open Sans' );
  $font_title = get_theme_mod( 'custom_font_title', 'Dosis' );

  if ( empty( $font_body ) ) {
    $font_body = 'Open Sans';
  }

  if ( empty( $font_title ) ) {
    $font_title = 'Dosis';
  }

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Google font: on or off', 'thesaas' ) ) {
    $font_url = add_query_arg( 'family', urlencode( $font_body .':300,400,600,800|'. $font_title .':300,600' ), "//fonts.googleapis.com/css" );
  }
  return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function thesaas_scripts() {

  $my_theme = wp_get_theme();
  $version = $my_theme->get( 'Version' );

  // Google fonts
  wp_enqueue_style( 'thesaas-fonts', thesaas_fonts_url(), array(), $version );

  // Theme stylesheet.
  wp_enqueue_style( 'thesaas-core', get_theme_file_uri( '/assets/css/core.min.css' ), array(), $version );

  if ( class_exists( "\Elementor\PageSettings\Manager" ) ) {
    wp_enqueue_style( 'thesaas-page', get_theme_file_uri( '/assets/css/page.min.css' ), array( 'thesaas-core', 'elementor-frontend' ), $version );
  }
  else {
    wp_enqueue_style( 'thesaas-page', get_theme_file_uri( '/assets/css/page.min.css' ), array( 'thesaas-core' ), $version );
  }

  // Custom style
  if ( file_exists( get_template_directory() . '/assets/css/custom.css' ) ) {
    //wp_enqueue_style( 'thesaas-custom', get_theme_file_uri( '/assets/css/custom.css' ), array( 'thesaas-page' ), $version );

    $file = get_template_directory() . '/assets/css/custom.css';
    $custom_css = file_get_contents( $file, FILE_USE_INCLUDE_PATH );
    wp_add_inline_style( 'thesaas-page', $custom_css );
  }


  // Theme script.
  $googleApiKey_escaped = esc_js( get_theme_mod( 'google_api_key', 'AIzaSyDRBLFOTTh2NFM93HpUA4ZrA99yKnCAsto' ) );
  $googleAnalyticsId_escaped = esc_js( get_theme_mod( 'google_analytics_id' ) );

  wp_enqueue_script( 'thesaas-script', get_theme_file_uri( '/assets/js/page.min.js' ), array( 'jquery' ), $version, true );

  $inline_script = "page.config({ googleApiKey: '". $googleApiKey_escaped ."', googleAnalyticsId: '". $googleAnalyticsId_escaped ."', contactFormAction: '". admin_url('admin-ajax.php') ."' });";
  $inline_script .= get_theme_mod( 'additional_script' );
  wp_add_inline_script( 'thesaas-script', "$(function() { ". $inline_script ." });" );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

add_action( 'wp_enqueue_scripts', 'thesaas_scripts' );



 
if ( ! function_exists( 'thesaas_backend_scripts' ) ){
  function thesaas_backend_scripts( $hook ) {
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker');
  }
}
add_action( 'admin_enqueue_scripts', 'thesaas_backend_scripts');

