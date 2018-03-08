<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Misc extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-misc';
	}

	public function get_title() {
		return esc_html__( 'Misc', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-apps';
	}

	public function is_reload_preview_required() {
		//return true;
	}

}
