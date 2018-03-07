<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Contact_Block_2 {

  const ID = 2;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
    ] );

    $widget->panel( 'header_content', [
      'header' => esc_html__( 'Lets Get In Touch', 'thesaas' ),
    ] );



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
        'text' => esc_html__( 'Submit Enquiry', 'thesaas' ),
        'size' => 'btn-lg',
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
        'text' => esc_html__( 'Submit Enquiry', 'thesaas' ),
        'size' => 'btn-lg',
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
    if ( isset( $settings['t2_use_cf7'] ) && 'yes' == $settings['t2_use_cf7'] ) {
      $use_cf7 = true;
      $cf7_id = $settings['t2_cf7_id'];
    }

    ?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

      <div class="row gap-y">
        <div class="col-12 col-lg-6 offset-lg-3">
          <?php if ( $use_cf7 ): ?>

            <?php echo do_shortcode('[contact-form-7 id="'. $cf7_id .'"]'); ?>

          <?php else: ?>

            <form class="p-30 bg-gray rounded" action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" method="POST" data-form="mailer">
              <div class="alert alert-success"><?php echo $settings['t2_success_msg'] ?></div>

              <input type="hidden" name="action" value="contact_send">
              <input type="hidden" name="error-msg" value="<?php echo esc_attr( $settings['t2_error_msg'] ); ?>">
              <input type="hidden" name="to" value="<?php echo esc_attr( $settings['t2_email_to'] ); ?>">
              <input type="hidden" name="subject" value="<?php echo esc_attr( $settings['t2_email_subject'] ); ?>">

              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <input class="form-control form-control-lg" type="text" name="name" placeholder="<?php echo esc_attr( $settings['t2_placeholder_name'] ); ?>">
                </div>

                <div class="form-group col-12 col-md-6">
                  <input class="form-control form-control-lg" type="email" name="email" placeholder="<?php echo esc_attr( $settings['t2_placeholder_email'] ); ?>">
                </div>
              </div>


              <div class="form-group">
                <textarea class="form-control form-control-lg" rows="4" placeholder="<?php echo esc_attr( $settings['t2_placeholder_message'] ); ?>" name="message"></textarea>
              </div>

              <div class="text-center">
                <?php $widget->html('button', [ 'tag' => 'button' ]) ?>
              </div>

            </form>

          <?php endif; ?>

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
      <?php $widget->js('section_header'); ?>

      <div class="row gap-y">
        <div class="col-12 col-lg-6 offset-lg-3">

          <# if ( 'yes' == settings.t2_use_cf7 ) { #>

            <p>[contact-form-7 id="{{{ settings.t2_cf7_id }}}"]</p>

          <# } else { #>

            <form class="p-30 bg-gray rounded" action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" method="POST" data-form="mailer">
              <div class="alert alert-success">{{{ settings.t2_success_msg }}}</div>

              <input type="hidden" name="action" value="contact_send">
              <input type="hidden" name="error-msg" value="{{ settings.t2_error_msg }}">
              <input type="hidden" name="to" value="{{ settings.t2_email_to }}">
              <input type="hidden" name="subject" value="{{ settings.t2_email_subject }}">

              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <input class="form-control form-control-lg" type="text" name="name" placeholder="{{ settings.t2_placeholder_name }}">
                </div>

                <div class="form-group col-12 col-md-6">
                  <input class="form-control form-control-lg" type="email" name="email" placeholder="{{ settings.t2_placeholder_email }}">
                </div>
              </div>


              <div class="form-group">
                <textarea class="form-control form-control-lg" rows="4" placeholder="{{ settings.t2_placeholder_message }}" name="message"></textarea>
              </div>

              <div class="text-center">
                <?php $widget->js('button', [ 'tag' => 'button' ]) ?>
              </div>

            </form>

          <# } #>

        </div>

      </div>


    </div></section>
    <?php
  }

}
