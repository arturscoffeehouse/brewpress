<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Contact_Block_6 {

  const ID = 6;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'switch_sides', 'bg_image', 'overlay' ],
      'overlay' => 9,
    ]);


    $widget->panel( 'contact_detail_2', [
      'section_title' => 'Contact detail',
      'small_text' => esc_html__( 'Head Office', 'thesaas' ),
      'social_icons' => 'yes',
    ]);

    $widget->panel( 'google_map' );

  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();
    $swap = $settings['t6_switch_sides'];

    $lat = esc_attr( $settings['t6_lat'] );
    $lng = esc_attr( $settings['t6_lng'] );
    $zoom = esc_attr( $settings['t6_zoom']['size'] );
    $height = esc_attr( $settings['t6_height']['size'] );
    $skin = esc_attr( $settings['t6_skin'] );

    ?>
    <?php $widget->html('section_tag', [ 'class' => 'section-inverse bg-img' ]); ?>

      <div class="row gap-y align-items-center">

        <?php if ( 'yes' === $swap ) : ?>

        <div class="col-12 col-md-7">
          <div class="h-full rounded" data-provide="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-marker-lat="<?php echo $lat; ?>" data-marker-lng="<?php echo $lng; ?>" data-zoom="<?php echo $zoom; ?>" data-style="<?php echo $skin; ?>" style="min-height: <?php echo $height; ?>px"></div>
        </div>


        <div class="col-12 col-md-5">

          <?php if ( '' !== $settings['t6_contact_small_text'] ) : ?>
            <p class="text-uppercase small opacity-50 fw-600 ls-1"><?php echo $settings['t6_contact_small_text']; ?></p>
          <?php endif; ?>

          <?php if ( '' !== $settings['t6_contact_heading_text'] ) : ?>
            <h5><?php echo $settings['t6_contact_heading_text']; ?></h5>
          <?php endif; ?>

          <p><?php echo nl2br( $settings['t6_address'] ); ?></p>

          <?php if ( '' !== $settings['t6_phone'] || '' !== $settings['t6_fax'] ) : ?>
            <p><?php echo esc_html__( 'Phone', 'thesaas' ) ?>: <?php echo $settings['t6_phone']; ?><br><?php echo esc_html__( 'Fax', 'thesaas' ) ?>: <?php echo $settings['t6_fax']; ?></p>
          <?php endif; ?>

          <?php if ( '' !== $settings['t6_email'] ) : ?>
            <p><?php echo esc_html__( 'Email', 'thesaas' ) ?>: <?php echo $settings['t6_email']; ?></p>
          <?php endif; ?>

          <?php if ( 'yes' === $settings['t6_social_icons'] ) : ?>
            <h6><?php echo esc_html__( 'Follow Us', 'thesaas' ) ?></h6>
            <div class="social social-sm">
              <?php thesaas_show_social_icons(); ?>
            </div>
          <?php endif; ?>

        </div>

        <?php else: ?>

        <div class="col-12 col-md-5">

          <?php if ( '' !== $settings['t6_contact_small_text'] ) : ?>
            <p class="text-uppercase small opacity-50 fw-600 ls-1"><?php echo $settings['t6_contact_small_text']; ?></p>
          <?php endif; ?>

          <?php if ( '' !== $settings['t6_contact_heading_text'] ) : ?>
            <h5><?php echo $settings['t6_contact_heading_text']; ?></h5>
          <?php endif; ?>

          <p><?php echo nl2br( $settings['t6_address'] ); ?></p>

          <?php if ( '' !== $settings['t6_phone'] || '' !== $settings['t6_fax'] ) : ?>
            <p><?php echo esc_html__( 'Phone', 'thesaas' ) ?>: <?php echo $settings['t6_phone']; ?><br><?php echo esc_html__( 'Fax', 'thesaas' ) ?>: <?php echo $settings['t6_fax']; ?></p>
          <?php endif; ?>

          <?php if ( '' !== $settings['t6_email'] ) : ?>
            <p><?php echo esc_html__( 'Email', 'thesaas' ) ?>: <?php echo $settings['t6_email']; ?></p>
          <?php endif; ?>

          <?php if ( 'yes' === $settings['t6_social_icons'] ) : ?>
            <h6><?php echo esc_html__( 'Follow Us', 'thesaas' ) ?></h6>
            <div class="social social-sm">
              <?php thesaas_show_social_icons(); ?>
            </div>
          <?php endif; ?>

        </div>

        <div class="col-12 col-md-7">
          <div class="h-full rounded" data-provide="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-marker-lat="<?php echo $lat; ?>" data-marker-lng="<?php echo $lng; ?>" data-zoom="<?php echo $zoom; ?>" data-style="<?php echo $skin; ?>" style="min-height: <?php echo $height; ?>px"></div>
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
    <?php $widget->js('section_tag', [ 'class' => 'section-inverse bg-img' ]); ?>

      <div class="row gap-y align-items-center">

        <# if ( 'yes' === settings.t6_switch_sides ) { #>

        <div class="col-12 col-md-7">
          <div class="h-full round" data-provide="map" data-lat="{{ settings.t6_lat }}" data-lng="{{ settings.t6_lng }}" data-marker-lat="{{ settings.t6_lat }}" data-marker-lng="{{ settings.t6_lng }}" data-zoom="{{ settings.t6_zoom.size }}" data-style="{{ settings.t6_skin }}" style="min-height: {{ settings.t6_height.size }}px"></div>
        </div>


        <div class="col-12 col-md-5">

          <# if ( '' !== settings.t6_contact_small_text ) { #>
            <p class="text-uppercase small opacity-50 fw-600 ls-1">{{{ settings.t6_contact_small_text }}}</p>
          <# } #>

          <# if ( '' !== settings.t6_contact_heading_text ) { #>
            <h5>{{{ settings.t6_contact_heading_text }}}</h5>
          <# } #>

          <p>{{{ nl2br( settings.t6_address ) }}}</p>

          <# if ( '' !== settings.t6_phone || '' !== settings.t6_fax ) { #>
            <p>Phone: {{{ settings.t6_phone }}}<br>Fax: {{{ settings.t6_fax }}}</p>
          <# } #>

          <# if ( '' !== settings.t6_email ) { #>
            <p>Email: {{{ settings.t6_email }}}</p>
          <# } #>

          <# if ( 'yes' === settings.t6_social_icons ) { #>
            <h6><?php esc_html_e( 'Follow Us', 'thesaas' ) ?></h6>
            <div class="social social-sm">
              <?php thesaas_show_social_icons(); ?>
            </div>
          <# } #>

        </div>

        <# } else { #>

        <div class="col-12 col-md-5">

          <# if ( '' !== settings.t6_contact_small_text ) { #>
            <p class="text-uppercase small opacity-50 fw-600 ls-1">{{{ settings.t6_contact_small_text }}}</p>
          <# } #>

          <# if ( '' !== settings.t6_contact_heading_text ) { #>
            <h5>{{{ settings.t6_contact_heading_text }}}</h5>
          <# } #>

          <p>{{{ nl2br( settings.t6_address ) }}}</p>

          <# if ( '' !== settings.t6_phone || '' !== settings.t6_fax ) { #>
            <p>Phone: {{{ settings.t6_phone }}}<br>Fax: {{{ settings.t6_fax }}}</p>
          <# } #>

          <# if ( '' !== settings.t6_email ) { #>
            <p>Email: {{{ settings.t6_email }}}</p>
          <# } #>

          <# if ( 'yes' === settings.t6_social_icons ) { #>
            <h6><?php esc_html_e( 'Follow Us', 'thesaas' ) ?></h6>
            <div class="social social-sm">
              <?php thesaas_show_social_icons(); ?>
            </div>
          <# } #>

        </div>


        <div class="col-12 col-md-7">
          <div class="h-full round" data-provide="map" data-lat="{{ settings.t6_lat }}" data-lng="{{ settings.t6_lng }}" data-marker-lat="{{ settings.t6_lat }}" data-marker-lng="{{ settings.t6_lng }}" data-zoom="{{ settings.t6_zoom.size }}" data-style="{{ settings.t6_skin }}" style="min-height: {{ settings.t6_height.size }}px"></div>
        </div>

        <# } #>
        

      </div>

    </section>
    <?php
  }

}
