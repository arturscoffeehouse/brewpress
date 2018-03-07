<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Portfolio extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function is_reload_preview_required() {
		//return true;
	}

}
