<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_4 {

	const ID = 4;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content' );

		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_full( $widget, $id, [
			'default' => [
				[
					'icon' => 'icon-presentation',
					'title' => esc_html__( 'Present', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
				[
					'icon' => 'icon-scope',
					'title' => esc_html__( 'Impression', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
				[
					'icon' => 'icon-target',
					'title' => esc_html__( 'Conversion', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
			],
		] );
		The_Controls::end_section( $widget );

		$widget->panel( 'info_text', [
			'text' => esc_html__( 'Discover more features', 'thesaas' ),
			'link' => '#',
		] );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'text-center text-md-left' ]); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php foreach ( $settings['t4_features'] as $feature ) : ?>
					<div class="col-12 col-md-4 feature-2">
						<p class="feature-icon" style="color: <?php echo esc_attr( $feature['color'] ); ?>"><i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i></p>
						<h6><?php echo $feature['title']; ?></h6>
						<p><?php echo $feature['text']; ?></p>
					</div>
				<?php endforeach; ?>

			</div>

			<?php if ( ! empty( $settings['t4_info_text'] ) ) : ?>
			<hr class="w-50 ml-0">
			<p><a href="<?php echo esc_url( $settings['t4_info_link']['url'] ); ?>"><?php echo $settings['t4_info_text']; ?> <i class="ti-angle-right fs-9 ml-4"></i></a></p>
			<?php endif; ?>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'text-center text-md-left' ]); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row gap-y">

				<# _.each( settings.t4_features, function( feature ) { #>
					<div class="col-12 col-md-4 feature-2">
						<p class="feature-icon" style="color: {{ feature.color }}"><i class="{{ feature.icon }}"></i></p>
						<h6>{{{ feature.title }}}</h6>
						<p>{{{ feature.text }}}</p>
					</div>
				<# } ); #>

			</div>

			<# if ( '' !== settings.t4_info_text ) { #>
			<hr class="w-50 ml-0">
			<p><a href="{{ settings.t4_info_link.url }}">{{{ settings.t4_info_text }}} <i class="ti-angle-right fs-9 ml-4"></i></a></p>
			<# } #>

		</div></section>
		<?php
	}

}
