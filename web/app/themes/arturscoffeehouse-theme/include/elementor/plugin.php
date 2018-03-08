<?php
namespace TheThemeio;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class. Register new elementor widget.
 */
class Plugin {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->add_actions();
	}


	/**
	 * Add Actions
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/frontend/after_register_styles', function() {
		  wp_dequeue_style( 'elementor-post-'. get_the_ID() );

			//wp_enqueue_script( 'thesaas-elementor-script', get_theme_file_uri( '/include/elementor/assets/js/script.js' ), [ 'jquery', 'tiny_mce' ], false, true );
		});

	}


	/**
	 * On Widgets Registered
	 */
	public function on_widgets_registered() {
		$this->enqueue();
		$this->categories();
		$this->includes();
		$this->unregister_widget();
		$this->register_widget();


		new Page_Settings();

	}


	/**
	 * Enqueue styles and scripts.
	 */
	private function enqueue() {

		add_action( 'elementor/frontend/after_enqueue_scripts', function() {

			wp_enqueue_style( 'thesaas-elementor-style', get_theme_file_uri( '/include/elementor/assets/css/style.css' ), array( 'elementor-editor' ) );

			if ( 'yes' !== get_option( 'elementor_expert_user', '' ) ) {
				wp_enqueue_style( 'thesaas-elementor-limit', get_theme_file_uri( '/include/elementor/assets/css/limit.css' ), array( 'elementor-editor' ) );
			}

		} );

	}


	/**
	 * Categories
	 */
	private function categories() {

		$elements = \Elementor\Plugin::instance()->elements_manager;

		$title = '';
		if ( 'yes' == get_option( 'elementor_expert_user', '' ) ) {
			$title = esc_html__( 'TheSaaS Blocks', 'thesaas' );
		}

		$elements->add_category( 'block', [
			'title' => $title,
			'icon' => 'eicon-font',
		] );

	}


	/**
	 * Includes
	 */
	private function includes() {

		require __DIR__ . '/page-settings.php';

		require __DIR__ . '/widgets/the-widget.php';
		require __DIR__ . '/widgets/the-controls.php';
		require __DIR__ . '/widgets/the-panels.php';
		require __DIR__ . '/widgets/the-render.php';

		// Blocks
		//
		require __DIR__ . '/widgets/blocks/contact/base.php';
		require __DIR__ . '/widgets/blocks/content/base.php';
		require __DIR__ . '/widgets/blocks/cover/base.php';
		require __DIR__ . '/widgets/blocks/cta/base.php';
		require __DIR__ . '/widgets/blocks/editor/base.php';
		require __DIR__ . '/widgets/blocks/faq/base.php';
		require __DIR__ . '/widgets/blocks/feature/base.php';
		require __DIR__ . '/widgets/blocks/html/base.php';
		require __DIR__ . '/widgets/blocks/map/base.php';
		require __DIR__ . '/widgets/blocks/misc/base.php';
		require __DIR__ . '/widgets/blocks/partner/base.php';
		require __DIR__ . '/widgets/blocks/pricing/base.php';
		require __DIR__ . '/widgets/blocks/signup/base.php';
		require __DIR__ . '/widgets/blocks/subscribe/base.php';
		require __DIR__ . '/widgets/blocks/portfolio/base.php';
		require __DIR__ . '/widgets/blocks/team/base.php';
		require __DIR__ . '/widgets/blocks/testimonial/base.php';
		require __DIR__ . '/widgets/blocks/textual_feature/base.php';


		// Elements
		// 
		if ( 'yes' == get_option( 'elementor_expert_user', '' ) ) {
			require __DIR__ . '/elements/the-button.php';
		}


	}


	/**
	 * Unregister Widgets.
	 */
	private function unregister_widget() {


		$build_widgets_filename = [
			'button',
			'spacer',
			'image-box',
			'google_maps',
			'icon',
			'icon-box',
			'image-gallery',
			'image-carousel',
			'icon-list',
			'counter',
			'progress',
			'testimonial',
			'tabs',
			'accordion',
			'toggle',
			'social-icons',
			'alert',
			'audio',
			'shortcode',
			'menu-anchor',
			'sidebar',

			'wp-widget-text',
			'wp-widget-audio',
			'wp-widget-recent-comments',
			'wp-widget-meta',
			'wp-widget-pages',
			'wp-widget-calendar',
			'wp-widget-categories',
			'wp-widget-archives',
			'wp-widget-search',
			'wp-widget-recent-posts',
			'wp-widget-rss',
			'wp-widget-tag_cloud',
			'wp-widget-nav_menu',

			'WP_Widget_Text',
			'WP_Widget_Audio',
			'WP_Widget_Recent_Comments',
			'WP_Widget_Meta',
			'WP_Widget_Pages',
			'WP_Widget_Calendar',
			'WP_Widget_Categories',
			'WP_Widget_Archives',
			'WP_Widget_Search',
			'WP_Widget_Recent_Posts',
			'WP_Widget_RSS',
			'WP_Widget_Tag_Cloud',
			'WP_Nav_Menu_Widget',

			'Pojo_Widget_Recent_Posts',
			'Pojo_Widget_Posts_Group',
			'Pojo_Widget_Gallery',
			'Pojo_Widget_Recent_Galleries',
			'Pojo_Slideshow_Widget',
			'Pojo_Forms_Widget',
			'Pojo_Widget_News_Ticker',

			'Pojo_Widget_WC_Products',
			'Pojo_Widget_WC_Products_Category',
			'Pojo_Widget_WC_Product_Categories',
		];


		if ( 'yes' == get_option( 'elementor_expert_user', '' ) ) {
			$build_widgets_filename = [
				//'button',
				'progress',
				'counter',
				'image-gallery',
				'sidebar',
			];
		}




		foreach ( $build_widgets_filename as $widget_filename ) {
			\Elementor\Plugin::instance()->widgets_manager->unregister_widget_type( $widget_filename );
		}

	}


	/**
	 * Register Widgets.
	 */
	private function register_widget() {
		$manager = \Elementor\Plugin::instance()->widgets_manager;

		$widgets = [
			'TheThemeio\Widgets\The_Cover',
			'TheThemeio\Widgets\The_Feature',
			'TheThemeio\Widgets\The_Textual_Feature',
			'TheThemeio\Widgets\The_Content',
			'TheThemeio\Widgets\The_Cta',
			'TheThemeio\Widgets\The_Team',
			'TheThemeio\Widgets\The_Partner',
			'TheThemeio\Widgets\The_Signup',
			'TheThemeio\Widgets\The_Subscribe',
			'TheThemeio\Widgets\The_Portfolio',
			'TheThemeio\Widgets\The_Pricing',
			'TheThemeio\Widgets\The_Faq',
			'TheThemeio\Widgets\The_Testimonial',
			'TheThemeio\Widgets\The_Contact',
			'TheThemeio\Widgets\The_Map',
			'TheThemeio\Widgets\The_Misc',
			'TheThemeio\Widgets\The_Editor',
			'TheThemeio\Widgets\The_Html',
		];

		foreach ($widgets as $widget) {
			$manager->register_widget_type( new $widget );
		}


		// Elements
		//
		if ( 'yes' == get_option( 'elementor_expert_user', '' ) ) {
			$elements = [
				//'TheThemeio\Elements\The_Button',
			];

			foreach ($elements as $element) {
				$manager->register_widget_type( new $element );
			}
		}

	}



}


new Plugin();
