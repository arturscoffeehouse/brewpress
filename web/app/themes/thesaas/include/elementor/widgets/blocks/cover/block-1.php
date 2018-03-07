<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'overlay' => 0,
				'fullscreen' => false,
				'bg_color' => '#c2b2cd',
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_image( $widget, $id, [ 'default' => '' ] );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Header Title', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Some description to put inside the header.', 'thesaas' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'primary_button', [
			'text' => '',
			'round' => true,
			'color' => 'btn-white',
			'width' => 160,
		] );

		$widget->panel( 'secondary_button', [
			'text' => '',
			'outline' => true,
			'round' => true,
			'color' => 'btn-white',
			'width' => 160,
		] );

		$widget->panel( 'flash_down', [
			'inverse' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t1_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$image = $settings['t1_image']['url'];

		?>
		<?php $widget->html('header_tag'); ?>

      <div class="row <?php echo $full_row; ?>">
        <div class="col-12 col-lg-8 offset-lg-2">
        	<?php if ( ! empty( $image ) ) : ?>
          <p><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t1_header_text'] ); ?>"></p>
          <br>
        	<?php endif; ?>
          <h1><?php echo $settings['t1_header_text']; ?></h1>
          <p class="fs-20 opacity-70"><?php echo $settings['t1_text']; ?></p>

          <?php if ( ! empty( $settings['t1_btn_text'] ) || ! empty( $settings['t1_btn2_text'] ) ) : ?>
          	<br><br>
          <?php endif; ?>

					<?php $widget->html('button', [ 'class' => 'mr-16' ]); ?>
					<?php $widget->html('button2', [ 'class' => 'hidden-sm-down' ]); ?>
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
		if ( 'yes' == settings.t1_fullscreen ) {
			full_row = 'h-full';
		}
		#>

		<?php $widget->js('header_tag'); ?>
      <div class="row {{ full_row }}">
        <div class="col-12 col-lg-8 offset-lg-2">
          <# if ( '' !== settings.t1_image.url ) { #>
          <p><img src="{{ settings.t1_image.url }}" alt="{{ settings.t1_header_text }}"></p>
          <br>
          <# } #>
          <h1>{{{ settings.t1_header_text }}}</h1>
          <p class="fs-20 opacity-70">{{{ settings.t1_text }}}</p>

          <# if ( '' !== settings.t1_btn_text || '' !== settings.t1_btn2_text ) { #>
          <br><br>
          <# } #>
					<?php $widget->js('button', [ 'class' => 'mr-16' ]); ?>
					<?php $widget->js('button2', [ 'class' => 'hidden-sm-down' ]); ?>
        </div>

				<div class="col-12 align-self-end text-center">
					<?php $widget->js('flash_down'); ?>
				</div>
      </div>

		</div></header>
		<?php
	}

}
