<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Contact_Block_1 {

  const ID = 1;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
    ] );

    $widget->panel( 'contact_detail' );



    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    // Contact Form 7 is activated
    //
    if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
     

      The_Controls::start_section( $widget, 'contact_form', $id );

      $widget->add_control(
        't'. $id .'_use_cf7',
        The_Controls::option_switch( esc_html__( 'Use Contact Form 7', 'thesaas' ), [], [
          'default' => '',
          'return' => 'yes',
        ] )
      );


      $cf7forms = get_posts( array( 
                    'post_type' => 'wpcf7_contact_form',
                    'posts_per_page' => -1 
                  ) );

      $forms = array();
      foreach ($cf7forms as $key => $form) {
        $forms[ $form->ID ] = $form->post_title;
      }

      $widget->add_control(
        't'. $id .'_cf7_id',
        The_Controls::option_select( esc_html__( 'Select a form', 'thesaas' ), [], [
          'options' => $forms,
          'condition' => [
            't'. $id .'_use_cf7' => 'yes',
          ]
        ] )
      );

      $widget->add_control(
        't'. $id .'_email_to',
        [
          'label' => esc_html__( 'To', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => get_option('admin_email'),
          'description' => esc_html__( 'An email address to receive the form data.', 'thesaas' ),
          'label_block' => true,
          'condition' => [
            't'. $id .'_use_cf7' => '',
          ]
        ]
      );

      $widget->add_control(
        't'. $id .'_email_subject',
        [
          'label' => esc_html__( 'Subject', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => get_bloginfo('name') .' '. esc_html__( 'contact', 'thesaas' ),
          'label_block' => true,
          'condition' => [
            't'. $id .'_use_cf7' => '',
          ]
        ]
      );

      $widget->add_control(
        't'. $id .'_success_msg',
        [
          'label' => esc_html__( 'Success message', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'We received your message and will contact you back soon.', 'thesaas' ),
          'description' => esc_html__( 'A text to be display after submiting form.', 'thesaas' ),
          'label_block' => true,
          'condition' => [
            't'. $id .'_use_cf7' => '',
          ]
        ]
      );


      $widget->add_control(
        't'. $id .'_error_msg',
        [
          'label' => esc_html__( 'Error message', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'There is a problem in our email service. Please try again later.', 'thesaas' ),
          'description' => esc_html__( 'A text to be display if an error occurred.', 'thesaas' ),
          'label_block' => true,
          'condition' => [
            't'. $id .'_use_cf7' => '',
          ]
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_name',
        [
          'label' => esc_html__( 'Placeholder of name input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Name', 'thesaas' ),
          'label_block' => true,
          'separator' => 'before',
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_email',
        [
          'label' => esc_html__( 'Placeholder of email input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Email Address', 'thesaas' ),
          'label_block' => true,
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_message',
        [
          'label' => esc_html__( 'Placeholder of message input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Message', 'thesaas' ),
          'label_block' => true,
        ]
      );

      The_Controls::end_section( $widget );


      $widget->panel( 'button', [
        'text' => esc_html__( 'Send enquiry', 'thesaas' ),
        'size' => 'btn-lg',
        'block' => true,
        'color' => 'btn-primary',
        'no_link' => true,
        'section_condition' => [
          't'. $id .'_use_cf7' => '',
        ]
      ] );

    }

    // There's no Contact Form 7
    //
    else {


      The_Controls::start_section( $widget, 'contact_form', $id );

      $widget->add_control(
        't'. $id .'_email_to',
        [
          'label' => esc_html__( 'To', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => get_option('admin_email'),
          'description' => esc_html__( 'An email address to receive the form data.', 'thesaas' ),
          'label_block' => true,
        ]
      );

      $widget->add_control(
        't'. $id .'_email_subject',
        [
          'label' => esc_html__( 'Subject', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => get_bloginfo('name') .' '. esc_html__( 'contact', 'thesaas' ),
          'label_block' => true,
        ]
      );

      $widget->add_control(
        't'. $id .'_success_msg',
        [
          'label' => esc_html__( 'Success message', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'We received your message and will contact you back soon.', 'thesaas' ),
          'description' => esc_html__( 'A text to be display after submiting form.', 'thesaas' ),
          'label_block' => true,
        ]
      );


      $widget->add_control(
        't'. $id .'_error_msg',
        [
          'label' => esc_html__( 'Error message', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'There is a problem in our email service. Please try again later.', 'thesaas' ),
          'description' => esc_html__( 'A text to be display if an error occurred.', 'thesaas' ),
          'label_block' => true,
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_name',
        [
          'label' => esc_html__( 'Placeholder of name input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Name', 'thesaas' ),
          'label_block' => true,
          'separator' => 'before',
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_email',
        [
          'label' => esc_html__( 'Placeholder of email input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Email Address', 'thesaas' ),
          'label_block' => true,
        ]
      );


      $widget->add_control(
        't'. $id .'_placeholder_message',
        [
          'label' => esc_html__( 'Placeholder of message input', 'thesaas' ),
          'type' => Controls_Manager::TEXT,
          'default' => esc_html__( 'Your Message', 'thesaas' ),
          'label_block' => true,
        ]
      );


      The_Controls::end_section( $widget );


      $widget->panel( 'button', [
        'text' => esc_html__( 'Send enquiry', 'thesaas' ),
        'size' => 'btn-lg',
        'block' => true,
        'color' => 'btn-primary',
        'no_link' => true,
      ] );

      }


  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();

    $use_cf7 = false;
    $cf7_id = 0;
    if ( isset( $settings['t1_use_cf7'] ) && 'yes' == $settings['t1_use_cf7'] ) {
      $use_cf7 = true;
      $cf7_id = $settings['t1_cf7_id'];
    }

    ?>
    <?php $widget->html('section_tag'); ?>

      <div class="row gap-y">
        <div class="col-12 col-md-6">
          <?php if ( $use_cf7 ): ?>

            <?php echo do_shortcode('[contact-form-7 id="'. $cf7_id .'"]'); ?>

          <?php else: ?>

            <form action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" method="POST" data-form="mailer">
              <div class="alert alert-success"><?php echo $settings['t1_success_msg'] ?></div>

              <input type="hidden" name="action" value="contact_send">
              <input type="hidden" name="error-msg" value="<?php echo esc_attr( $settings['t1_error_msg'] ); ?>">
              <input type="hidden" name="to" value="<?php echo esc_attr( $settings['t1_email_to'] ); ?>">
              <input type="hidden" name="subject" value="<?php echo esc_attr( $settings['t1_email_subject'] ); ?>">

              <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="name" placeholder="<?php echo esc_attr( $settings['t1_placeholder_name'] ); ?>">
              </div>

              <div class="form-group">
                <input class="form-control form-control-lg" type="email" name="email" placeholder="<?php echo esc_attr( $settings['t1_placeholder_email'] ); ?>">
              </div>

              <div class="form-group">
                <textarea class="form-control form-control-lg" name="message" rows="4" placeholder="<?php echo esc_attr( $settings['t1_placeholder_message'] ); ?>"></textarea>
              </div>

              <?php $widget->html('button', [ 'tag' => 'button' ]) ?>
            </form>

          <?php endif; ?>

        </div>


        <div class="col-12 col-md-5 offset-md-1">
          <div class="bg-grey h-full p-20">
            <?php echo $settings['t1_editor'] ?>

            <hr class="w-80">

            <p class="lead"><?php echo nl2br( $settings['t1_address'] ); ?></p>

            <?php if ( '' !== $settings['t1_email'] ) : ?>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Email">E:</span>
              <span class="fs-14"><?php echo $settings['t1_email']; ?></span>
            </div>
            <?php endif; ?>

            <?php if ( '' !== $settings['t1_phone'] ) : ?>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Phone">P:</span>
              <span class="fs-14"><?php echo $settings['t1_phone']; ?></span>
            </div>
            <?php endif; ?>

            <?php if ( '' !== $settings['t1_fax'] ) : ?>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Fax">F:</span>
              <span class="fs-14"><?php echo $settings['t1_fax']; ?></span>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>

    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );
    ?>
    <#

    function nl2br (str, is_xhtml) {
       var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
       return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

    #>
    <?php $widget->js('section_tag'); ?>

      <div class="row gap-y">
        <div class="col-12 col-md-6">

          <# if ( 'yes' == settings.t1_use_cf7 ) { #>

            <p>[contact-form-7 id="{{{ settings.t1_cf7_id }}}"]</p>

          <# } else { #>

            <form action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" method="POST" data-form="mailer">
              <div class="alert alert-success">{{{ settings.t1_success_msg }}}</div>

              <input type="hidden" name="action" value="contact_send">
              <input type="hidden" name="error-msg" value="{{ settings.t1_error_msg }}">
              <input type="hidden" name="to" value="{{ settings.t1_email_to }}">
              <input type="hidden" name="subject" value="{{ settings.t1_email_subject }}">

              <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="name" placeholder="{{ settings.t1_placeholder_name }}">
              </div>

              <div class="form-group">
                <input class="form-control form-control-lg" type="email" name="email" placeholder="{{ settings.t1_placeholder_email }}">
              </div>

              <div class="form-group">
                <textarea class="form-control form-control-lg" name="message" rows="4" placeholder="{{ settings.t1_placeholder_message }}"></textarea>
              </div>

              <?php $widget->js('button', [ 'tag' => 'button' ]) ?>
            </form>

          <# } #>

        </div>


        <div class="col-12 col-md-5 offset-md-1">
          <div class="bg-grey h-full p-20">
            {{{ settings.t1_editor }}}

            <hr class="w-80">

            <p class="lead">{{{ nl2br( settings.t1_address ) }}}</p>

            <# if ( '' !== settings.t1_email ) { #>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Email">E:</span>
              <span class="fs-14">{{{ settings.t1_email }}}</span>
            </div>
            <# } #>

            <# if ( '' !== settings.t1_phone ) { #>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Phone">P:</span>
              <span class="fs-14">{{{ settings.t1_phone }}}</span>
            </div>
            <# } #>

            <# if ( '' !== settings.t1_fax ) { #>
            <div>
              <span class="d-inline-block w-20 text-lighter" title="Fax">F:</span>
              <span class="fs-14">{{{ settings.t1_fax }}}</span>
            </div>
            <# } #>

          </div>
        </div>
      </div>


    </div></section>
    <?php
  }

}
