<?php


if ( ! function_exists( 'thesaas_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function thesaas_edit_link() {

	$link = edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit', 'thesaas' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	return $link;
}
endif;



if ( ! function_exists( 'thesaas_posted_on' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function thesaas_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// Don't show updated time for now
	/*
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	*/

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	return '<a class="text-white" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
}
endif;




if ( ! function_exists( 'thesaas_topbar_buttons' ) ) :

function thesaas_topbar_buttons() {

	$output = '';

	$btn1_text = thesaas_get_the_meta( 'topbar_btn_1_text' );
	$btn2_text = thesaas_get_the_meta( 'topbar_btn_2_text' );

	if ( ! empty( $btn1_text ) || ! empty( $btn2_text ) ) {
		$output .= '<div class="d-inline-flex ml-40">';

		if ( ! empty( $btn1_text ) ) {
			$link_safe = thesaas_get_btn_link_attr( thesaas_get_the_meta( 'topbar_btn_1_link' ) );
			$outline_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_1_outline' ) );
			$color_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_1_color', 'white' ) );
			$classes_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_1_class' ) );
			$output .= '<a class="btn btn-sm '. $outline_safe .' btn-'. $color_safe .' mr-8 '. $classes_safe .'" '. $link_safe .'>'. esc_html( $btn1_text ) .'</a>';
		}

		if ( ! empty( $btn2_text ) ) {
			$link_safe = thesaas_get_btn_link_attr( thesaas_get_the_meta( 'topbar_btn_2_link' ) );
			$outline_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_2_outline', 'btn-outline' ) );
			$color_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_2_color', 'white' ) );
			$classes_safe = sanitize_html_class( thesaas_get_the_meta( 'topbar_btn_2_class' ) );
			$output .= '<a class="btn btn-sm hidden-sm-down '. $outline_safe .' btn-'. $color_safe .' '. $classes_safe .'" '. $link_safe .'>'. esc_html( $btn2_text ) .'</a>';
		}

		$output .= '</div>';
	}


	// See if the global buttons are set
	//
	else {

		$btn1_text = get_theme_mod( 'topbar_btn_1_text' );
		$btn2_text = get_theme_mod( 'topbar_btn_2_text' );

		if ( ! empty( $btn1_text ) || ! empty( $btn2_text ) ) {
			$output .= '<div class="d-inline-flex ml-40">';

			if ( ! empty( $btn1_text ) ) {
				$link_safe = thesaas_get_btn_link_attr( get_theme_mod( 'topbar_btn_1_link' ) );
				$outline_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_1_outline' ) );
				if ( $outline_safe ) {
					$outline_safe = 'btn-outline';
				}
				$color_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_1_color', 'white' ) );
				$classes_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_1_class', '' ) );
				$output .= '<a class="btn btn-sm '. $outline_safe .' btn-'. $color_safe .' mr-8 '. $classes_safe .'" '. $link_safe .'>'. esc_html( $btn1_text ) .'</a>';
			}

			if ( ! empty( $btn2_text ) ) {
				$link_safe = thesaas_get_btn_link_attr( get_theme_mod( 'topbar_btn_2_link' ) );
				$outline_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_2_outline', true ) );
				if ( $outline_safe ) {
					$outline_safe = 'btn-outline';
				}
				$color_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_2_color', 'white' ) );
				$classes_safe = sanitize_html_class( get_theme_mod( 'topbar_btn_2_class', '' ) );
				$output .= '<a class="btn btn-sm hidden-sm-down '. $outline_safe .' btn-'. $color_safe .' '. $classes_safe .'" '. $link_safe .'>'. esc_html( $btn2_text ) .'</a>';
			}

			$output .= '</div>';
		}

	}

	return $output;
}

endif;


