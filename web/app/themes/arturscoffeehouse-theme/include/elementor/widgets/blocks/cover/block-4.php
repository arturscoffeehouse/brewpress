<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_4 {

	const ID = 4;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'video',
				'padding_bottom' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		$widget->add_control(
			't'. $id .'_btn_link',
			[
				'label' => esc_html__( 'Video button link', 'thesaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://',
				'description' => 'Youtube or vimeo URL',
				'default' => [
					'url' => 'https://www.youtube.com/watch?v=ah4pcPbRi2M',
				],
				'show_external' => false,
			]
		);
		The_Controls::end_section( $widget );

		$widget->panel( 'info_text', [
			'text' => esc_html__( 'Or Purchase Now', 'thesaas' ),
			'link' => '#',
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
		if ( 'yes' == $settings['t4_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$btn_link = $settings['t4_btn_link']['url'];
		?>
		<?php $widget->html('header_tag'); ?>

			<div class="row align-items-center <?php echo $full_row; ?>">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center pt-150">

					<h1 class="display-4 fw-100 hidden-sm-down"><?php echo $settings['t4_header_text']; ?></h1>
					<h1 class="fw-100 hidden-md-up"><?php echo $settings['t4_header_text']; ?></h1>
					<br><br>
					<p class="lead"><?php echo $settings['t4_text']; ?></p>
					<br>
					<p><a class="btn btn-lg btn-circular btn-white" href="<?php echo esc_url( $btn_link ); ?>" data-provide="lightbox"><i class="fa fa-play"></i></a></p>
					<br>
					<?php $widget->html('info'); ?>
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
		if ( 'yes' == settings.t4_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

			<div class="row {{ full_row }}">
				<div class="col-12 col-lg-8 offset-lg-2 align-self-center pt-150">

					<h1 class="display-4 fw-100 hidden-sm-down">{{{ settings.t4_header_text }}}</h1>
					<h1 class="fw-100 hidden-md-up">{{{ settings.t4_header_text }}}</h1>
					<br><br>
					<p class="lead">{{{ settings.t4_text }}}</p>
					<br>
					<p><a class="btn btn-lg btn-circular btn-white" href="{{ settings.t4_btn_link }}" data-provide="lightbox"><i class="fa fa-play"></i></a></p>
					<br>
					<?php $widget->js('info'); ?>

				</div>

				<div class="col-12 align-self-end text-center pb-50">
					<?php $widget->js('flash_down'); ?>
				</div>

			</div>

		</div></header>
		<?php
	}

}
