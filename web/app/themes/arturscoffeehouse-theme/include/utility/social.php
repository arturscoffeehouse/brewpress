<?php


/**
 * List of supporting social media sites.
 */
function thesaas_social_sites() {

	// Store social site names in array
	$social_sites = array(
		'facebook',
		'twitter',
		'google-plus',
		'instagram',
		'dribbble',
		'linkedin',
		'youtube',
		'flickr',
		'pinterest',
		'vimeo',
		'tumblr',
		'xing',
		'rss',
		'email',
	);
	return $social_sites;

}


/**
 * Get user input from the Customizer and output the linked social media icons.
 */
function thesaas_show_social_icons() {

		$social_sites = thesaas_social_sites();

		// Any inputs that aren't empty are stored in $active_sites array
		foreach( $social_sites as $social_site ) {
			if ( strlen( get_theme_mod( 'social_'. $social_site ) ) > 0 ) {
				$active_sites[] = $social_site;
			}
		}

		// For each active social site, add it as a list item
		if ( ! empty( $active_sites ) ) {

			foreach ( $active_sites as $active_site ) {
				echo '<a class="social-'. $active_site .'" href="'. esc_url( get_theme_mod( 'social_'. $active_site ) ) .'" target="_blank">';

				if ( 'vimeo' == $active_site ):
						echo '<i class="fa fa-'. $active_site .'-square"></i>';

				elseif ( 'email' == $active_site ):
						echo '<i class="fa fa-envelope"></i>';

				else:
						echo '<i class="fa fa-'. $active_site .'"></i>';

				endif;

				echo '</a>';
			}

		}
}
