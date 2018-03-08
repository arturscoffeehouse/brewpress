<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_5 {

	const ID = 5;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'gradient',
				'overlay' => 0,
				'padding_bottom' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri( 'demo/gmail/intro.jpg' ) ] );
		The_Controls::end_section( $widget );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t5_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$image = $settings['t5_image']['url'];
		?>
		<?php $widget->html('header_tag'); ?>

			<div class="row <?php echo $full_row; ?> hidden-sm-down">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center pt-150">

					<h1 class="display-4"><?php echo $settings['t5_header_text']; ?></h1>
					<br>
					<p class="lead fs-20"><?php echo $settings['t5_text']; ?></p>

				</div>

				<div class="col-12 align-self-end text-center">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t5_header_text'] ); ?>" data-aos="fade-up" data-aos-offset="0">
				</div>

			</div>



			<div class="row h-full hidden-md-up">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">
					<h1><?php echo $settings['t5_header_text']; ?></h1>
					<br>
					<p class="text-white fs-15"><?php echo $settings['t5_text']; ?></p>
				</div>

				<div class="col-12 align-self-end text-center">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t5_header_text'] ); ?>" data-aos="fade-up" data-aos-offset="0">
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
		if ( 'yes' == settings.t5_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

			<div class="row {{ full_row }} hidden-sm-down">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center pt-150">

					<h1 class="display-4">{{{ settings.t5_header_text }}}</h1>
					<br>
					<p class="lead fs-20">{{{ settings.t5_text }}}</p>

				</div>

				<div class="col-12 align-self-end text-center">
					<img src="{{ settings.t5_image.url }}" alt="{{ settings.t5_header_text }}" data-aos="fade-up" data-aos-offset="0">
				</div>

			</div>



			<div class="row h-full hidden-md-up">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">
					<h1>{{{ settings.t5_header_text }}}</h1>
					<br>
					<p class="text-white fs-15">{{{ settings.t5_text }}}</p>
				</div>

				<div class="col-12 align-self-end text-center">
					<img src="{{ settings.t5_image.url }}" alt="{{ settings.t5_header_text }}" data-aos="fade-up" data-aos-offset="0">
				</div>
			</div>

		</div></header>
		<?php
	}

}
