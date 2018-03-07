<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Html extends The_Widget {

	public function get_name() {
		//$this->load_blocks();
		return 'the-html';
	}

	public function get_title() {
		return esc_html__( 'HTML', 'thesaas' );
	}

	public function get_icon() {
		return 'eicon-coding';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'HTML Code', 'thesaas' ),
			]
		);

		$this->add_control(
			'html',
			[
				'label' => '',
				'type' => Controls_Manager::CODE,
				'default' => '
<section class="section bg-gray">
  <div class="container">
    <header class="section-header">
      <small>Cool</small>
      <h2>Starter Html Block</h2>
      <hr>
      <p class="lead">Design something cool by extending this code.</p>
    </header>


  </div>
</section>
				',
				'placeholder' => esc_html__( 'Enter your html code here', 'thesaas' ),
				'show_label' => false,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		 echo $this->get_settings( 'html' );
	}

	protected function _content_template() {
		?>
		{{{ settings.html }}}
		<?php
	}

}
