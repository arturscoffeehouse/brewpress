<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Contact extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-contact';
	}

	public function get_title() {
		return esc_html__( 'Contact', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function is_reload_preview_required() {
		return true;
	}

}
