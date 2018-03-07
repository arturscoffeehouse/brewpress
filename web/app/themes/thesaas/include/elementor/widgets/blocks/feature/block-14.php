<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_14 {

	const ID = 14;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray', 'switch_sides' ],
			'switch_sides' => true,
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_fade_text( $widget, $id, [ 'default' => esc_html__( '01', 'thesaas' ) ] );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Choose your product', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing. Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('header-typing.jpg') ] );
		The_Controls::add_image_shadow( $widget, $id );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t14_image']['url'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'py-70' ]); ?>

			<?php if ( 'yes' == $settings['t14_switch_sides'] ) : ?>

	          <div class="row gap-y align-items-center">
	            <div class="col-12 col-md-5 offset-md-1 text-center text-md-left order-md-last">
	              <p class="fs-60 fw-900 opacity-10"><?php echo $settings['t14_fade_text'] ?></p>
	              <h3 class="fw-300"><?php echo $settings['t14_header_text'] ?></h3>
	              <p><?php echo $settings['t14_text'] ?></p>
	            </div>

              <div class="col-12 col-md-6 text-center order-md-first">
                <img class="<?php echo esc_attr( $settings['t14_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t14_header_text'] ); ?>">
              </div>
	          </div>

			<?php else: ?>


	          <div class="row gap-y align-items-center">
	            <div class="col-12 col-md-5 text-center text-md-left">
	              <p class="fs-60 fw-900 opacity-10"><?php echo $settings['t14_fade_text'] ?></p>
	              <h3 class="fw-300"><?php echo $settings['t14_header_text'] ?></h3>
	              <p><?php echo $settings['t14_text'] ?></p>
	            </div>

	            <div class="col-12 col-md-6 offset-md-1 text-center">
	              <img class="<?php echo esc_attr( $settings['t14_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t14_header_text'] ); ?>">
	            </div>
	          </div>

			<?php endif; ?>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'py-70' ]); ?>


			<# if ( 'yes' == settings.t14_switch_sides ) { #>

        <div class="row gap-y align-items-center">
          <div class="col-12 col-md-5 offset-md-1 text-center text-md-left order-md-last">
            <p class="fs-60 fw-900 opacity-10">{{{ settings.t14_fade_text }}}</p>
            <h3 class="fw-300">{{{ settings.t14_header_text }}}</h3>
            <p>{{{ settings.t14_text }}}</p>
          </div>

          <div class="col-12 col-md-6 text-center order-md-first">
            <img class="{{ settings.t14_image_shadow }}" src="{{ settings.t14_image.url }}" alt="{{ settings.t14_header_text }}">
          </div>
        </div>

			<# } else { #>

        <div class="row gap-y align-items-center">
          <div class="col-12 col-md-5 text-center text-md-left">
            <p class="fs-60 fw-900 opacity-10">{{{ settings.t14_fade_text }}}</p>
            <h3 class="fw-300">{{{ settings.t14_header_text }}}</h3>
            <p>{{{ settings.t14_text }}}</p>
          </div>

          <div class="col-12 col-md-6 offset-md-1 text-center">
            <img class="{{ settings.t14_image_shadow }}" src="{{ settings.t14_image.url }}" alt="{{ settings.t14_header_text }}">
          </div>
        </div>

			<# } #>


		</div></section>
		<?php
	}

}
