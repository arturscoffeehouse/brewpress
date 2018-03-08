<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Subscribe extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-subscribe';
	}

	public function get_title() {
		return esc_html__( 'Subscribe', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

}
