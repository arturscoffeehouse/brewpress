<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_8 {

	const ID = 8;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content' );

		The_Controls::start_section( $widget, 'features', $id );
		$widget->add_control(
			't'. $id .'_features',
			[
				'label' => esc_html__( 'Features', 'thesaas' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'icon' => 'icon-layers',
						'title' => esc_html__( 'Lego Base', 'thesaas' ),
						'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
					],
					[
						'icon' => 'icon-puzzle',
						'title' => esc_html__( 'Page Builder', 'thesaas' ),
						'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
					],
					[
						'icon' => 'icon-mobile',
						'title' => esc_html__( 'Responsive Design', 'thesaas' ),
						'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
					],
				],
				'fields' => [
					[
						'name' => 'icon',
						'label' => esc_html__( 'Icon class', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'color',
						'label' => esc_html__( 'Icon color', 'thesaas' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#b5b9bf',
					],
					[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'thesaas' ),
						'type' => Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Write a content', 'thesaas' ),
					],
					[
						'name' => 'more_text',
						'label' => esc_html__( 'Read more text', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Read more', 'thesaas' ),
						'label_block' => true,
					],
					[
						'name' => 'more_link',
						'label' => esc_html__( 'Read more link', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => 'http://',
						'label_block' => true,
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php foreach ( $settings['t8_features'] as $feature ) : ?>
				<div class="col-12 col-lg-4">
					<div class="card card-bordered text-center">
						<div class="card-block">
							<p><i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-50" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i></p>
							<h4 class="card-title"><?php echo $feature['title']; ?></h4>
							<p class="card-text"><?php echo $feature['text']; ?></p>
							<a class="fw-600 fs-12" href="<?php echo esc_url( $feature['more_link'] ); ?>"><?php echo $feature['more_text']; ?> <i class="fa fa-chevron-right fs-9 pl-5"></i></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row gap-y">

				<# _.each( settings.t8_features, function( feature ) { #>
					<div class="col-12 col-lg-4">
						<div class="card card-bordered text-center">
							<div class="card-block">
								<p><i class="{{ feature.icon }} fs-50" style="color: {{ feature.color }}"></i></p>
								<h4 class="card-title">{{{ feature.title }}}</h4>
								<p class="card-text">{{{ feature.text }}}</p>
								<a class="fw-600 fs-12" href="{{ feature.more_link }}">{{{ feature.more_text }}} <i class="fa fa-chevron-right fs-9 pl-5"></i></a>
							</div>
						</div>
					</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
