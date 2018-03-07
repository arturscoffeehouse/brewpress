<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_11 {

	const ID = 11;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content' );

		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_full( $widget, $id, [
			'default' => [
				[
					'icon' => 'icon-envelope',
					'title' => esc_html__( 'Subscription Ready', 'thesaas' ),
					'text' => esc_html__( 'MailChimp integration included', 'thesaas' ),
				],
				[
					'icon' => 'icon-layers',
					'title' => esc_html__( 'Block Variety', 'thesaas' ),
					'text' => esc_html__( 'Develop pages like lego', 'thesaas' ),
				],
				[
					'icon' => 'icon-paintbrush',
					'title' => esc_html__( 'Color Pallet', 'thesaas' ),
					'text' => esc_html__( 'Dozen of colors for elements', 'thesaas' ),
				],
				[
					'icon' => 'icon-puzzle',
					'title' => esc_html__( 'Page Builder', 'thesaas' ),
					'text' => esc_html__( 'Drag and drop page design', 'thesaas' ),
				],
			],
		] );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y text-center">

				<?php foreach ( $settings['t11_features'] as $feature ) : ?>
				<div class="col-12 col-md-6 col-lg-3">
					<p><i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-50" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i></p>
					<h5><?php echo $feature['title']; ?></h5>
					<p><?php echo $feature['text']; ?></p>
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

			<div class="row gap-y text-center">

				<# _.each( settings.t11_features, function( feature ) { #>
				<div class="col-12 col-md-6 col-lg-3">
					<p><i class="{{ feature.icon }} fs-50" style="color: {{ feature.color }}"></i></p>
					<h5>{{{ feature.title }}}</h5>
					<p>{{{ feature.text }}}</p>
				</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
