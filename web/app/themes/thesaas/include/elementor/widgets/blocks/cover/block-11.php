<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_11 {

	const ID = 11;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'image',
				'bg_image' => thesaas_get_img_uri( 'bg-laptop.jpg' ),
				'overlay' => 7,
				'padding_top' => 0,
				'padding_bottom' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'COMING SOON', 'thesaas' ) ] );
		The_Controls::add_heading_size( $widget, $id, [ 'default' => 88 ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool, which suits best for any kind of landing pages.', 'thesaas' ) ] );

    $widget->add_control(
      't'. $id . '_counter_header',
      The_Controls::option_text( esc_html__( 'Counter header', 'thesaas' ), [], [
        'default' => esc_html__( 'We will be ready in', 'thesaas' ),
      ] )
    );

    $widget->add_control(
      't'. $id . '_counter_deadline',
      The_Controls::option_text( esc_html__( 'Counter deadline', 'thesaas' ), [], [
        'default' => '2017/12/25',
        'placeholder' => 'YYYY/MM/DD',
      ] )
    );

		The_Controls::end_section( $widget );

    $widget->panel( 'flash_down', [
      'inverse' => true,
    ] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t11_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$heading_size = esc_attr( $settings['t11_heading_size']['size'] );
		?>
		<?php $widget->html('header_tag'); ?>

      <div class="row <?php echo $full_row; ?> align-items-center">
        <div class="col-12 col-lg-8 offset-lg-2">

          <h1 class="display-2 ls-3" style="font-size: <?php echo $heading_size; ?>px"><?php echo $settings['t11_header_text']; ?></h1>
          <br><br>
          <p class="lead opacity-80"><?php echo $settings['t11_text']; ?></p>

          <br><br>

          <h3><?php echo $settings['t11_counter_header']; ?></h3>
          <br>
          <div class="countdown countdown-sm countdown-outline countdown-inverse countdown-uppercase" data-countdown="<?php echo esc_attr( $settings['t11_counter_deadline'] ) ?>"></div>

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
		if ( 'yes' == settings.t11_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

      <div class="row {{ full_row }} align-items-center">
        <div class="col-12 col-lg-8 offset-lg-2">

          <h1 class="display-2 text-uppercase ls-3" style="font-size: {{ settings.t11_heading_size.size }}px">{{{ settings.t11_header_text }}}</h1>
          <br><br>
          <p class="lead opacity-80">{{{ settings.t11_text }}}</p>

          <br><br>

          <h3>{{{ settings.t11_counter_header }}}</h3>
          <br>
          <div class="countdown countdown-sm countdown-outline countdown-inverse countdown-uppercase" data-countdown="{{ settings.t11_counter_deadline }}"></div>

        </div>

        <div class="col-12 align-self-end text-center">
          <?php $widget->js('flash_down'); ?>
        </div>
      </div>

		</div></header>
		<?php
	}

}
