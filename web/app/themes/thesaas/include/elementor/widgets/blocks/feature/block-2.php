<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Create Admin Area', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Uniquely evolve equity invested value vis-a-vis proactive testing procedures. Collaboratively create worldwide results without resource maximizing. Uniquely evolve equity invested value vis-a-vis proactive testing procedures. Collaboratively create worldwide results without resource maximizing.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('placeholder-phone.png') ] );
		The_Controls::add_image_shadow( $widget, $id );
		The_Controls::end_section( $widget );


		$widget->panel( 'button', [
			'text' => esc_html__( 'Get start now', 'thesaas' ),
			'size' => 'btn-lg',
			'round' => true,
			'color' => 'btn-primary',
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t2_image']['url'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'overflow-hidden' ]); ?>

			<div class="row">

				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h2><?php echo $settings['t2_header_text']; ?></h2><br>
					<p><?php echo $settings['t2_text']; ?></p>
					<br>
					<?php $widget->html('button'); ?>
				</div>

				<?php if ( ! empty( $image ) ) : ?>
				<div class="col-12 offset-md-1 col-md-5 text-center mt-40">
					<img class="<?php echo esc_attr( $settings['t2_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t2_header_text'] ); ?>" data-aos="fade-up">
				</div>
				<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'overflow-hidden' ]); ?>

			<div class="row">

				<div class="col-12 col-md-6 align-self-center text-center text-md-left">
					<h2>{{{ settings.t2_header_text }}}</h2><br>
					<p>{{{ settings.t2_text }}}</p>
					<br>
					<?php $widget->js('button'); ?>
				</div>

				<# if ( '' !== settings.t2_image.url ) { #>
				<div class="col-12 offset-md-1 col-md-5 text-center mt-40">
					<img class="{{ settings.t2_image_shadow }}" src="{{ settings.t2_image.url }}" alt="{{ settings.t2_header_text }}" data-aos="fade-up">
				</div>
				<# } #>

			</div>

		</div></section>
		<?php
	}

}
