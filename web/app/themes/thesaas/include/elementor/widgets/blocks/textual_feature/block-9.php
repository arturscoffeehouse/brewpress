<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_9 {

	const ID = 9;

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
						'icon' => 'icon-mobile',
						'title' => esc_html__( 'Responsive', 'thesaas' ),
					],
					[
						'icon' => 'icon-gears',
						'title' => esc_html__( 'Customizable', 'thesaas' ),
					],
					[
						'icon' => 'icon-tools',
						'title' => esc_html__( 'UI Elements', 'thesaas' ),
					],
					[
						'icon' => 'icon-recycle',
						'title' => esc_html__( 'Clean Code', 'thesaas' ),
					],
					[
						'icon' => 'icon-browser',
						'title' => esc_html__( 'Browser Support', 'thesaas' ),
					],
					[
						'icon' => 'icon-paintbrush',
						'title' => esc_html__( 'Color Pallet', 'thesaas' ),
					],
					[
						'icon' => 'icon-puzzle',
						'title' => esc_html__( 'Page Builder', 'thesaas' ),
					],
					[
						'icon' => 'icon-newspaper',
						'title' => esc_html__( 'Documentation', 'thesaas' ),
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
						'name' => 'link',
						'label' => esc_html__( 'Link', 'thesaas' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => 'http://',
						'default' => '#',
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

				<?php foreach ( $settings['t9_features'] as $feature ) : ?>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card card-bordered card-hover-shadow text-center">
						<a class="card-block" href="<?php echo esc_url( $feature['link'] ); ?>">
							<p><i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-50" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i></p>
							<h4 class="card-title"><?php echo $feature['title']; ?></h4>
						</a>
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

				<# _.each( settings.t9_features, function( feature ) { #>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card card-bordered card-hover-shadow text-center">
						<a class="card-block" href="{{ feature.link }}">
							<p><i class="{{ feature.icon }} fs-50" style="color: {{ feature.color }}"></i></p>
							<h4 class="card-title">{{{ feature.title }}}</h4>
						</a>
					</div>
				</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
