<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Contact_Block_5 {

  const ID = 5;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'switch_sides' ],
      'switch_sides' => 'yes',
    ]);


    $widget->panel( 'contact_detail_2', [
      'section_title' => 'Contact detail',
      'small_text' => esc_html__( 'Head Office', 'thesaas' ),
      'social_icons' => 'yes',
      'with_bg_image' => true,
    ]);

    $widget->panel( 'google_map', [
      'skin' => 'dark',
    ]);

  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();
    $swap = $settings['t5_switch_sides'];

    $bg_img = esc_url( $settings['t5_contact_bg_image']['url'] );

    $lat = esc_attr( $settings['t5_lat'] );
    $lng = esc_attr( $settings['t5_lng'] );
    $zoom = esc_attr( $settings['t5_zoom']['size'] );
    $height = esc_attr( $settings['t5_height']['size'] );
    $skin = esc_attr( $settings['t5_skin'] );

    ?>
    <?php $widget->html('section_tag', [ 'no_container' => true, 'class' => 'section-inverse py-0' ]); ?>

      <div class="row no-gutters">

        <?php if ( 'yes' !== $swap ) : ?>

        <div class="col-12 col-md-6">
          <div class="h-full" data-provide="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-marker-lat="<?php echo $lat; ?>" data-marker-lng="<?php echo $lng; ?>" data-zoom="<?php echo $zoom; ?>" data-style="<?php echo $skin; ?>" style="min-height: <?php echo $height; ?>px"></div>
        </div>


        <div class="col-12 col-md-6 align-self-center py-80 bg-img" style="background-image: url(<?php echo $bg_img; ?>)" data-overlay="7">
          <div class="row">
            <div class="offset-1 col-10 col-md-8 offset-md-2">

              <?php if ( '' !== $settings['t5_contact_small_text'] ) : ?>
                <p class="text-uppercase small opacity-50 fw-600 ls-1"><?php echo $settings['t5_contact_small_text']; ?></p>
              <?php endif; ?>

              <?php if ( '' !== $settings['t5_contact_heading_text'] ) : ?>
                <h5><?php echo $settings['t5_contact_heading_text']; ?></h5>
              <?php endif; ?>

              <p><?php echo nl2br( $settings['t5_address'] ); ?></p>

              <?php if ( '' !== $settings['t5_phone'] || '' !== $settings['t5_fax'] ) : ?>
                <p><?php echo esc_html__( 'Phone', 'thesaas' ) ?>: <?php echo $settings['t5_phone']; ?><br><?php echo esc_html__( 'Fax', 'thesaas' ) ?>: <?php echo $settings['t5_fax']; ?></p>
              <?php endif; ?>

              <?php if ( '' !== $settings['t5_email'] ) : ?>
                <p><?php echo esc_html__( 'Email', 'thesaas' ) ?>: <?php echo $settings['t5_email']; ?></p>
              <?php endif; ?>

              <?php if ( 'yes' === $settings['t5_social_icons'] ) : ?>
                <h6><?php echo esc_html__( 'Follow Us', 'thesaas' ) ?></h6>
                <div class="social social-sm">
                  <?php thesaas_show_social_icons(); ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>

        <?php else: ?>

        <div class="col-12 col-md-6 align-self-center py-80 bg-img" style="background-image: url(<?php echo $bg_img; ?>)" data-overlay="7">
          <div class="row">
            <div class="offset-1 col-10 col-md-8 offset-md-2">

              <?php if ( '' !== $settings['t5_contact_small_text'] ) : ?>
                <p class="text-uppercase small opacity-50 fw-600 ls-1"><?php echo $settings['t5_contact_small_text']; ?></p>
              <?php endif; ?>

              <?php if ( '' !== $settings['t5_contact_heading_text'] ) : ?>
                <h5><?php echo $settings['t5_contact_heading_text']; ?></h5>
              <?php endif; ?>

              <p><?php echo nl2br( $settings['t5_address'] ); ?></p>

              <?php if ( '' !== $settings['t5_phone'] || '' !== $settings['t5_fax'] ) : ?>
                <p><?php echo esc_html__( 'Phone', 'thesaas' ) ?>: <?php echo $settings['t5_phone']; ?><br><?php echo esc_html__( 'Fax', 'thesaas' ) ?>: <?php echo $settings['t5_fax']; ?></p>
              <?php endif; ?>

              <?php if ( '' !== $settings['t5_email'] ) : ?>
                <p><?php echo esc_html__( 'Email', 'thesaas' ) ?>: <?php echo $settings['t5_email']; ?></p>
              <?php endif; ?>

              <?php if ( 'yes' === $settings['t5_social_icons'] ) : ?>
                <h6><?php echo esc_html__( 'Follow Us', 'thesaas' ) ?></h6>
                <div class="social social-sm">
                  <?php thesaas_show_social_icons(); ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="h-full" data-provide="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-marker-lat="<?php echo $lat; ?>" data-marker-lng="<?php echo $lng; ?>" data-zoom="<?php echo $zoom; ?>" data-style="<?php echo $skin; ?>" style="min-height: <?php echo $height; ?>px"></div>
        </div>

        <?php endif; ?>


      </div>

    </section>
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
    <?php $widget->js('section_tag', [ 'no_container' => true, 'class' => 'section-inverse py-0' ]); ?>

      <div class="row no-gutters">

        <# if ( 'yes' !== settings.t5_switch_sides ) { #>

        <div class="col-12 col-md-6">
          <div class="h-full" data-provide="map" data-lat="{{ settings.t5_lat }}" data-lng="{{ settings.t5_lng }}" data-marker-lat="{{ settings.t5_lat }}" data-marker-lng="{{ settings.t5_lng }}" data-zoom="{{ settings.t5_zoom.size }}" data-style="{{ settings.t5_skin }}" style="min-height: {{ settings.t5_height.size }}px"></div>
        </div>


        <div class="col-12 col-md-6 align-self-center py-80 bg-img" style="background-image: url({{ settings.t5_contact_bg_image.url }})" data-overlay="7">
          <div class="row">
            <div class="offset-1 col-10 col-md-8 offset-md-2">

              <# if ( '' !== settings.t5_contact_small_text ) { #>
                <p class="text-uppercase small opacity-50 fw-600 ls-1">{{{ settings.t5_contact_small_text }}}</p>
              <# } #>

              <# if ( '' !== settings.t5_contact_heading_text ) { #>
                <h5>{{{ settings.t5_contact_heading_text }}}</h5>
              <# } #>

              <p>{{{ nl2br( settings.t5_address ) }}}</p>

              <# if ( '' !== settings.t5_phone || '' !== settings.t5_fax ) { #>
                <p>Phone: {{{ settings.t5_phone }}}<br>Fax: {{{ settings.t5_fax }}}</p>
              <# } #>

              <# if ( '' !== settings.t5_email ) { #>
                <p>Email: {{{ settings.t5_email }}}</p>
              <# } #>

              <# if ( 'yes' === settings.t5_social_icons ) { #>
                <h6><?php esc_html_e( 'Follow Us', 'thesaas' ) ?></h6>
                <div class="social social-sm">
                  <?php thesaas_show_social_icons(); ?>
                </div>
              <# } #>

            </div>
          </div>
        </div>

        <# } else { #>

        <div class="col-12 col-md-6 align-self-center py-80 bg-img" style="background-image: url({{ settings.t5_contact_bg_image.url }})" data-overlay="7">
          <div class="row">
            <div class="offset-1 col-10 col-md-8 offset-md-2">

              <# if ( '' !== settings.t5_contact_small_text ) { #>
                <p class="text-uppercase small opacity-50 fw-600 ls-1">{{{ settings.t5_contact_small_text }}}</p>
              <# } #>

              <# if ( '' !== settings.t5_contact_heading_text ) { #>
                <h5>{{{ settings.t5_contact_heading_text }}}</h5>
              <# } #>

              <p>{{{ nl2br( settings.t5_address ) }}}</p>

              <# if ( '' !== settings.t5_phone || '' !== settings.t5_fax ) { #>
                <p>Phone: {{{ settings.t5_phone }}}<br>Fax: {{{ settings.t5_fax }}}</p>
              <# } #>

              <# if ( '' !== settings.t5_email ) { #>
                <p>Email: {{{ settings.t5_email }}}</p>
              <# } #>

              <# if ( 'yes' === settings.t5_social_icons ) { #>
                <h6><?php esc_html_e( 'Follow Us', 'thesaas' ) ?></h6>
                <div class="social social-sm">
                  <?php thesaas_show_social_icons(); ?>
                </div>
              <# } #>

            </div>
          </div>
        </div>


        <div class="col-12 col-md-6">
          <div class="h-full" data-provide="map" data-lat="{{ settings.t5_lat }}" data-lng="{{ settings.t5_lng }}" data-marker-lat="{{ settings.t5_lat }}" data-marker-lng="{{ settings.t5_lng }}" data-zoom="{{ settings.t5_zoom.size }}" data-style="{{ settings.t5_skin }}" style="min-height: {{ settings.t5_height.size }}px"></div>
        </div>

        <# } #>
        

      </div>

    </section>
    <?php
  }

}
