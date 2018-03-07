<?php


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function thesaas_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_html__( 'Continue reading', 'thesaas' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'thesaas_excerpt_more' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function thesaas_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'thesaas_pingback_header' );


/**
 * Move textarea to the end of form.
 */
function thesaas_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'thesaas_move_comment_field_to_bottom' );


/**
 * Limit max menu depth in admin panel to 2
 */
function thesaas_menu_depth_limit( $hook ) {
	if ( $hook != 'nav-menus.php' ) return;

	// override default value right after 'nav-menu' JS
	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 2;', 'after' );
}
add_action( 'admin_enqueue_scripts', 'thesaas_menu_depth_limit' );


/**
 * Adds custom classes to the array of body classes.
 */
function thesaas_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'thesaas-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'thesaas-front-page';
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Add extra classes from Elementor option if the use has specified any
	if ( is_page() ) {
		$classes[] = sanitize_html_class( thesaas_get_the_meta( 'page_body_class' ) );
	}

	// Add extra classes if expert user is enabled for Elementor
	if ( 'yes' == get_option( 'elementor_expert_user', '' ) ) {
		$classes[] = 'elementor-expert-user';
	}

	return $classes;
}
add_filter( 'body_class', 'thesaas_body_classes' );



/**
 * Adds custom styles to TinyMCE
 */

// Add TinyMCE style formats.
add_filter( 'mce_buttons_2', 'thesaas_tiny_mce_style_formats' );

function thesaas_tiny_mce_style_formats( $styles ) {
	array_unshift( $styles, 'styleselect' );
	return $styles;
}


function thesaas_tiny_mce_before_init( $settings ) {

	$style_formats = array(
			array(
					'title' => 'Lead Paragraph',
					'selector' => 'p',
					'classes' => 'lead',
					'wrapper' => true
					),
			array(
					'title' => 'Small',
					'inline' => 'small'
			),
			array(
					'title' => 'Blockquote',
					'block' => 'blockquote',
					'classes' => 'blockquote',
					'wrapper' => true
			),
			array(
					'title' => 'Blockquote Footer',
					'block' => 'footer',
					'classes' => 'blockquote-footer',
					'wrapper' => true
			)
	);

		if ( isset( $settings['style_formats'] ) ) {
			$orig_style_formats = json_decode( $settings['style_formats'], true );
			$style_formats = array_merge( $orig_style_formats, $style_formats );
		}

		$settings['style_formats'] = json_encode( $style_formats );
		return $settings;
}
add_filter( 'tiny_mce_before_init', 'thesaas_tiny_mce_before_init' );


/**
 * Fore comments to be open for pages. Required by Themeforest.
 */
function thesaas_open_comments_for_page( $status, $post_type, $comment_type ) {
		if ( 'page' !== $post_type ) {
				return $status;
		}

		return 'open'; // open or closed
}
add_filter( 'get_default_comment_status', 'thesaas_open_comments_for_page', 10, 3 );
