<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Faq extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-faq';
	}

	public function get_title() {
		return esc_html__( 'FAQ', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

}
