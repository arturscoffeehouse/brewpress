<?php
namespace TheThemeio\Elements;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Button extends Widget_Base {

	public function get_name() {
		return 'the-button';
	}

	public function need_common() {
		return false;
	}

	public function get_title() {
		return __( 'Button', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'basic' ];
	}


	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Basic', 'thesaas' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'thesaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Text', 'thesaas' ),
				'placeholder' => __( 'Button Text', 'thesaas' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'thesaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'thesaas' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'outline',
			[
				'label' => __( 'Outline', 'thesaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'thesaas' ),
				'label_on' => __( 'Yes', 'thesaas' ),
				'return_value' => 'btn-outline',
			]
		);

		$this->add_control(
			'round',
			[
				'label' => __( 'Rounded', 'thesaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'thesaas' ),
				'label_on' => __( 'Yes', 'thesaas' ),
				'return_value' => 'btn-round',
			]
		);

		$this->add_control(
			'circle',
			[
				'label' => __( 'Circle', 'thesaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'thesaas' ),
				'label_on' => __( 'Yes', 'thesaas' ),
				'return_value' => 'btn-circular',
			]
		);

		$this->add_control(
			'google',
			[
				'label' => __( 'Google Play badge', 'thesaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'thesaas' ),
				'label_on' => __( 'Yes', 'thesaas' ),
				'return_value' => thesaas_get_img_uri( 'badge-google.png' ),
			]
		);

		$this->add_control(
			'apple',
			[
				'label' => __( 'Apple Store badge', 'thesaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'thesaas' ),
				'label_on' => __( 'Yes', 'thesaas' ),
				'return_value' => thesaas_get_img_uri( 'badge-apple.png' ),
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Color', 'thesaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => [
					'primary'   => __( 'Default', 'thesaas' ),
					'secondary' => __( 'Secondary', 'thesaas' ),
					'info'      => __( 'Info', 'thesaas' ),
					'success'   => __( 'Success', 'thesaas' ),
					'warning'   => __( 'Warning', 'thesaas' ),
					'danger'    => __( 'Danger', 'thesaas' ),
					'white'     => __( 'White', 'thesaas' ),
					'dark'      => __( 'Dark', 'thesaas' ),
				],
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'thesaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => __( 'Extra Small', 'thesaas' ),
					'sm' => __( 'Small', 'thesaas' ),
					'md' => __( 'Medium', 'thesaas' ),
					'lg' => __( 'Large', 'thesaas' ),
					'xl' => __( 'Extra Large', 'thesaas' ),
				],
			]
		);



		$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! empty( $settings['google'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'link' ) .'><img src="'. $settings['google'] .'" alt="download on google play"></a>';
			return;
		}

		if ( ! empty( $settings['apple'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'link' ) .'><img src="'. $settings['apple'] .'" alt="download on app store"></a>';
			return;
		}

		$this->add_render_attribute( 'button', 'class', 'btn' );
		$this->add_render_attribute( 'button', 'class', 'btn-'. $settings['color'] );
		$this->add_render_attribute( 'button', 'class', 'btn-'. $settings['size'] );

		$this->add_render_attribute( 'button', 'class', $settings['round'] );
		$this->add_render_attribute( 'button', 'class', $settings['outline'] );
		$this->add_render_attribute( 'button', 'class', $settings['circle'] );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'button' ) .'>'. $settings['text'] .'</a>';
		}
		else {
			echo '<button '. $this->get_render_attribute_string( 'button' ) .'>'. $settings['text'] .'</button>';
		}



	}

	protected function _content_template() {
		?>
		<# if ( '' !== settings.google ) { #>
			<a href="{{ settings.link.url }}"><img src="{{ settings.google }}"></a>

		<# } else if ( '' !== settings.apple ) { #>
			<a href="{{ settings.link.url }}"><img src="{{ settings.apple }}"></a>

		<# } else { #>
			<a class="btn btn-{{ settings.size }} btn-{{ settings.color }} {{ settings.round }} {{ settings.outline }} {{ settings.circle }}" href="{{ settings.link.url }}">{{{ settings.text }}}</a>
		<# } #>
		<?php
	}
}
