<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_6 {

	const ID = 6;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray', 'switch_sides' ],
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Features', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'We are so excited and proud of our product. It\'s really easy to create a landing page for your awesome product.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('placeholder-phone.png') ] );
		The_Controls::add_image_shadow( $widget, $id );
		The_Controls::end_section( $widget );


		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_full( $widget, $id, [
			'default' => [
				[
					'icon' => 'fa fa-tv',
					'color' => '#616771',
					'title' => esc_html__( 'Responsive Design', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-cubes',
					'color' => '#616771',
					'title' => esc_html__( 'Elements & Components', 'thesaas' ),
					'text' => esc_html__( 'You can easily read, edit, and write your own code, or change everything.', 'thesaas' ),
				],
			],
		] );
		The_Controls::end_section( $widget );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t6_image']['url'];
		$swap = $settings['t6_switch_sides'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'pb-0 overflow-hidden' ]); ?>

			<div class="row align-items-center">

				<?php if ( 'yes' !== $swap ) : ?>

				<div class="col-12 col-md-5 pb-70">
					<h2><?php echo $settings['t6_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t6_text'] ?></p>

					<br>

					<?php foreach ( $settings['t6_features'] as $feature ) : ?>
					<div class="flexbox gap-items-4">
						<div>
							<i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-25 pt-4" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i>
						</div>

						<div>
							<h5><?php echo $feature['title']; ?></h5>
							<p><?php echo $feature['text']; ?></p>
						</div>
					</div>
					<?php endforeach; ?>

				</div>


				<div class="col-12 offset-md-2 col-md-5 text-center">
					<img class="<?php echo esc_attr( $settings['t6_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t6_header_text'] ); ?>" data-aos="fade-up" data-aos-delay="200">
				</div>

				<?php else: ?>

				<div class="col-12 col-md-5 text-center">
					<img class="<?php echo esc_attr( $settings['t6_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t6_header_text'] ); ?>" data-aos="fade-up" data-aos-delay="200">
				</div>

				<div class="col-12 col-md-5 offset-md-2 pb-70">
					<h2><?php echo $settings['t6_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t6_text'] ?></p>

					<br>

					<?php foreach ( $settings['t6_features'] as $feature ) : ?>
					<div class="flexbox gap-items-4">
						<div>
							<i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-25 pt-4" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i>
						</div>

						<div>
							<h5><?php echo $feature['title']; ?></h5>
							<p><?php echo $feature['text']; ?></p>
						</div>
					</div>
					<?php endforeach; ?>

				</div>

				<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'pb-0 overflow-hidden' ]); ?>

			<div class="row align-items-center">

				<# if ( 'yes' !== settings.t6_switch_sides ) { #>

				<div class="col-12 col-md-5 pb-70">
					<h2>{{{ settings.t6_header_text }}}</h2>
					<p class="lead">{{{ settings.t6_text }}}</p>

					<br>

					<# _.each( settings.t6_features, function( feature ) { #>
					<div class="flexbox gap-items-4">
						<div>
							<i class="{{ feature.icon }} fs-25 pt-4" style="color: {{ feature.color }}"></i>
						</div>

						<div>
							<h5>{{{ feature.title }}}</h5>
							<p>{{{ feature.text }}}</p>
						</div>
					</div>
					<# } ); #>

				</div>


				<div class="col-12 offset-md-2 col-md-5 text-center">
					<img class="{{ settings.t6_image_shadow }}" src="{{ settings.t6_image.url }}" alt="{{ settings.t6_header_text }}" data-aos="fade-up" data-aos-delay="200">
				</div>

				<# } else { #>

				<div class="col-12 col-md-5 text-center">
					<img class="{{ settings.t6_image_shadow }}" src="{{ settings.t6_image.url }}" alt="{{ settings.t6_header_text }}" data-aos="fade-up" data-aos-delay="200">
				</div>

				<div class="col-12 offset-md-2 col-md-5 pb-70">
					<h2>{{{ settings.t6_header_text }}}</h2>
					<p class="lead">{{{ settings.t6_text }}}</p>

					<br>

					<# _.each( settings.t6_features, function( feature ) { #>
					<div class="flexbox gap-items-4">
						<div>
							<i class="{{ feature.icon }} fs-25 pt-4" style="color: {{ feature.color }}"></i>
						</div>

						<div>
							<h5>{{{ feature.title }}}</h5>
							<p>{{{ feature.text }}}</p>
						</div>
					</div>
					<# } ); #>

				</div>

				<# } #>

			</div>

		</div></section>
		<?php
	}

}
