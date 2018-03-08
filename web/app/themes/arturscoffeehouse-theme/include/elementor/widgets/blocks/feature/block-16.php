<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_16 {

	const ID = 16;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Video', 'thesaas' ),
			'header' => esc_html__( 'Explore', 'thesaas' ),
			'lead'   => esc_html__( 'Explore the best SaaS template in the market in a short 1-minute video.', 'thesaas' ),
		] );

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('bg-laptop.jpg') ] );
		The_Controls::add_btn_color( $widget, $id, [
			'default' => 'btn-danger',
			'label'   => 'Button color',
		] );
		The_Controls::add_video_link( $widget, $id, [ 'default' => 'https://www.youtube.com/watch?v=ah4pcPbRi2M' ] );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t16_image']['url'];

		?>
		<?php $widget->html('section_tag', [ 'class' => 'overflow-hidden' ]); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row">
        <div class="offset-md-2 col-md-8">

          <div class="video-btn-wrapper" data-aos="fade-up">
            <img class="shadow-2 rounded" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t16_header_text'] ); ?>">
            <a class="btn btn-circular btn-lg <?php echo esc_attr( $settings['t16_btn_color'] ); ?>" href="<?php echo esc_url( $settings['t16_video_link'] ); ?>" data-provide="lightbox"><i class="fa fa-play"></i></a>
          </div>

        </div>
			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row">
        <div class="offset-md-2 col-md-8">

          <div class="video-btn-wrapper" data-aos="fade-up">
            <img class="shadow-2 rounded" src="{{ settings.t16_image.url }}" alt="{{ settings.t16_header_text }}">
            <a class="btn btn-circular btn-lg {{ settings.t16_btn_color }}" href="{{ settings.t16_video_link }}" data-provide="lightbox"><i class="fa fa-play"></i></a>
          </div>

        </div>
			</div>

		</div></section>
		<?php
	}

}
