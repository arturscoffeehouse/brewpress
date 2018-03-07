<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Subscribe_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_color', 'overlay' ],
			'bg_color' => '#50748e',
		] );

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_image( $widget, $id, [
			'default' => thesaas_get_img_uri( 'placeholder-phone.png' ),
		] );
		The_Controls::add_header_text( $widget, $id, [
			'default' => esc_html__( 'Stay Updated', 'thesaas' ),
		] );
		The_Controls::add_text( $widget, $id, [
			'default' => esc_html__( 'Subscribe to our newsletter to be always aware of our new updates. We build the most powerful and flexible templates for startups.', 'thesaas' ),
		] );
		The_Controls::add_mailchimp_form_link( $widget, $id, ['default' => '#'] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Sign up', 'thesaas' ),
			'outline' => true,
			'color' => 'btn-white',
			'no_link' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'section-inverse pb-0 overflow-hidden' ]); ?>
					<div class="row align-items-center">

						<div class="col-12 col-md-8 pb-70">
							<h2><?php echo $settings['t2_header_text'] ?></h2>
							<p class="lead"><?php echo $settings['t2_text'] ?></p>
							<br>
							<form class="form-inline form-glass" action="<?php echo esc_url( $settings['t2_mailchimp_form_link'] ) ?>" method="post" target="_blank">
								<div class="input-group">
									<input type="text" name="EMAIL" class="form-control" placeholder="Enter Email Address">
									<span class="input-group-btn">
										<?php $widget->html('button', [ 'tag' => 'button' ]) ?>
									</span>
								</div>
							</form>
						</div>


						<div class="col-12 col-md-4">
							<img src="<?php echo esc_url( $settings['t2_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t2_header_text'] ); ?>" data-aos="slide-up">
						</div>

					</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'section-inverse pb-0 overflow-hidden' ]); ?>
					<div class="row align-items-center">

						<div class="col-12 col-md-8 pb-70">
							<h2>{{{ settings.t2_header_text }}}</h2>
							<p class="lead">{{{ settings.t2_text }}}</p>
							<br>
							<form class="form-inline form-glass" action="{{ settings.t2_mailchimp_form_link }}" method="post" target="_blank">
								<div class="input-group">
									<input type="text" name="EMAIL" class="form-control" placeholder="Enter Email Address">
									<span class="input-group-btn">
										<?php $widget->js('button', [ 'tag' => 'button' ]) ?>
									</span>
								</div>
							</form>
						</div>


						<div class="col-12 col-md-4">
							<img src="{{ settings.t2_image.url }}" alt="{{ settings.t2_header_text }}" data-aos="slide-up">
						</div>

					</div>

		</div></section>
		<?php
	}

}
