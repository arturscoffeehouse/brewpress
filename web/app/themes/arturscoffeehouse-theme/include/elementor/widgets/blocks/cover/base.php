<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-cover';
	}

	public function get_title() {
		return esc_html__( 'Cover', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-insert-image';
	}

	public function is_reload_preview_required() {
		return true;
	}

}
