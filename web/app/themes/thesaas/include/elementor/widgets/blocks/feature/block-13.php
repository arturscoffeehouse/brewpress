<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_13 {

  const ID = 13;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
    ] );

    $widget->panel( 'header_content', [
      'small'  => esc_html__( 'Features', 'thesaas' ),
      'header' => esc_html__( 'Header Varieties', 'thesaas' ),
      'lead'   => esc_html__( 'We waited until we could do it right. Then we did! Instead of creating a carbon copy.', 'thesaas' ),
    ] );


    The_Controls::start_section( $widget, 'tabs', $id );

    $widget->add_control(
      't'. $id .'_tabs',
      [
        'label' => esc_html__( 'Tabs Items', 'thesaas' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'title' => esc_html__( 'Color', 'thesaas' ),
            'subtitle' => esc_html__( 'Some description about the current tab.', 'thesaas' ),
            'content' => '<img src="'. esc_url( thesaas_get_img_uri( 'header-color.jpg' ) ) .'" alt="header color">',
          ],
          [
            'title' => esc_html__( 'Gradient', 'thesaas' ),
            'subtitle' => esc_html__( 'Some description about the current tab.', 'thesaas' ),
            'content' => '<img src="'. esc_url( thesaas_get_img_uri( 'header-gradient.jpg' ) ) .'" alt="header gradient">',
          ],
          [
            'title' => esc_html__( 'Typing', 'thesaas' ),
            'subtitle' => esc_html__( 'Some description about the current tab.', 'thesaas' ),
            'content' => '<img src="'. esc_url( thesaas_get_img_uri( 'header-typing.jpg' ) ) .'" alt="header typing">',
          ],
          [
            'title' => esc_html__( 'Slider', 'thesaas' ),
            'subtitle' => esc_html__( 'Some description about the current tab.', 'thesaas' ),
            'content' => '<img src="'. esc_url( thesaas_get_img_uri( 'header-slider.jpg' ) ) .'" alt="header slider">',
          ],
        ],
        'fields' => [
          [
            'name' => 'title',
            'label' => esc_html__( 'Title', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Tab Title', 'thesaas' ),
            'placeholder' => esc_html__( 'Tab Title', 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'subtitle',
            'label' => esc_html__( 'Subtitle', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => esc_html__( 'Some description about the tab', 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'content',
            'label' => esc_html__( 'Content', 'thesaas' ),
            'default' => esc_html__( 'Tab Content', 'thesaas' ),
            'placeholder' => esc_html__( 'Tab Content', 'thesaas' ),
            'type' => Controls_Manager::WYSIWYG,
            'show_label' => false,
          ],
        ],
        'title_field' => '{{{ title }}}',
        'separator' => 'before',
      ]
    );

    The_Controls::add_uniqid( $widget, $id );

    The_Controls::end_section( $widget );

  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();
    $id = $settings['t13_uniqid'] . rand();
    $counter = 0;
    ?>
    <?php $widget->html('section_tag', [ 'class', 'hidden-sm-down' ]); ?>
      <?php $widget->html('section_header'); ?>

            <div class="row gap-5">

              <div class="col-12 col-md-4">
                <ul class="nav nav-vertical">

                <?php foreach ( $settings['t13_tabs'] as $item ) : $counter++; ?>

                  <?php if ( 1 == $counter ) : ?>

                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tab-<?php echo $id; ?>-<?php echo $counter; ?>">
                        <h6><?php echo $item['title']; ?></h6>
                        <p><?php echo $item['subtitle']; ?></p>
                      </a>
                    </li>

                  <?php else : ?>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-<?php echo $id; ?>-<?php echo $counter; ?>">
                        <h6><?php echo $item['title']; ?></h6>
                        <p><?php echo $item['subtitle']; ?></p>
                      </a>
                    </li>

                  <?php endif; ?>

                <?php endforeach; $counter = 0; ?>

                </ul>
              </div>


              <div class="col-12 col-md-8 align-self-center">
                <div class="tab-content">
                <?php foreach ( $settings['t13_tabs'] as $item ) : $counter++; ?>

                  <?php if ( 1 == $counter ) : ?>

                    <div class="tab-pane fade show active" id="tab-<?php echo $id; ?>-<?php echo $counter; ?>">
                      <?php echo $item['content']; ?>
                    </div>

                  <?php else : ?>

                    <div class="tab-pane fade" id="tab-<?php echo $id; ?>-<?php echo $counter; ?>">
                      <?php echo $item['content']; ?>
                    </div>

                  <?php endif; ?>

                <?php endforeach; ?>
                </div>
              </div>

            </div>

    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );
    ?>
    <?php $widget->js('section_tag', [ 'class' => 'hidden-sm-down' ]); ?>
      <?php $widget->js('section_header'); ?>
          <#
            var counter = 0;
            var id = settings.t13_uniqid;
          #>
            <div class="row gap-5">

              <div class="col-12 col-md-4">
                <div class="nav nav-vertical">
                <# _.each( settings.t13_tabs, function( item ) { counter++; #>

                  <# if ( 1 == counter ) { #>

                    <a class="nav-link active" data-toggle="tab" href="#tab-{{ id }}-{{ counter }}">
                      <h6>{{{ item.title }}}</h6>
                      <p>{{{ item.subtitle }}}</p>
                    </a>

                  <# } else { #>

                    <a class="nav-link" data-toggle="tab" href="#tab-{{ id }}-{{ counter }}">
                      <h6>{{{ item.title }}}</h6>
                      <p>{{{ item.subtitle }}}</p>
                    </a>

                  <# } #>

                <# } ); counter = 0; #>
                </div>
              </div>


              <div class="col-12 col-md-8 align-self-center">
                <div class="tab-content">
                  <# _.each( settings.t13_tabs, function( item ) { counter++; #>

                    <# if ( 1 == counter ) { #>

                      <div class="tab-pane fade show active" id="tab-{{ id }}-{{ counter }}">
                        {{{ item.content }}}
                      </div>

                    <# } else { #>

                      <div class="tab-pane fade" id="tab-{{ id }}-{{ counter }}">
                        {{{ item.content }}}
                      </div>

                    <# } #>

                  <# } ); #>
                </div>
              </div>

            </div>

    </div></section>
    <?php
  }

}
