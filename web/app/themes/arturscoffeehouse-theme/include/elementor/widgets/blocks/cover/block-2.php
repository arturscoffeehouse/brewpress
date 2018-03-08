<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'color',
				'overlay' => 0,
				'padding_bottom' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS', 'thesaas' ) ] );
		The_Controls::add_heading_size( $widget, $id, [ 'default' => 60 ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'See demos', 'thesaas' ),
			'size' => 'btn-lg',
			'round' => true,
			'color' => 'btn-white',
		] );

		$widget->panel( 'flash_down', [
			'display' => true,
			'inverse' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t2_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$heading_size = esc_attr( $settings['t2_heading_size']['size'] );
		?>
		<?php $widget->html('header_tag'); ?>

			<div class="row <?php echo $full_row; ?>">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">

					<h1 class="display-1 hidden-sm-down" style="font-size: <?php echo $heading_size; ?>px"><?php echo $settings['t2_header_text']; ?></h1>
					<h1 class="hidden-md-up"><?php echo $settings['t2_header_text']; ?></h1>
					<br>
					<p class="fs-20 w-600 mx-auto hidden-sm-down"><?php echo $settings['t2_text']; ?></p>
					<p class="fs-16 hidden-md-up"><?php echo $settings['t2_text']; ?></p>

					<hr class="w-80">
					<br>

					<?php $widget->html('button'); ?>
				</div>

				<div class="col-12 align-self-end text-center pb-50">
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
		if ( 'yes' == settings.t2_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

			<div class="row {{ full_row }}">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">

					<h1 class="display-1 hidden-sm-down" style="font-size: {{ settings.t2_heading_size.size }}px">{{{ settings.t2_header_text }}}</h1>
					<h1 class="hidden-md-up">{{{ settings.t2_header_text }}}</h1>
					<br>
					<p class="fs-20 w-600 mx-auto hidden-sm-down">{{{ settings.t2_text }}}</p>
					<p class="fs-16 hidden-md-up">{{{ settings.t2_text }}}</p>

					<hr class="w-80">
					<br>

					<?php $widget->js('button'); ?>
				</div>

				<div class="col-12 align-self-end text-center pb-50">
					<?php $widget->js('flash_down'); ?>
				</div>

			</div>

		</div></header>
		<?php
	}

}
