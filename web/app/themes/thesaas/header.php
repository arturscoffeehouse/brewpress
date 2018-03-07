<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php get_template_part( 'include/view/header/custom_css' ); ?>
<?php get_template_part( 'include/view/header/og' ); ?>
</head>

<body <?php body_class(); ?>>

	<?php
    if ( ! is_page_template( 'page-no-header.php' ) ) {
      get_template_part( 'include/view/header/topbar' );
    }
  ?>

	<!-- Header -->
	<?php
  if ( is_single() ) :

    if ( 'portfolio' == get_post_type() ) {
  		get_template_part( 'include/view/header/portfolio' );
  	}
  	elseif ( 'job' == get_post_type() ) {
  		get_template_part( 'include/view/header/job' );
  	}
    elseif ( 'product' == get_post_type() ) {
      get_template_part( 'include/view/header/page' );
    }
  	else {
  		get_template_part( 'include/view/header/post' );
  	}


  elseif ( is_archive() ):
    if ( 'product' == get_post_type() ) {
      get_template_part( 'include/view/header/shop' );
    }
    else {
      get_template_part( 'include/view/header/archive' );
    }
    

  elseif ( is_search() ):
    get_template_part( 'include/view/header/search' );

  elseif ( is_404() ):
    get_template_part( 'include/view/header/404' );

  elseif ( is_page() ):
    get_template_part( 'include/view/header/page' );

  else:
    get_template_part( 'include/view/header/blog' );

  endif;
  ?>
	<!-- END Header -->

	<!-- Main container -->
	<main class="main-content">
