<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Signup_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Meet TheSaaS', 'thesaas' ),
			'header' => esc_html__( '30 Days Free Trial', 'thesaas' ),
			'lead'   => esc_html__( 'We waited until we could do it right. Then we did! Instead of creating a carbon copy.', 'thesaas' ),
		] );

		The_Controls::start_section( $widget, 'form', $id );
		The_Controls::add_form_action_link( $widget, $id, ['default' => '#'] );
		The_Controls::end_section( $widget );

		$widget->panel( 'button', [
			'text' => esc_html__( 'Sign up', 'thesaas' ),
			'size' => 'btn-lg',
			'block' => true,
			'color' => 'btn-success',
			'no_link' => true,
		] );

		$widget->panel( 'info_text', [
			'text' => esc_html__( 'Signup with Facebook', 'thesaas' ),
			'link' => '#',
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'text-center' ]); ?>
			<?php $widget->html('section_header', [ 'class' => 'fs-50' ]); ?>

	        <div class="row">
	          <div class="col-12 offset-md-3 col-md-6 offset-lg-4 col-lg-4">
	            <form action="<?php echo esc_url( $settings['t2_form_action_link'] ) ?>" method="POST">
	              <div class="form-group">
	                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
	              </div>

	              <div class="form-group">
	                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
	              </div>

	              <div class="form-group">
	                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
	              </div>

	              <?php $widget->html('button', [ 'tag' => 'button' ]) ?>
	            </form>

	            <br>
	            <?php $widget->html('info'); ?>
	          </div>
	        </div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'text-center' ]); ?>
			<?php $widget->js('section_header', [ 'class' => 'fs-50' ]); ?>

	        <div class="row">
	          <div class="col-12 offset-md-3 col-md-6 offset-lg-4 col-lg-4">
	            <form action="{{ settings.t2_form_action_link }}" method="POST">
	              <div class="form-group">
	                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
	              </div>

	              <div class="form-group">
	                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
	              </div>

	              <div class="form-group">
	                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
	              </div>

	              <?php $widget->js('button', [ 'tag' => 'button' ]) ?>
	            </form>

	            <br>
	            <?php $widget->js('info'); ?>
	          </div>
	        </div>

		</div></section>
		<?php
	}

}
