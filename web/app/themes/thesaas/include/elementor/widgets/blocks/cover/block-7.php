<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Cover_Block_7 {

	const ID = 7;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'header_style', [
			'options' => [
		        'background' => 'color',
		        'overlay' => 0,
		        'padding_bottom' => 0,
			],
		]);

		The_Controls::start_section( $widget, 'content', $id );
		$widget->add_control(
			't'. $id .'_typing_text',
			[
				'label' => esc_html__( 'Typing Text', 'thesaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your words', 'thesaas' ),
				'default' => esc_html__( 'Software, Startup, WebApp', 'thesaas' ),
				'description' => esc_html__( 'Comma separated words', 'thesaas' ),
			]
		);

		$widget->add_control(
			't'. $id .'_typing_delay',
			[
        'label' => esc_html__( 'Backspace delay', 'thesaas' ),
        'type' => Controls_Manager::SLIDER,
        'default' => [
          'size' => 800,
          'unit' => 'px',
        ],
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 5000,
            'step' => 100,
          ],
        ],
			]
		);

		$widget->add_control(
			't'. $id .'_typing_color',
			[
				'label' => esc_html__( 'Typing color', 'thesaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0facf3',
			]
		);

		$widget->add_control(
			't'. $id .'_prefix',
			[
				'label' => esc_html__( 'Prefix Text', 'thesaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Built for', 'thesaas' ),
				'placeholder' => esc_html__( 'Text to display before typing texts.', 'thesaas' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			't'. $id .'_postfix',
			[
				'label' => esc_html__( 'Postfix Text', 'thesaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '', 'thesaas' ),
				'placeholder' => esc_html__( 'Text to display after typing texts.', 'thesaas' ),
				'label_block' => true,
			]
		);

		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'TheSaaS is an elegant, modern and fully customizable SaaS and WebApp template', 'thesaas' ) ] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Purchase Now - $49', 'thesaas' ),
			'size' => 'btn-lg',
			'round' => true,
			'color' => 'btn-primary',
		] );

		$widget->panel( 'info_text', [
			'text' => esc_html__( 'or purchase an Extended License', 'thesaas' ),
			'link' => '#',
		] );

		$widget->panel( 'flash_down', [
			'display' => true,
			'inverse' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$full_row = '';
		if ( 'yes' == $settings['t7_fullscreen'] ) {
			$full_row = 'h-full';
		}

    $typing_text = esc_attr( $settings['t7_typing_text'] );
    $typing_delay = intval( esc_attr( $settings['t7_typing_delay']['size'] ) );
    $typing_color = esc_attr( $settings['t7_typing_color'] );
		?>
		<?php $widget->html('header_tag'); ?>

      <div class="row <?php echo $full_row; ?>">
        <div class="col-12 text-center align-self-center">
          <h1 class="fs-50 fw-600 lh-15 hidden-sm-down"><?php echo $settings['t7_prefix']; ?> <span style="color: <?php echo $typing_color; ?>" data-typing="<?php echo $typing_text; ?>" data-delay="<?php echo $typing_delay; ?>"></span> <?php echo $settings['t7_postfix']; ?></h1>
          <h1 class="fs-35 fw-600 lh-15 hidden-md-up"><?php echo $settings['t7_prefix']; ?><br><span style="color: <?php echo $typing_color; ?>" data-typing="<?php echo $typing_text; ?>" data-delay="<?php echo $typing_delay; ?>"></span><br><?php echo $settings['t7_postfix']; ?></h1>
          <br>
          <p class="fs-20 hidden-sm-down"><?php echo $settings['t7_text']; ?></p>
          <p class="fs-16 hidden-md-up"><?php echo $settings['t7_text']; ?></p>
          <br>
          <hr class="w-60 hidden-sm-down">
          <br>
          <?php $widget->html('button'); ?>
          <br>
          <?php $widget->html('info'); ?>
        </div>

        <div class="col-12 align-self-end text-center pb-70">
          <?php $widget->html('flash_down'); ?>
        </div>
      </div>

		</div></header>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<#
		var full_row = '';
		if ( 'yes' == settings.t7_fullscreen ) {
			full_row = 'h-full';
		}
		#>
		<?php $widget->js('header_tag'); ?>

	    <div class="row {{ full_row }}">
	      <div class="col-12 text-center align-self-center">
	        <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">{{{ settings.t7_prefix }}} <span style="color: {{ settings.t7_typing_color }}" data-typing="{{ settings.t7_typing_text }}" data-delay="{{ settings.t7_typing_delay.size }}"></span> {{{ settings.t7_postfix }}}</h1>
	        <h1 class="fs-35 fw-600 lh-15 hidden-md-up">{{{ settings.t7_prefix }}}<br><span style="color: {{ settings.t7_typing_color.size }}" data-typing="{{ settings.t7_typing_text }}" data-delay="{{ settings.t7_typing_delay }}"></span><br>{{{ settings.t7_postfix }}}</h1>
	        <br>
	        <p class="fs-20 hidden-sm-down">{{{ settings.t7_text }}}</p>
	        <p class="fs-16 hidden-md-up">{{{ settings.t7_text }}}</p>
	        <br>
	        <hr class="w-60 hidden-sm-down">
	        <br>
	        <?php $widget->js('button'); ?>
	        <br>
	        <?php $widget->js('info'); ?>
	      </div>

	      <div class="col-12 align-self-end text-center pb-70">
	        <?php $widget->js('flash_down'); ?>
	      </div>
	    </div>

		</div></header>
		<?php
	}

}
