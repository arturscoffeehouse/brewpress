<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => '',
			'header' => esc_html__( 'More Features', 'thesaas' ),
			'lead'   => esc_html__( 'We are so excited and proud of our product. It\'s really easy to create a landing page for your awesome product.', 'thesaas' ),
		] );

		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_slim( $widget, $id );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php foreach ( $settings['t2_features'] as $feature ) : ?>
					<div class="col-12 col-md-6 col-xl-4 feature-1">
						<p class="feature-icon" style="color: <?php echo esc_attr( $feature['color'] ); ?>"><i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i></p>
						<p class="lead"><?php echo $feature['text']; ?></p>
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

				<# _.each( settings.t2_features, function( feature ) { #>
					<div class="col-12 col-md-6 col-xl-4 feature-1">
						<p class="feature-icon" style="color: {{ feature.color }}"><i class="{{ feature.icon }}"></i></p>
						<p class="lead">{{{ feature.text }}}</p>
					</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
