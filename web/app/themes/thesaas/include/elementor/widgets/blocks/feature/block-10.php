<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_10 {

	const ID = 10;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray', 'switch_sides' ],
			'switch_sides' => true,
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Unlimited Layout Option', 'thesaas' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Energistically transform pandemic manufactured products whereas premier solutions. Compellingly streamline an expanded array of web-readiness rather.', 'thesaas' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('header-gradient.jpg') ] );
		The_Controls::add_image_shadow( $widget, $id, [ 'default' => true ] );
		The_Controls::end_section( $widget );


		The_Controls::start_section( $widget, 'list', $id );
		$widget->add_control(
			't'. $id .'_list',
			[
				'label' => esc_html__( 'Feature list', 'thesaas' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => esc_html__( 'MailChimp integration included', 'thesaas' ),
					],
					[
						'text' => esc_html__( 'Develop pages like lego', 'thesaas' ),
					],
					[
						'text' => esc_html__( 'Dozen of colors for elements', 'thesaas' ),
					],
					[
						'text' => esc_html__( 'Drag and drop page design', 'thesaas' ),
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);
		The_Controls::end_section( $widget );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t10_image']['url'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'overflow-hidden py-150' ]); ?>

			<div class="row gap-y align-items-center">

			<?php if ( 'yes' == $settings['t10_switch_sides'] ) : ?>

				<div class="col-12 col-md-6">
					<h2><?php echo $settings['t10_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t10_text'] ?></p>

					<br>

					<?php foreach ( $settings['t10_list'] as $item ) : ?>
					<p>
						<i class="ti-check text-success mr-8"></i>
						<span class="fs-14"><?php echo $item['text']; ?></span>
					</p>
					<?php endforeach; ?>
				</div>

				<div class="col-md-5 offset-md-1 align-self-center mt-40">
					<img class="<?php echo esc_attr( $settings['t10_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t10_header_text'] ); ?>">
				</div>

			<?php else: ?>

				<div class="col-12 col-md-6 offset-md-1 order-md-last">
					<h2><?php echo $settings['t10_header_text'] ?></h2>
					<p class="lead"><?php echo $settings['t10_text'] ?></p>

					<br>

					<?php foreach ( $settings['t10_list'] as $item ) : ?>
					<p>
						<i class="ti-check text-success mr-8"></i>
						<span class="fs-14"><?php echo $item['text']; ?></span>
					</p>
					<?php endforeach; ?>
				</div>

				<div class="col-md-5 align-self-center order-md-first mt-40">
					<img class="<?php echo esc_attr( $settings['t10_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t10_header_text'] ); ?>">
				</div>

			<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'overflow-hidden py-150' ]); ?>

			<div class="row gap-y align-items-center">

			<# if ( 'yes' == settings.t10_switch_sides ) { #>

				<div class="col-12 col-lg-6">
					<h2>{{{ settings.t10_header_text }}}</h2>
					<p class="lead">{{{ settings.t10_text }}}</p>

					<br>

					<# _.each( settings.t10_list, function( item ) { #>
					<p>
						<i class="ti-check text-success mr-8"></i>
						<span class="fs-14">{{{ item.text }}}</span>
					</p>
					<# } ); #>
				</div>

				<div class="col-lg-5 offset-lg-1 align-self-center mt-40">
					<img class="{{ settings.t10_image_shadow }}" src="{{ settings.t10_image.url }}" alt="{{ settings.t10_header_text }}">
				</div>

			<# } else { #>

				<div class="col-12 col-lg-6 offset-lg-1 order-md-last">
					<h2>{{{ settings.t10_header_text }}}</h2>
					<p class="lead">{{{ settings.t10_text }}}</p>

					<br>

					<# _.each( settings.t10_list, function( item ) { #>
					<p>
						<i class="ti-check text-success mr-8"></i>
						<span class="fs-14">{{{ item.text }}}</span>
					</p>
					<# } ); #>
				</div>

				<div class="col-lg-5 align-self-center order-md-first mt-40">
					<img class="{{ settings.t10_image_shadow }}" src="{{ settings.t10_image.url }}" alt="{{ settings.t10_header_text }}">
				</div>

			<# } #>

			</div>

		</div></section>
		<?php
	}

}
