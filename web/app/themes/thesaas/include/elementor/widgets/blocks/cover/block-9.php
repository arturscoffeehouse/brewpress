<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_9 {

	const ID = 9;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
				'background' => 'image',
				'bg_image' => thesaas_get_img_uri( 'bg-thunder.jpg' ),
				'bg_image_type' => 'parallax',
				'padding_top' => 0,
				'padding_bottom' => 0,
				'overlay' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'App Landing Page', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'The best template for your mobile app to showcase and acquire new customers all around the world. The best template that you can find anywhere!', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri( 'mobile-hand.png' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'primary_button', [
			'text' => esc_html__( 'Download now', 'thesaas' ),
			'size' => 'btn-lg',
			'color' => 'btn-white',
			'width' => 200,
		] );

		$widget->panel( 'secondary_button', [
			'text' => esc_html__( 'Features', 'thesaas' ),
			'size' => 'btn-lg',
			'outline' => true,
			'color' => 'btn-white',
			'width' => 200,
		] );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t9_fullscreen'] ) {
			$full_row = 'h-full';
		}

		$image = $settings['t9_image']['url'];

		?>
		<?php $widget->html('header_tag'); ?>

	        <div class="row <?php echo $full_row; ?>">
	          <div class="col-12 col-lg-6 align-self-center text-center text-lg-left">

	            <h1 class="display-4"><?php echo $settings['t9_header_text']; ?></h1>
	            <br>
	            <p class="lead text-white fs-20"><?php echo $settings['t9_text']; ?></p>

	            <br><br>

	            <div>
	            	<?php $widget->html('button'); ?>
	            	<?php $widget->html('button2', [ 'class' => 'ml-8 hidden-sm-down' ]); ?>
	            </div>

	          </div>


	          <div class="col-12 col-lg-6 align-self-end text-right hidden-md-down">
	            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t9_header_text'] ); ?>" data-aos="slide-up" data-aos-offset="0">
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
		if ( 'yes' == settings.t9_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

	        <div class="row {{ full_row }}">
	          <div class="col-12 col-lg-6 align-self-center text-center text-lg-left">

	            <h1 class="display-4">{{{ settings.t9_header_text }}}</h1>
	            <br>
	            <p class="lead text-white fs-20">{{{ settings.t9_text }}}</p>

	            <br><br>

	            <div>
	            	<?php $widget->js('button'); ?>
	            	<?php $widget->js('button2', [ 'class' => 'ml-8 hidden-sm-down' ]); ?>
	            </div>

	          </div>


	          <div class="col-12 col-lg-6 align-self-end text-right hidden-md-down">
	            <img src="{{ settings.t9_image.url }}" alt="{{ settings.t9_header_text }}" data-aos="slide-up" data-aos-offset="0">
	          </div>

	        </div>

		</div></header>
		<?php
	}

}
