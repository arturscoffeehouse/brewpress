<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Signup_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_image', 'overlay' ],
			'bg_image' => thesaas_get_img_uri('placeholder-bg.jpg'),
			'overlay'  => 5,
		] );

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [
			'default' => esc_html__( 'Get started free', 'thesaas' ),
		] );
		The_Controls::add_text( $widget, $id, [
			'default' => esc_html__( 'Start to explore our product absolutely free.', 'thesaas' ),
		] );
		The_Controls::add_form_action_link( $widget, $id, ['default' => '#'] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Get started', 'thesaas' ),
			'size' => 'btn-lg',
			'block' => true,
			'color' => 'btn-success',
			'no_link' => true,
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'py-150' ]); ?>
			<h2 class="text-white text-center"><?php echo $settings['t1_header_text'] ?></h2>
			<p class="text-white text-center opacity-70 lead"><?php echo $settings['t1_text'] ?></p>
			<br>

			<form class="section-dialog section-dialog-sm bg-gray py-40" action="<?php echo esc_url( $settings['t1_form_action_link'] ) ?>" method="POST">
				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="name" class="form-control" placeholder="Name">
				</div>

				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>

				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-key"></i></span>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>

				<?php $widget->html('button', [ 'tag' => 'button' ]) ?>
			</form>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'py-150' ]); ?>
			<h2 class="text-white text-center">{{{ settings.t1_header_text }}}</h2>
			<p class="text-white text-center opacity-70 lead">{{{ settings.t1_text }}}</p>
			<br>

			<form class="section-dialog section-dialog-sm bg-gray py-40" action="{{ settings.t1_form_action_link }}" method="POST">
				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="name" class="form-control" placeholder="Name">
				</div>

				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>

				<div class="form-group input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-key"></i></span>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>

				<?php $widget->js('button', [ 'tag' => 'button' ]) ?>
			</form>

		</div></section>
		<?php
	}

}
