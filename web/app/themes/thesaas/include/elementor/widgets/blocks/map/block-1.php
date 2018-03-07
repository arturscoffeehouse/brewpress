<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Map_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'google_map' );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );

		$settings = $widget->get_settings();

		$lat = esc_attr( $settings['t1_lat'] );
		$lng = esc_attr( $settings['t1_lng'] );
		$zoom = esc_attr( $settings['t1_zoom']['size'] );
		$height = esc_attr( $settings['t1_height']['size'] );
		$skin = esc_attr( $settings['t1_skin'] );
		?>
		<div data-provide="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-marker-lat="<?php echo $lat; ?>" data-marker-lng="<?php echo $lng; ?>" data-zoom="<?php echo $zoom; ?>" data-style="<?php echo $skin; ?>" style="height: <?php echo $height; ?>px"></div>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<div data-provide="map" data-lat="{{ settings.t1_lat }}" data-lng="{{ settings.t1_lng }}" data-marker-lat="{{ settings.t1_lat }}" data-marker-lng="{{ settings.t1_lng }}" data-zoom="{{ settings.t1_zoom.size }}" data-style="{{ settings.t1_skin }}" style="height: {{ settings.t1_height.size }}px"></div>
		<?php
	}

}
