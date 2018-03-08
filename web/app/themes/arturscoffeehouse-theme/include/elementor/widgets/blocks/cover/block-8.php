<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_8 {

	const ID = 8;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'gradient',
				'color_1' => '#fdfbfb',
				'color_2' => '#eee',
				'header_inverse' => '',
				'overlay' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri( 'pricing-window.jpg' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Get started', 'thesaas' ),
			'size' => 'btn-lg',
			'color' => 'btn-success',
		] );

		$widget->panel( 'info_text', [
			'text' => esc_html__( 'Already a member? Sign in', 'thesaas' ),
			'link' => '#',
		] );

		$widget->panel( 'flash_down' );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t8_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$image = $settings['t8_image']['url'];
		?>
		<?php $widget->html('header_tag', [ 'container' => '-wide' ]); ?>

      <div class="row <?php echo $full_row; ?> align-items-center text-center text-lg-left">

        <div class="col-md-5 col-xl-4">
          <div class="px-30">
            <h1><?php echo $settings['t8_header_text']; ?></h1>
            <br>
            <p class="lead mx-auto"><?php echo $settings['t8_text']; ?></p>
            <br>
            <?php $widget->html('button'); ?>
            <p class="pt-8"><?php $widget->html('info'); ?></p>
          </div>
        </div>

        <div class="col-md-6 col-xl-6 offset-md-1 offset-xl-2 img-outside-right hidden-md-down py-20">
          <img class="shadow-4" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t8_header_text'] ); ?>">
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
		if ( 'yes' == settings.t8_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag', [ 'container' => '-wide' ]); ?>

      <div class="row {{ full_row }} align-items-center text-center text-lg-left">

        <div class="col-lg-4">
          <div class="px-30">
            <h1>{{{ settings.t8_header_text }}}</h1>
            <br>
            <p class="lead mx-auto">{{{ settings.t8_text }}}</p>
            <br>
            <?php $widget->js('button'); ?>
            <p class="pt-8"><?php $widget->js('info'); ?></p>
          </div>
        </div>

        <div class="col-12 col-lg-6 offset-lg-2 img-outside-right hidden-md-down py-20">
          <img class="shadow-4" src="{{ settings.t8_image.url }}" alt="{{ settings.t8_header_text }}">
        </div>

				<div class="col-12 align-self-end text-center">
					<?php $widget->js('flash_down'); ?>
				</div>
      </div>

		</div></header>
		<?php
	}

}
