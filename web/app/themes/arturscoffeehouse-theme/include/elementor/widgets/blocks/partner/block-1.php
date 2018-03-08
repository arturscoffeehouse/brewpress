<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Partner_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => '',
			'header' => esc_html__( 'You\'re in good company', 'thesaas' ),
			'lead'   => esc_html__( 'Join thousands of satisfied customers using our template globally.', 'thesaas' ),
		] );

		$widget->panel( 'partners', [
			'images' => [
				thesaas_get_img_uri( 'partner-1.png' ),
				thesaas_get_img_uri( 'partner-2.png' ),
				thesaas_get_img_uri( 'partner-3.png' ),
				thesaas_get_img_uri( 'partner-4.png' ),
			]
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="partner">
				<?php $widget->html('gallery'); ?>
			</div>
		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="partner">
				<?php $widget->js('gallery'); ?>
			</div>
		</div></section>
		<?php
	}

}
