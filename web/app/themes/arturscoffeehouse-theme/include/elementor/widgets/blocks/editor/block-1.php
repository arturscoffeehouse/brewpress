<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Editor_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Header', 'thesaas' ),
			'header' => esc_html__( 'Sample Header Text', 'thesaas' ),
			'lead'   => esc_html__( 'A short default text to display inside a lead paragraph.', 'thesaas' ),
		] );

		$widget->panel( 'text', [
			'editor' => esc_html__( 'I am text block. You can change this text using the left-side panel.', 'thesaas' )
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$content = $widget->parse_text_editor( $widget->get_settings('t1_editor') );
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>
			<?php echo $content; ?>
		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>
			{{{ settings.t1_editor }}}
		</div></section>
		<?php
	}

}
