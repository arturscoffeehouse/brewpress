<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_3 {

	const ID = 3;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'image',
				'padding_bottom' => 80,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Create Professional Websites', 'thesaas' ) ] );
		//The_Controls::add_heading_size( $widget, $id, [ 'default' => 60 ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS template powered with Bootstrap 4.', 'thesaas' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'primary_button', [
			'text' => esc_html__( 'Demos', 'thesaas' ),
			'size' => 'btn-lg',
			'round' => true,
			'color' => 'btn-info',
			'width' => 200,
		] );

		$widget->panel( 'secondary_button', [
			'text' => esc_html__( 'Features', 'thesaas' ),
			'size' => 'btn-lg',
			'outline' => true,
			'round' => true,
			'color' => 'btn-white',
			'width' => 200,
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
		if ( 'yes' == $settings['t3_fullscreen'] ) {
			$full_row = 'h-full';
		}

		?>
		<?php $widget->html('header_tag'); ?>

			<div class="row <?php echo $full_row; ?>">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">

					<h1 class="display-4 hidden-sm-down"><?php echo $settings['t3_header_text']; ?></h1>
					<h1 class="hidden-md-up"><?php echo $settings['t3_header_text']; ?></h1>
					<br>
					<p class="lead text-white fs-20 hidden-sm-down"><?php echo $settings['t3_text']; ?></p>
					<p class="lead text-white fs-15 hidden-md-up"><?php echo $settings['t3_text']; ?></p>

					<br><br><br>

					<?php $widget->html('button', [ 'class' => 'mx-1 mb-3' ]); ?>
					<?php $widget->html('button2', [ 'class' => 'hidden-sm-down1 mx-1 mb-3' ]); ?>
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
		if ( 'yes' == settings.t3_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

			<div class="row {{ full_row }}">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center">

					<h1 class="display-4 hidden-sm-down">{{{ settings.t3_header_text }}}</h1>
					<h1 class="hidden-md-up">{{{ settings.t3_header_text }}}</h1>
					<br>
					<p class="lead text-white fs-20 hidden-sm-down">{{{ settings.t3_text }}}</p>

					<br><br><br>

					<?php $widget->js('button', [ 'class' => 'mx-1 mb-3' ]); ?>
					<?php $widget->js('button2', [ 'class' => 'hidden-sm-down1 mx-1 mb-3' ]); ?>
				</div>


				<div class="col-12 align-self-end text-center">
					<?php $widget->js('flash_down'); ?>
				</div>

			</div>

		</div></header>
		<?php
	}

}
