<?php

/**
 * Create custom style files if required
 */



// Generate darken color
//
function thesaas_sass_darken($hex, $percent) {
  preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
  str_replace('%', '', $percent);
  $color = "#";
  for($i = 1; $i <= 3; $i++) {
    $primary_colors[$i] = hexdec($primary_colors[$i]);
    $primary_colors[$i] = round($primary_colors[$i] * (100-($percent*2))/100);
    $color .= str_pad(dechex($primary_colors[$i]), 2, '0', STR_PAD_LEFT);
  }
  if ( strlen($color) > 7 ) {
    //$color = substr($color, 0, 7);
  }
  return $color;
}


// Generate lighten color
//
function thesaas_sass_lighten($hex, $percent) {
  preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
  str_replace('%', '', $percent);
  $color = "#";
  for($i = 1; $i <= 3; $i++) {
    $primary_colors[$i] = hexdec($primary_colors[$i]);
    $primary_colors[$i] = round($primary_colors[$i] * (100+($percent*2))/100);
    $color .= str_pad(dechex($primary_colors[$i]), 2, '0', STR_PAD_LEFT);
  }
  if ( strlen($color) > 7 ) {
    //$color = substr($color, 0, 7);
  }
  return $color;
}


// Convert hexdec color string to rgb(a) string
//
function thesaas_sass_rgba($color, $opacity = false) {
 
  $default = 'rgb(0,0,0)';
 
  //Return default if no color provided
  if(empty($color))
    return $default; 
 
  //Sanitize $color if "#" is provided 
  if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
  }

  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
  } elseif ( strlen( $color ) == 3 ) {
    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
  } else {
    return $default;
  }

  //Convert hexadec to rgb
  $rgb =  array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
  if($opacity){
    if(abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
  } else {
    $output = 'rgb('.implode(",",$rgb).')';
  }

  //Return rgb(a) color string
  return $output;
}


function thesaas_adjustBrightness($hex, $steps) {
  // Steps should be between -255 and 255. Negative = darker, positive = lighter
  $steps = max(-255, min(255, $steps));

  // Normalize into a six character long hex string
  $hex = str_replace('#', '', $hex);
  if (strlen($hex) == 3) {
      $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
  }

  // Split into three parts: R, G and B
  $color_parts = str_split($hex, 2);
  $return = '#';

  foreach ($color_parts as $color) {
      $color   = hexdec($color); // Convert to decimal
      $color   = max(0,min(255,$color + $steps)); // Adjust color
      $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
  }

  return $return;
}

$file = get_template_directory() . '/assets/css/custom.css';

$font_body  = get_theme_mod( 'custom_font_body', 'Open Sans' );
$font_title = get_theme_mod( 'custom_font_title', 'Dosis' );

$color_primary = get_theme_mod( 'custom_color_primary', '#0facf3' );


if ( $font_body == 'Open Sans' && $font_title == 'Dosis' && $color_primary == '#0facf3' ) {
  file_put_contents( $file, '', FILE_USE_INCLUDE_PATH );
  return;
}


// CSS codes to change font family
//
$css_fonts = <<<CSS
body, button, input, optgroup, select, textarea,
h6, .h6,
.heading-alt,
.typed-cursor,
.accordion .card-title,
.font-body,
.font-opensans {
  font-family: "FONT_BODY", sans-serif;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
.font-title,
.font-raleway {
  font-family: "FONT_TITLE", sans-serif;
}
CSS;

if ( empty( $font_body ) ) {
  $font_body = 'Open Sans';
}

if ( empty( $font_title ) ) {
  $font_title = 'Dosis';
}

$css_fonts = str_replace( "FONT_BODY", $font_body, $css_fonts );
$css_fonts = str_replace( "FONT_TITLE", $font_title, $css_fonts );



// CSS codes to change primary color
//
$fn_darken  = 'thesaas_sass_darken';
$fn_lighten = 'thesaas_sass_lighten';
$fn_light = 'thesaas_adjustBrightness';
$fn_rgba = 'thesaas_sass_rgba';
$css_colors = <<<CSS


a, a:hover, a:focus,
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
.h1 a:hover, .h2 a:hover, .h3 a:hover, .h4 a:hover, .h5 a:hover, .h6 a:hover,
[data-typed].text-primary + .typed-cursor,
.btn-link:hover, .btn-link:focus,
.nav-link:hover, .menu-item a:hover, .nav-link:focus, .menu-item a:focus, .nav-link.active, .menu-item a.active,
.nav-primary .nav-link:not(.disabled):hover, .nav-primary .menu-item a:not(.disabled):hover, .menu-item .nav-primary a:not(.disabled):hover, .nav-primary .nav-link:not(.disabled):focus, .nav-primary .menu-item a:not(.disabled):focus, .menu-item .nav-primary a:not(.disabled):focus,
.custom-checkbox .custom-control-indicator::after,
.nav-submenu .nav-link.active, .nav-submenu .menu-item a.active, .menu-item .nav-submenu a.active {
  color: $color_primary;
}

.social-hover-primary a:hover,
.text-primary,
a.text-primary:hover, a.text-primary:focus,
.hover-primary:hover, .hover-primary:focus {
  color: $color_primary !important;
}

.badge-primary,
.scroll-top,
.custom-radio .custom-control-indicator::after,
.portfolio-1::before,
.bg-primary,
[data-overlay-primary]::before {
  background-color: $color_primary;
}

.border-primary {
  border-color: $color_primary;
}

pre {
  border-left-color: $color_primary;
}

.btn-primary, .comment-form .submit, .post-password-form input[type="submit"], .btn-primary:hover, .comment-form .submit:hover, .post-password-form input[type="submit"]:hover,
.btn-primary.disabled, .comment-form .disabled.submit, .post-password-form input.disabled[type="submit"], .btn-primary:disabled, .comment-form .submit:disabled, .post-password-form input[type="submit"]:disabled,
.btn-primary-outline:hover,
.btn-outline.btn-primary:hover, .comment-form .btn-outline.submit:hover, .post-password-form input.btn-outline[type="submit"]:hover,
.wpcf7-submit, .wpcf7-submit:hover,
.wpcf7-submit.disabled, .wpcf7-submit:disabled {
  background-color: $color_primary;
  border-color: $color_primary;
}

.btn-primary-outline,
.btn-outline.btn-primary, .comment-form .btn-outline.submit, .post-password-form input.btn-outline[type="submit"] {
  color: $color_primary;
  border-color: $color_primary;
}


@media (max-width: 1199px) {
  .topbar-expand-lg .topbar-nav .nav-link.active, .topbar-expand-lg .topbar-nav .menu-item a.active, .menu-item .topbar-expand-lg .topbar-nav a.active,
  .topbar-expand-lg .nav-link.active, .topbar-expand-lg .menu-item a.active, .menu-item .topbar-expand-lg a.active {
    color: $color_primary;
  }
}


@media (max-width: 991px) {
  .topbar-expand-md .topbar-nav .nav-link.active, .topbar-expand-md .topbar-nav .menu-item a.active, .menu-item .topbar-expand-md .topbar-nav a.active,
  .topbar-expand-md .nav-link.active, .topbar-expand-md .menu-item a.active, .menu-item .topbar-expand-md a.active {
    color: $color_primary;
  }
}


@media (max-width: 767px) {
  .topbar-expand-sm .topbar-nav .nav-link.active, .topbar-expand-sm .topbar-nav .menu-item a.active, .menu-item .topbar-expand-sm .topbar-nav a.active,
  .topbar-expand-sm .nav-link.active, .topbar-expand-sm .menu-item a.active, .menu-item .topbar-expand-sm a.active {
    color: $color_primary;
  }
}

@media (max-width: 575px) {
  .topbar-expand-xs .topbar-nav .nav-link.active, .topbar-expand-xs .topbar-nav .menu-item a.active, .menu-item .topbar-expand-xs .topbar-nav a.active,
  .topbar-expand-xs .nav-link.active, .topbar-expand-xs .menu-item a.active, .menu-item .topbar-expand-xs a.active {
    color: $color_primary;
  }
}

::selection {
  background: {$fn_light($color_primary, 30)};
}
::-moz-selection {
  background: {$fn_light($color_primary, 30)};
}

.form-control:focus,
.post-password-form input[type="password"]:focus,
.wpcf7-text:focus,
.wpcf7-date:focus,
.wpcf7-quiz:focus,
.wpcf7-number:focus,
.wpcf7-select:focus,
.wpcf7-textarea:focus {
  border-color: {$fn_light($color_primary, 50)};
}

.scroll-top {
  box-shadow: 0 3px 15px {$fn_rgba($color_primary, 0.4)};
}

.body-scrolled .scroll-top:hover,
.body-scrolled .scroll-top:focus {
  box-shadow: 0 3px 20px {$fn_rgba($color_primary, 0.6)};
}

.btn-primary:hover,
.wpcf7-submit:hover {
  box-shadow: 0 2px 10px {$fn_rgba($color_primary, 0.4)};
}

.btn-primary:active,
.btn-primary.active,
.show > .btn-primary.dropdown-toggle,
.btn-outline.btn-primary:active,
.btn-outline.btn-primary.active,
.show > .btn-outline.btn-primary.dropdown-toggle,
.wpcf7-submit:active,
.wpcf7-submit.active,
.show > .wpcf7-submit.dropdown-toggle, {
  background-color: {$fn_light($color_primary, -30)};
  border-color: {$fn_light($color_primary, -30)};
}

CSS;


file_put_contents($file, $css_fonts . $css_colors, FILE_USE_INCLUDE_PATH);
