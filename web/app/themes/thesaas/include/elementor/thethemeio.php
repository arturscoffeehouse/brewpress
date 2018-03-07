<?php

/**
 * Elementor configuration file.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_THETHEMEIO__FILE__', __FILE__ );

/**
 * Load TheThemeio
 */
function thethemeio_load() {

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'thethemeio_elementor_fail_load' );
		return;
	}

	// PHP Version
	if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
		add_action( 'admin_notices', 'thesaas_fail_php_version' );
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'thesaas_elementor_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require get_template_directory() . '/include/elementor/plugin.php';
}
add_action( 'after_setup_theme', 'thethemeio_load' );



function thethemeio_elementor_fail_load() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'You need to install and activate TheElementor page builder plugin to use this theme.', 'thesaas' ); ?></p>
	</div>
	<?php
}


function thesaas_fail_php_version() {
	$message = esc_html__( 'TheSaaS requires PHP version 5.6+. Please contact your host provide to update PHP.', 'thesaas' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}


function thesaas_elementor_fail_load_out_of_date() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'Your TheElementor plugin is old. Please update it to the most recent version.', 'thesaas' ); ?></p>
	</div>
	<?php
}
