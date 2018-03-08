<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Partner_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
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
		<?php $widget->html('section_tag', [ 'class' => 'py-40' ]); ?>
			<div class="partner partner-sm">
				<?php $widget->html('gallery'); ?>
			</div>
		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'py-40' ]); ?>
			<div class="partner partner-sm">
				<?php $widget->js('gallery'); ?>
			</div>
		</div></section>
		<?php
	}

}
