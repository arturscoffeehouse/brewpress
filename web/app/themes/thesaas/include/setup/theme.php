<?php


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thesaas_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/thesaas
	 * If you're building a theme based on TheSaaS, use a find and replace
	 * to change 'thesaas' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'thesaas' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'thesaas-featured-image', 800, 600, true );
	add_image_size( 'thesaas-og-image', 1200, 630, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 800;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'topbar'    => esc_html__( 'Topbar Menu', 'thesaas' ),
		'footer' => esc_html__( 'Primary Footer Menu', 'thesaas' ),
		'footer-secondary' => esc_html__( 'Secondary Footer Menu', 'thesaas' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Declare WooCommerce support.
	add_theme_support( 'woocommerce' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	//add_theme_support( 'wc-product-gallery-lightbox' );
	//add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	 */
	$editor_style = [ 'assets/css/editor.min.css' ];
  if ( file_exists( get_template_directory() . '/assets/css/custom.css' ) ) {
    $editor_style[] = 'assets/css/custom.css';
  }
	add_editor_style( $editor_style );


	// Define and register starter content to showcase the theme on new sites.
	add_theme_support( 'starter-content', thesaas_starter_content() );
}
add_action( 'after_setup_theme', 'thesaas_setup' );


/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function thesaas_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'thesaas_front_page_template' );


/**
 * Starter content
 */
function thesaas_starter_content() {

	// Make it a fresh install, so the starter content will import.
	// ---
	// Depricated, since it might cause to duplicate menu creation
	//update_option( 'fresh_site', 1 );

	$starter_content = array(

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Default logo and customizer options.
		'theme_mods' => array(
			'logo_default' => get_theme_file_uri( 'assets/img/logo.png' ),
			'logo_light' => get_theme_file_uri( 'assets/img/logo-light.png' ),

			// Social icons
			'social_facebook' => 'https://www.facebook.com/thethemeio/',
			'social_twitter' => 'https://twitter.com/thethemeio',
			'social_instagram' => 'https://www.instagram.com/thethemeio/',
		),

	);

	return $starter_content;
}

