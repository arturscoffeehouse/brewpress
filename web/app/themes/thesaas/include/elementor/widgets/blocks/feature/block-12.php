<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_12 {

	const ID = 12;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'See it in action', 'thesaas' ),
			'header' => esc_html__( 'Screenshots', 'thesaas' ),
			'lead'   => esc_html__( 'We waited until we could do it right. Then we did! Instead of creating a carbon copy.', 'thesaas' ),
		] );


		The_Controls::start_section( $widget, 'screenshots', $id );
		The_Controls::add_gallery( $widget, $id, [ 'default' => [
				thesaas_get_img_uri( 'demo/app/shot-1.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-2.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-3.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-4.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-5.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-6.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-7.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-8.jpg' ),
				thesaas_get_img_uri( 'demo/app/shot-9.jpg' ),
			],
		] );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$gallery = $settings['t12_gallery'];
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

          <div class="swiper-container swiper-button-circular" data-slides-per-view="5" data-space-between="50" data-centered-slides="true">
            <div class="swiper-wrapper pb-0">
				<?php
				foreach ($gallery as $image) {
					echo '<div class="swiper-slide"><img src="' . esc_url( $image['url'] ) . '" alt="'. esc_attr( $settings['t12_header_text'] ) .'"></div>';
				}
				?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

	          <div class="swiper-container swiper-button-circular" data-slides-per-view="5" data-space-between="50" data-centered-slides="true">
	            <div class="swiper-wrapper pb-0">
				<# _.each( settings.t12_gallery, function( image ) { #>
					<div class="swiper-slide"><img src="{{ image.url }}" alt="{{ settings.t12_header_text }}"></div>
				<# } ); #>
	            </div>

	            <div class="swiper-button-prev"></div>
	            <div class="swiper-button-next"></div>
	          </div>

		</div></section>
		<?php
	}

}
