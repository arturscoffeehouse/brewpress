<?php
/**
 * TheSaaS functions and definitions
 */

/**
 * TheSaaS only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/include/setup/back-compat.php';
	return;
}

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/include/utility/general.php';


/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/include/setup/theme.php';

/**
 * Create custom style.
 */
require get_template_directory() . '/include/setup/style.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/include/setup/enqueue.php';

/**
 * Use TGM plugin activation for loading plugins.
 */
require get_template_directory() . '/include/setup/plugin.php';

/**
 * Codes to only run one time.
 */
require get_template_directory() . '/include/setup/onetime.php';

/**
 * Post related filters.
 */
require get_template_directory() . '/include/hook/post.php';

/**
 * One-Click Demo Import
 */
require get_template_directory() . '/include/hook/ocdi.php';

/**
 * Extra functions.
 */
require get_template_directory() . '/include/hook/extra.php';

/**
 * Custom post types
 */
require get_template_directory() . '/include/post_types/portfolio.php';
require get_template_directory() . '/include/post_types/job.php';

/**
 * Backend support for the contact form.
 */
require get_template_directory() . '/include/utility/contact.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/include/utility/tags.php';

/**
 * Social icons functions.
 */
require get_template_directory() . '/include/utility/social.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/class/thesaas-customizer.php';

/**
 * A nav walker for topbar menus.
 */
require get_template_directory() . '/include/class/thesaas-walker-nav-menu.php';

/**
 * Apply my changes to elementor
 */
require get_template_directory() . '/include/elementor/thethemeio.php';

