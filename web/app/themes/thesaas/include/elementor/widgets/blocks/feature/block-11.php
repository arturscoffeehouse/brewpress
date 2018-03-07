<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_11 {

	const ID = 11;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Features', 'thesaas' ),
			'header' => esc_html__( 'More to Discover', 'thesaas' ),
			'lead'   => esc_html__( 'We waited until we could do it right. Then we did! Instead of creating a carbon copy.', 'thesaas' ),
		] );


		The_Controls::start_section( $widget, 'content', $id );
		$widget->add_control(
			't'. $id .'_features',
			[
				'label' => esc_html__( 'Feature list', 'thesaas' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'image' => [ 'url' => thesaas_get_img_uri( 'header-image.jpg' ) ],
						'title' => esc_html__( '5 Ready Samples', 'thesaas' ),
						'text' => esc_html__( 'Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing. Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing.', 'thesaas' ),
					],
					[
						'image' => [ 'url' => thesaas_get_img_uri( 'header-video.jpg' ) ],
						'title' => esc_html__( '6 Header Types', 'thesaas' ),
						'text' => esc_html__( 'Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing. Monotonectally leverage existing standards compliant ideas with distributed data. Efficiently simplify cross-unit systems whereas adaptive testing.', 'thesaas' ),
					],
				],
				'fields' => [
					[
						'name' => 'image',
						'label' => esc_html__( 'Image', 'thesaas' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => thesaas_get_img_uri( 'placeholder.jpg' ),
						],
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
				],
				'title_field' => '{{{ title }}}',
			]
		);
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$counter = 0;
		$max = count( $settings['t11_features'] );
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<?php foreach ( $settings['t11_features'] as $feature ) : $counter++; ?>
				<?php if ( 1 == $counter % 2 ) : ?>

					<div class="row gap-y align-items-center">
						<div class="col-12 col-md-7 order-md-last">
							<h4><?php echo $feature['title']; ?></h4>
							<p><?php echo $feature['text']; ?></p>
						</div>


						<div class="col-12 col-md-5 order-md-first">
							<img class="rounded shadow-2" src="<?php echo esc_url( $feature['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t11_header_text'] ); ?>">
						</div>
					</div>

				<?php else : ?>

					<div class="row gap-y align-items-center">
						<div class="col-12 col-md-7">
							<h4><?php echo $feature['title']; ?></h4>
							<p><?php echo $feature['text']; ?></p>
						</div>

						<div class="col-12 col-md-5">
							<img class="rounded shadow-2" src="<?php echo esc_url( $feature['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t11_header_text'] ); ?>">
						</div>
					</div>

				<?php endif; ?>

				<?php if ( $counter < $max ) : ?>
				<br>
				<hr>
				<br>
				<?php endif; ?>

			<?php endforeach; ?>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<#
				var counter = 0;
				var max = settings.t11_features.length;
			#>

			<# _.each( settings.t11_features, function( feature ) { counter++; #>
				<# if ( 1 == counter % 2 ) { #>

					<div class="row gap-y align-items-center">
						<div class="col-12 col-md-7 order-md-last">
							<h4>{{{ feature.title }}}</h4>
							<p>{{{ feature.text }}}</p>
						</div>


						<div class="col-12 col-md-5 order-md-first">
							<img class="rounded shadow-2" src="{{ feature.image.url }}" alt="{{ settings.t11_header_text }}">
						</div>
					</div>

				<# } else { #>

					<div class="row gap-y align-items-center">
						<div class="col-12 col-md-7">
							<h4>{{{ feature.title }}}</h4>
							<p>{{{ feature.text }}}</p>
						</div>

						<div class="col-12 col-md-5">
							<img class="rounded shadow-2" src="{{ feature.image.url }}" alt="{{ settings.t11_header_text }}">
						</div>
					</div>

				<# } #>

				<# if ( counter < max ) { #>
				<br>
				<hr>
				<br>
				<# } #>

			<# } ); #>

		</div></section>
		<?php
	}

}
