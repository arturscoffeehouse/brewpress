<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Pricing_Block_2 {

  const ID = 2;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_color', 'section_inverse' ],
      'bg_color' => '#7a54d8',
      'inverse'  => true,
    ] );

    $widget->panel( 'header_content', [
      'header' => esc_html__( 'Choose your pricing plan', 'thesaas' ),
    ] );


    The_Controls::start_section( $widget, 'pricing_plans', $id );


    $has_yearly = 't'. $id .'_yearly_pricing_plan';
    $widget->add_control(
      $has_yearly,
      The_Controls::option_switch( esc_html__( 'Monthly and yearly', 'thesaas' ), 
        [], 
        ['return' => 'yes']
      )
    );

    $widget->add_control(
      't'. $id .'_monthly_text',
      The_Controls::option_text( esc_html__( 'Monthly Text', 'thesaas' ), [
        'default' => esc_html__( 'Monthly', 'thesaas' ),
        'label_block' => false,
        'condition' => [
          $has_yearly => 'yes'
        ]
      ])
    );

    $widget->add_control(
      't'. $id .'_yearly_text',
      The_Controls::option_text( esc_html__( 'Yearly Text', 'thesaas' ), [
        'default' => esc_html__( 'Yearly', 'thesaas' ),
        'label_block' => false,
        'condition' => [
          $has_yearly => 'yes'
        ]
      ])
    );

    $widget->add_control(
      't'. $id .'_plans_toggle_color',
      The_Controls::option_select( 'Buttons color', [], [
        'options' => [
          'btn-primary'   => esc_html__( 'Primary', 'thesaas' ),
          'btn-secondary' => esc_html__( 'Secondary', 'thesaas' ),
          'btn-info'      => esc_html__( 'Info', 'thesaas' ),
          'btn-success'   => esc_html__( 'Success', 'thesaas' ),
          'btn-warning'   => esc_html__( 'Warning', 'thesaas' ),
          'btn-danger'    => esc_html__( 'Danger', 'thesaas' ),
          'btn-white'     => esc_html__( 'White', 'thesaas' ),
          'btn-dark'      => esc_html__( 'Dark', 'thesaas' ),
        ],
        'label_block' => false,
        'default' => 'btn-dark',
        'condition' => [
          $has_yearly => 'yes'
        ]
      ] )
    );
    

    $widget->add_control(
      't'. $id .'_pricing_plan',
      [
        'label' => esc_html__( 'Plans', 'thesaas' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'name' => esc_html__( 'Single template', 'thesaas' ),
            'features' => esc_html__( "Single template, lifetime license", 'thesaas' ),
            'price' => '29',
            'price_unit' => '$',
            'btn_text' => esc_html__( "Select an album", "thesaas" ),
          ],
          [
            'name' => esc_html__( 'One year membership', 'thesaas' ),
            'features' => esc_html__( "Get access to all templates", 'thesaas' ),
            'price' => '99',
            'price_unit' => '$',
            'btn_text' => esc_html__( "Sign up", "thesaas" ),
          ],
          [
            'name' => esc_html__( 'Lifetime access', 'thesaas' ),
            'features' => esc_html__( "Pay once, have fun forever", 'thesaas' ),
            'price' => '199',
            'price_unit' => '$',
            'btn_text' => esc_html__( "Sign up", "thesaas" ),
          ],
        ],
        'fields' => [
          [
            'name' => 'name',
            'label' => esc_html__( 'Name', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Plan name' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'price',
            'label' => esc_html__( 'Price', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '9' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'price_yearly',
            'label' => esc_html__( 'Price - Yearly', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '99' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'price_unit',
            'label' => esc_html__( 'Price unit', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '$' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'period',
            'label' => esc_html__( 'Period', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'label_block' => true,
          ],
          [
            'name' => 'period_yearly',
            'label' => esc_html__( 'Period text - Yearly', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'label_block' => true,
          ],
          [
            'name' => 'features',
            'label' => esc_html__( 'Features', 'thesaas' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__( 'Plan description' , 'thesaas' ),
            'placeholder' => esc_html__( 'One feature per line' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'btn_text',
            'label' => esc_html__( 'Button text', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Sign up' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'btn_link',
            'label' => esc_html__( 'Button link', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '#' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'btn_color',
            'label' => esc_html__( 'Button color', 'thesaas' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
              'btn-primary'   => esc_html__( 'Primary', 'thesaas' ),
              'btn-secondary' => esc_html__( 'Secondary', 'thesaas' ),
              'btn-info'      => esc_html__( 'Info', 'thesaas' ),
              'btn-success'   => esc_html__( 'Success', 'thesaas' ),
              'btn-warning'   => esc_html__( 'Warning', 'thesaas' ),
              'btn-danger'    => esc_html__( 'Danger', 'thesaas' ),
              'btn-white'     => esc_html__( 'White', 'thesaas' ),
              'btn-dark'      => esc_html__( 'Dark', 'thesaas' ),
            ],
            'default' => 'btn-white',
          ],
          [
            'name' => 'btn_outline',
            'label' => esc_html__( 'Button outline style', 'thesaas' ),
            'type' => Controls_Manager::SWITCHER,
            'label_off' => esc_html__( 'No', 'thesaas' ),
            'label_on' => esc_html__( 'Yes', 'thesaas' ),
            'return_value' => 'btn-outline',
            'default' => 'btn-outline',
          ],
          [
            'name' => 'btn_round',
            'label' => esc_html__( 'Button round style', 'thesaas' ),
            'type' => Controls_Manager::SWITCHER,
            'label_off' => esc_html__( 'No', 'thesaas' ),
            'label_on' => esc_html__( 'Yes', 'thesaas' ),
            'return_value' => 'btn-round',
            'default' => 'btn-round',
          ],
          [
            'name' => 'btn_class',
            'label' => esc_html__( 'Button extra classes', 'thesaas' ),
            'description' => esc_html__( 'Space separated class names', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'label_block' => true,
          ],
          [
            'name' => 'hidden',
            'label' => esc_html__( 'Hidden', 'thesaas' ),
            'type' => Controls_Manager::SWITCHER,
            'label_off' => esc_html__( 'No', 'thesaas' ),
            'label_on' => esc_html__( 'Yes', 'thesaas' ),
            'return_value' => 'yes',
          ],
        ],
        'title_field' => '{{{ name }}}',
      ]
    );

    The_Controls::end_section( $widget );

  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();
    $radio_id = rand(1, 999);
    $plans = $settings['t2_pricing_plan'];

    foreach ( $plans as $key => $plan ) {
      if ( 'yes' === $plan['hidden'] ) {
        unset( $plans[ $key ] );
      }
    }


    $col_class = 'col-12 col-md-4';
    $col_size = count( $plans );
    switch ( $col_size ) {
      case 1:
        $col_class = 'col-12 col-md-6 offset-md-3';
        break;

      case 2:
        $col_class = 'col-12 col-md-6';
        break;

      case 4:
        $col_class = 'col-12 col-md-6 col-xl-3';
        break;

      default:
        $col_class = 'col-12 col-md-4';
        break;
    }
    ?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

        <?php if ( 'yes' == $settings['t2_yearly_pricing_plan'] ) : ?>
        <div class="text-center mb-70">
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t2_plans_toggle_color'] ); ?> active" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> <?php echo $settings['t2_monthly_text'] ?>
            </label>
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t2_plans_toggle_color'] ); ?>" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> <?php echo $settings['t2_yearly_text'] ?>
            </label>
          </div>
        </div>
        <?php endif; ?>

        <div class="row gap-y">

          <?php foreach ( $plans as $plan ) : ?>

            <div class="<?php echo $col_class; ?>">
              <div class="pricing-2">
                <h2 class="price">
                  <span class="price-unit"><?php echo $plan['price_unit']; ?></span>
                  <span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['price'] ); ?>" data-yearly="<?php echo esc_attr( $plan['price_yearly'] ); ?>"><?php echo $plan['price']; ?></span>
                    <span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['period'] ); ?>" data-yearly="<?php echo esc_attr( $plan['period_yearly'] ); ?>"><?php echo $plan['period']; ?></span>
                </h2>
                <h6 class="plan-name"><?php echo $plan['name']; ?></h6>
                <p class="plan-description"><?php echo nl2br( $plan['features'] ); ?></p>
                <br>
                <a class="btn <?php esc_attr_e( $plan['btn_color'] ); ?> <?php esc_attr_e( $plan['btn_outline'] ); ?> <?php esc_attr_e( $plan['btn_round'] ); ?> w-200 <?php esc_attr_e( $plan['btn_class'] ); ?>" href="<?php echo esc_url( $plan['btn_link'] ); ?>"><?php echo $plan['btn_text']; ?></a>
              </div>
            </div>

          <?php endforeach; ?>

        </div>

    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );
    $radio_id = rand(1, 999);
    ?>
    <?php $widget->js('section_tag'); ?>
      <?php $widget->js('section_header'); ?>

      <# if ( 'yes' == settings.t2_yearly_pricing_plan ) { #>
      <div class="text-center mb-70">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-round btn-outline {{ settings.t2_plans_toggle_color }} active" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> {{{ settings.t2_monthly_text }}}
          </label>
          <label class="btn btn-round btn-outline {{ settings.t2_plans_toggle_color }}" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> {{{ settings.t2_yearly_text }}}
          </label>
        </div>
      </div>
      <# } #>

        <div class="row gap-y">
        <#

        function nl2br (str, is_xhtml) {
           var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
           return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }

        var plans = settings.t2_pricing_plan;
        plans = _.reject( plans, function(plan) {
          if ( 'yes' == plan.hidden ) {
            return true;
          }
          return false;
        });

        if ( plans ) {
          var col_class = 'col-12 col-md-4';
          var plan_size = plans.length;
          switch ( plan_size ) {
            case 1:
              col_class = 'col-12 col-md-6 offset-md-3';
              break;

            case 2:
              col_class = 'col-12 col-md-6';
              break;

            case 4:
              col_class = 'col-12 col-md-6 col-xl-3';
              break;

            default:
              col_class = 'col-12 col-md-4';
              break;
          }

          _.each( plans, function( plan ) {
          #>
            <div class="{{ col_class }}">
              <div class="pricing-2">
                <h2 class="price">
                  <span class="price-unit">{{{ plan.price_unit }}}</span>
                  <span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.price }}" data-yearly="{{ plan.price_yearly }}">{{{ plan.price }}}</span>
                <span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.period }}" data-yearly="{{ plan.period_yearly }}">{{{ plan.period }}}</span>
                </h2>
                <h6 class="plan-name">{{{ plan.name }}}</h6>
                <p class="plan-description">{{{ nl2br( plan.features ) }}}</p>
                <br>
                <a class="btn {{ plan.btn_color }} {{ plan.btn_outline }} {{ plan.btn_round }} w-200 {{ plan.btn_class }}" href="{{ plan.btn_link }}">{{{ plan.btn_text }}}</a>
              </div>
            </div>
          <#
          } );
        }
        #>

        </div>

    </div></section>
    <?php
  }

}
