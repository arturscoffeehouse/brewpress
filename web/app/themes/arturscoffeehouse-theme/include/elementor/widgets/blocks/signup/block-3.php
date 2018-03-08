<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Signup_Block_3 {

	const ID = 3;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_image', 'overlay' ],
			'bg_image' => thesaas_get_img_uri('placeholder-bg.jpg'),
			'overlay'  => 8,
		] );

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [
			'default' => esc_html__( 'Start to Use TheSaaS Now!', 'thesaas' ),
		] );
		The_Controls::add_form_action_link( $widget, $id, ['default' => '#'] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Get started', 'thesaas' ),
			'size' => 'btn-lg',
			'block' => true,
			'color' => 'btn-success',
			'no_link' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'section-inverse py-150' ]); ?>
					<h3 class="text-center fw-300"><?php echo $settings['t3_header_text'] ?></h3>
					<br><br>

					<form class="row gap-y form-glass" action="<?php echo esc_url( $settings['t3_form_action_link'] ) ?>" method="POST">
						<div class="col-12 col-md-6 col-lg-3">
							<input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<?php $widget->html('button', [ 'tag' => 'button' ]) ?>
						</div>
					</form>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'section-inverse py-150' ]); ?>
					<h3 class="text-center fw-300">{{{ settings.t3_header_text }}}</h3>
					<br><br>

					<form class="row gap-y form-glass" action="{{ settings.t3_form_action_link }}" method="POST">
						<div class="col-12 col-md-6 col-lg-3">
							<input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
						</div>

						<div class="col-12 col-md-6 col-lg-3">
							<?php $widget->js('button', [ 'tag' => 'button' ]) ?>
						</div>
					</form>

		</div></section>
		<?php
	}

}
