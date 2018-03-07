<?php

/**
 * Checks to see if we're on the homepage or not.
 */
function thesaas_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Get logo image with fallback.
 */
function thesaas_get_logo( $logo_type = 'default', $class = null ) {
	$blog_name_safe = esc_attr( get_bloginfo( 'name', 'display' ) );
	$img       = get_theme_mod( 'logo_default' );

	if ( 'light' == $logo_type ) {
		$img = get_theme_mod( 'logo_light' );
	}
	elseif ( 'footer' == $logo_type ) {
		$footer_img = get_theme_mod( 'logo_footer' );

		if ( $footer_img ) {
			$img = $footer_img;
		}
	}

	if ( $img ) {

		if ( $class ) {
			$class = ' class="'. esc_attr( $class ) .'"';
		}

		return '<img src="'. esc_url( $img ) .'" alt="'. $blog_name_safe .'"'. $class .'>';
	}
	else {
		return '<span class="brand-title '. esc_attr( $class ) .'">'. $blog_name_safe .'</span>';
	}

}


/**
 * A shorthand function to get an image uri from /assets/img/ directory.
 */
function thesaas_get_img_uri( $path ) {
	return get_theme_file_uri( '/assets/img/'. $path );
}


/**
 * Return post meta value with default value.
 */
function thesaas_get_the_meta( $key, $default = '' ) {
	global $post;

	if ( empty( $post ) ) {
		return $default;
	}

	$id = $post->ID;
	$value = null;

	if ( class_exists( "\Elementor\PageSettings\Manager" ) ) {
		$page = \Elementor\PageSettings\Manager::get_page( $id );
		$value = $page->get_settings( $key );

		if ( null == $value ) {
			$page->set_settings( $key, $default );
		}
	}


	if ( null !== $value ) {
		$default = $value;
	}

	return $default;
}


/**
 * Print post meta value with default value.
 */
function thesaas_the_meta( $key, $default = '' ) {
	echo thesaas_get_the_meta( $key, $default );
}

/**
 * Create href and data-scrollto if required
 */
function thesaas_get_btn_link_attr( $link ) {

	if ( '#' == $link ) {
		return 'href="#"';
	}

	if ( ! empty( $link ) ) {
		if ( 0 === strpos( $link, '#' ) ) {
			return 'href="#" data-scrollto="'. esc_attr( substr( $link, 1 ) ) .'"';
		}
		else {
			return 'href="'. esc_url( $link ) .'"';
		}
	}

	return 'href="#"';

}


/**
 * Get blog posts page URL.
 *
 * @return string The blog posts page URL.
 */
function thesaas_get_blog_posts_page_url() {

	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	}

	// The front page IS the posts page. Get its URL.
	return get_home_url();
}




function thesaas_remove_http($url) {
  $disallowed = array('http://', 'https://');
  foreach($disallowed as $d) {
    if(strpos($url, $d) === 0) {
      return str_replace($d, '', $url);
    }
  }
  return $url;
}

