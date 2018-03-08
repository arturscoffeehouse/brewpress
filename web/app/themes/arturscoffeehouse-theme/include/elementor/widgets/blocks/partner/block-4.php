<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Partner_Block_4 {

	const ID = 4;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => '',
			'header' => esc_html__( 'Our Happy Clients', 'thesaas' ),
			'lead'   => esc_html__( 'Join thousands of satisfied customers using our template globally.', 'thesaas' ),
		] );

		$widget->panel( 'partners', [
			'images' => [
				thesaas_get_img_uri( 'partner-1.png' ),
				thesaas_get_img_uri( 'partner-2.png' ),
				thesaas_get_img_uri( 'partner-3.png' ),
				thesaas_get_img_uri( 'partner-4.png' ),
				thesaas_get_img_uri( 'partner-5.png' ),
				thesaas_get_img_uri( 'partner-6.png' ),
				thesaas_get_img_uri( 'partner-7.png' ),
			]
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="swiper-container partner" data-autoplay="1000" data-slides-per-view="4">
				<div class="swiper-wrapper">
				<?php $widget->html('gallery', [
					'prefix'  => '<div class="swiper-slide">',
					'postfix' => '</div>',
				]); ?>
				</div>
			</div>
		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="swiper-container partner" data-autoplay="1000" data-slides-per-view="4">
				<div class="swiper-wrapper">
				<?php $widget->js('gallery', [
					'prefix'  => '<div class="swiper-slide">',
					'postfix' => '</div>',
				]); ?>
				</div>
			</div>
		</div></section>
		<?php
	}

}
