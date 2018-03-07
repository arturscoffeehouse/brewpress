<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_9 {

	const ID = 9;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray', 'wide_container' ],
			'wide_container' => true,
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Perfect for Your Business', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Energistically transform pandemic manufactured products whereas premier solutions. Compellingly streamline an expanded array of web-readiness rather.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('pricing-window.jpg') ] );
		The_Controls::add_image_shadow( $widget, $id, [ 'default' => true ] );
		The_Controls::end_section( $widget );


		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_full( $widget, $id, [
			'default' => [
				[
					'icon' => 'fa fa-tv',
					'color' => '#0facf3',
					'title' => esc_html__( 'Responsive', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-wrench',
					'color' => '#0facf3',
					'title' => esc_html__( 'Customizable', 'thesaas' ),
					'text' => esc_html__( 'You can easily read, edit, and write your own code, or change everything.', 'thesaas' ),
				],
			],
		] );
		The_Controls::end_section( $widget );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t9_image']['url'];
		$wide_container = esc_attr( $settings['t9_wide_container'] );
		?>
		<?php $widget->html('section_tag', [ 'class' => 'overflow-hidden py-120' ]); ?>

			<div class="row">

			<?php if ( '-wide' == $wide_container ) : ?>

				<div class="offset-1 col-10 col-lg-6 offset-lg-1 text-center text-lg-left">
					<h2><?php echo $settings['t9_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t9_text'] ?></p>

					<br>

					<div class="row gap-y">
						<?php foreach ( $settings['t9_features'] as $feature ) : ?>
						<div class="col-12 col-md-6">
							<i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-25 mb-3" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i>
							<h6 class="text-uppercase mb-3"><?php echo $feature['title']; ?></h6>
							<p class="fs-14"><?php echo $feature['text']; ?></p>
						</div>
						<?php endforeach; ?>
					</div>

				</div>


				<div class="col-lg-5 align-self-center mt-40">
					<img class="<?php echo esc_attr( $settings['t9_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t9_header_text'] ); ?>" data-aos="slide-left" data-aos-duration="1500">
				</div>

			<?php else: ?>

				<div class="col-12 col-lg-6 text-center text-lg-left">
					<h2><?php echo $settings['t9_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t9_text'] ?></p>

					<br>

					<div class="row gap-y">
						<?php foreach ( $settings['t9_features'] as $feature ) : ?>
						<div class="col-12 col-md-6">
							<i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-25 mb-3" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i>
							<h6 class="text-uppercase mb-3"><?php echo $feature['title']; ?></h6>
							<p class="fs-14"><?php echo $feature['text']; ?></p>
						</div>
						<?php endforeach; ?>
					</div>

				</div>


				<div class="col-lg-5 offset-lg-1 text-center align-self-center mt-40">
					<img class="<?php echo esc_attr( $settings['t9_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t9_header_text'] ); ?>">
				</div>

			<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'overflow-hidden py-120' ]); ?>

			<div class="row">

			<# if ( '-wide' == settings.t9_wide_container ) { #>

				<div class="offset-1 col-10 col-lg-6 offset-lg-1 text-center text-lg-left">
					<h2>{{{ settings.t9_header_text }}}</h2>
					<p class="lead">{{{ settings.t9_text }}}</p>

					<br>

					<div class="row gap-y">
						<# _.each( settings.t9_features, function( feature ) { #>
						<div class="col-12 col-md-6">
							<i class="{{ feature.icon }} fs-25 mb-3" style="color: {{ feature.color }}"></i>
							<h6 class="text-uppercase mb-3">{{{ feature.title }}}</h6>
							<p class="fs-14">{{{ feature.text }}}</p>
						</div>
						<# } ); #>
					</div>

				</div>


				<div class="col-lg-5 align-self-center mt-40">
					<img class="{{ settings.t9_image_shadow }}" src="{{ settings.t9_image.url }}" alt="{{ settings.t9_header_text }}" data-aos="slide-left" data-aos-duration="1500">
				</div>

			<# } else { #>

				<div class="col-12 col-lg-6 text-center text-lg-left">
					<h2>{{{ settings.t9_header_text }}}</h2>
					<p class="lead">{{{ settings.t9_text }}}</p>

					<br>

					<div class="row gap-y">
						<# _.each( settings.t9_features, function( feature ) { #>
						<div class="col-12 col-md-6">
							<i class="{{ feature.icon }} fs-25 mb-3" style="color: {{ feature.color }}"></i>
							<h6 class="text-uppercase mb-3">{{{ feature.title }}}</h6>
							<p class="fs-14">{{{ feature.text }}}</p>
						</div>
						<# } ); #>
					</div>

				</div>


				<div class="col-lg-5 offset-lg-1 text-center align-self-center mt-40">
					<img class="{{ settings.t9_image_shadow }}" src="{{ settings.t9_image.url }}" alt="{{ settings.t9_header_text }}">
				</div>

			<# } #>

			</div>

		</div></section>
		<?php
	}

}
