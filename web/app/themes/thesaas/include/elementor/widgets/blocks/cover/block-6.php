<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_6 {

	const ID = 6;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'color',
				'overlay' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri( 'placeholder-phone.png' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Buy now $19', 'thesaas' ),
			'size' => 'btn-lg',
			'round' => true,
			'color' => 'btn-white',
		] );

		$widget->panel( 'flash_down', [
			'inverse' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t6_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$image = $settings['t6_image']['url'];
		?>
		<?php $widget->html('header_tag'); ?>

			<div class="row <?php echo $full_row; ?> align-items-center">
				<div class="col-12 col-md-4 offset-md-1 text-center text-md-left">
					<h1><?php echo $settings['t6_header_text']; ?></h1>
					<p class="lead"><?php echo $settings['t6_text']; ?></p>
					<br>
					<?php $widget->html('button'); ?>
				</div>


				<div class="col-12 offset-md-1 col-md-5 text-center mt-40">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t6_header_text'] ); ?>">
				</div>

				<div class="col-12 align-self-end text-center">
					<?php $widget->html('flash_down'); ?>
				</div>
			</div>

		</div></header>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<#
		var full_row = '';
		if ( 'yes' == settings.t6_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

			<div class="row {{ full_row }} align-items-center">
				<div class="col-12 col-md-4 offset-md-1 text-center text-md-left">
					<h1>{{{ settings.t6_header_text }}}</h1>
					<p class="lead">{{{ settings.t6_text }}}</p>
					<br>
					<?php $widget->js('button'); ?>
				</div>


				<div class="col-12 offset-md-1 col-md-5 text-center mt-40">
					<img src="{{ settings.t6_image.url }}" alt="{{ settings.t6_header_text }}">
				</div>

				<div class="col-12 align-self-end text-center">
					<?php $widget->js('flash_down'); ?>
				</div>
			</div>

		</div></header>
		<?php
	}

}
