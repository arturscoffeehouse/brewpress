<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Pricing extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

}
