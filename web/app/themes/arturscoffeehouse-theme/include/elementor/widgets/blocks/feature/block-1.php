<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Features', 'thesaas' ),
			'header' => esc_html__( 'Great Combination', 'thesaas' ),
			'lead'   => esc_html__( 'Holisticly implement fully tested process improvements rather than dynamic internal.', 'thesaas' ),
		] );


		The_Controls::start_section( $widget, 'image', $id );
		The_Controls::add_image( $widget, $id, [ 'default' => thesaas_get_img_uri('feature-tablet.png') ] );
		The_Controls::add_image_shadow( $widget, $id );
		The_Controls::end_section( $widget );


		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_columns( $widget, $id, [
			'min' => 2,
			'max' => 4,
			'default' => 3,
		]);
		The_Controls::add_feature_full( $widget, $id, [
			'default' => [
				[
					'icon' => 'fa fa-tv',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'Responsive', 'thesaas' ),
					'text' => esc_html__( 'Your landing page displays smoothly on any device: desktop, tablet or mobile.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-wrench',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'Customizable', 'thesaas' ),
					'text' => esc_html__( 'You can easily read, edit, and write your own code, or change everything.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-cubes',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'UI Elements', 'thesaas' ),
					'text' => esc_html__( 'There is a bunch of useful and necessary elements for developing your website.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-code',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'Clean Code', 'thesaas' ),
					'text' => esc_html__( 'You can find our code well organized, commented and readable.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-file-text-o',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'Documented', 'thesaas' ),
					'text' => esc_html__( 'As you can see in the source code, we provided a comprehensive documentation.', 'thesaas' ),
				],
				[
					'icon' => 'fa fa-download',
					'color' => '#e4e7ea',
					'title' => esc_html__( 'Free Updates', 'thesaas' ),
					'text' => esc_html__( 'When you purchase this template, you\'ll freely receive future updates.', 'thesaas' ),
				],
			],
		] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'See more features', 'thesaas' ),
			'size' => 'btn-lg',
			'color' => 'btn-primary',
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t1_image']['url'];
		$col_size = $settings['t1_columns']['size'];

		$col_class = 'col-12 col-md-6 col-xl-4';
		switch ( $col_size ) {
			case 2:
				$col_class = 'col-12 col-md-6';
				break;

			case 4:
				$col_class = 'col-12 col-md-6 col-xl-3';
				break;
		}
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php if ( ! empty( $image ) ) : ?>
				<div class="col-12 offset-md-2 col-md-8 mb-30">
					<img class="<?php echo esc_attr( $settings['t1_image_shadow'] ); ?>" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['t1_header_text'] ); ?>" data-aos="fade-up" data-aos-duration="2000">
				</div>
				<?php endif; ?>


				<?php foreach ( $settings['t1_features'] as $feature ) : ?>
				<div class="<?php echo $col_class; ?>">
					<div class="flexbox gap-items-4">
						<div>
							<i class="<?php echo esc_attr( $feature['icon'] ); ?> fs-25 pt-4" style="color: <?php echo esc_attr( $feature['color'] ); ?>"></i>
						</div>

						<div class="flex-grow">
							<h5><?php echo $feature['title']; ?></h5>
							<p><?php echo $feature['text']; ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>


				<?php if ( ! empty( $settings['t1_btn_text'] ) ) : ?>
				<div class="col-12 text-center">
					<br><br>
					<?php $widget->html('button'); ?>
				</div>
				<?php endif; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<#
				var col_size = settings.t1_columns.size;
				var col_class = 'col-12 col-md-6 col-xl-4';
				switch ( col_size ) {
					case 2:
						col_class = 'col-12 col-md-6';
						break;

					case 4:
						col_class = 'col-12 col-md-6 col-xl-3';
						break;
				}
			#>

			<div class="row gap-y">

				<# if ( '' !== settings.t1_image.url ) { #>
				<div class="col-12 offset-md-2 col-md-8 mb-30">
					<img class="{{ settings.t1_image_shadow }}" src="{{ settings.t1_image.url }}" alt="{{ settings.t1_header_text }}" data-aos="fade-up" data-aos-duration="2000">
				</div>
				<# } #>

				<# _.each( settings.t1_features, function( feature ) { #>
				<div class="{{ col_class }}">
					<div class="flexbox gap-items-4">
						<div>
							<i class="{{ feature.icon }} fs-25 pt-4" style="color: {{ feature.color }}"></i>
						</div>

						<div class="flex-grow">
							<h5>{{{ feature.title }}}</h5>
							<p>{{{ feature.text }}}</p>
						</div>
					</div>
				</div>
				<# } ); #>


				<# if ( '' !== settings.t1_btn_text ) { #>
				<div class="col-12 text-center">
					<br><br>
					<?php $widget->js('button'); ?>
				</div>
				<# } #>

			</div>

		</div></section>
		<?php
	}

}
