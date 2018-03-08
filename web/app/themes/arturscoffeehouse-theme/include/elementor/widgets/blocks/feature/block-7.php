<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_7 {

	const ID = 7;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray', 'switch_sides', 'wide_container' ],
			'wide_container' => true,
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_small_text( $widget, $id, [ 'default' => esc_html__( 'Marketing', 'thesaas' ) ] );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Increase Your Sells', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Interactively productize worldwide potentialities before long-term high-impact initiatives. Completely disintermediate excellent leadership skills with client-centric content.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('placeholder-bg.jpg') ] );
		The_Controls::end_section( $widget );


		$widget->panel( 'button', [
			'text' => esc_html__( 'Read more', 'thesaas' ),
			'round' => true,
			'color' => 'btn-primary',
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = esc_url( $settings['t7_image']['url'] );
		$swap = $settings['t7_switch_sides'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'p-0' ]); ?>

			<div class="row no-gap">

				<?php if ( 'yes' !== $swap ) : ?>
				<div class="col-12 col-md-6 bg-img" style="background-image: url(<?php echo $image; ?>); min-height: 200px;"></div>

				<div class="offset-1 col-10 col-md-4 py-90">
					<p><small><?php echo $settings['t7_small_text']; ?></small></p>
					<h5><?php echo $settings['t7_header_text']; ?></h5>
					<p><?php echo $settings['t7_text']; ?></p>
					<br>
					<?php $widget->html('button'); ?>
				</div>

				<?php else: ?>

				<div class="offset-1 col-10 col-md-4 py-90">
					<p><small><?php echo $settings['t7_small_text']; ?></small></p>
					<h5><?php echo $settings['t7_header_text']; ?></h5>
					<p><?php echo $settings['t7_text']; ?></p>
					<br>
					<?php $widget->html('button'); ?>
				</div>

				<div class="col-12 offset-md-1 col-md-6 bg-img" style="background-image: url(<?php echo $image; ?>); min-height: 200px;"></div>
				<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'p-0' ]); ?>

			<div class="row no-gap">

				<# if ( 'yes' !== settings.t7_switch_sides ) { #>
				<div class="col-12 col-md-6 bg-img" style="background-image: url({{ settings.t7_image.url }}); min-height: 200px;"></div>

				<div class="offset-1 col-10 col-md-4 py-90">
					<p><small>{{{ settings.t7_small_text }}}</small></p>
					<h5>{{{ settings.t7_header_text }}}</h5>
					<p>{{{ settings.t7_text }}}</p>
					<br>
					<?php $widget->js('button'); ?>
				</div>

				<# } else { #>

				<div class="offset-1 col-10 col-md-4 py-90">
					<p><small>{{{ settings.t7_small_text }}}</small></p>
					<h5>{{{ settings.t7_header_text }}}</h5>
					<p>{{{ settings.t7_text }}}</p>
					<br>
					<?php $widget->js('button'); ?>
				</div>

				<div class="col-12 offset-md-1 col-md-6 bg-img" style="background-image: url({{ settings.t7_image.url }}); min-height: 200px;"></div>
				<# } #>

			</div>

		</div></section>
		<?php
	}

}
