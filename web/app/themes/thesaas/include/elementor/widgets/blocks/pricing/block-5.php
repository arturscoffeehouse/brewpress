<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Pricing_Block_5 {

  const ID = 5;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
    ] );

    $widget->panel( 'header_content', [
      'small'  => esc_html__( 'Pricing', 'thesaas' ),
      'header' => esc_html__( 'Our Plans', 'thesaas' ),
      'lead'   => esc_html__( 'Choose any of the following plans to get start with. You can always change your plan from your account.', 'thesaas' ),
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
            'name' => esc_html__( 'Free', 'thesaas' ),
            'description' => esc_html__( "First image behold. Behold abundantly fly god together place us fly one subdue fly a, moved Appear morning.", 'thesaas' ),
            'price' => '$0',
            'price_yearly' => '$0',
            'price_unit' => '',
            'price_description' => esc_html__( 'for 100 MB space', 'thesaas' ),
            'period' => '',
          ],
          [
            'name' => esc_html__( 'Personal', 'thesaas' ),
            'description' => esc_html__( "First image behold. Behold abundantly fly god together place us fly one subdue fly a, moved Appear morning.", 'thesaas' ),
            'price' => '$9',
            'price_yearly' => '$99',
            'price_unit' => '',
            'price_description' => esc_html__( 'for 100 GB space', 'thesaas' ),
            'period' => esc_html__( '/mo', 'thesaas' ),
          ],
          [
            'name' => esc_html__( 'Team', 'thesaas' ),
            'description' => esc_html__( "First image behold. Behold abundantly fly god together place us fly one subdue fly a, moved Appear morning.", 'thesaas' ),
            'price' => '$29',
            'price_yearly' => '$299',
            'price_unit' => '',
            'price_description' => esc_html__( 'for 10 TB space', 'thesaas' ),
            'period' => esc_html__( '/mo', 'thesaas' ),
          ],
          [
            'name' => esc_html__( 'Business', 'thesaas' ),
            'description' => esc_html__( "First image behold. Behold abundantly fly god together place us fly one subdue fly a, moved Appear morning.", 'thesaas' ),
            'price' => '$49',
            'price_yearly' => '$499',
            'price_unit' => '',
            'price_description' => esc_html__( 'for unlimited space', 'thesaas' ),
            'period' => esc_html__( '/mo', 'thesaas' ),
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
            'name' => 'description',
            'label' => esc_html__( 'Description', 'thesaas' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__( 'Plan description' , 'thesaas' ),
            'placeholder' => esc_html__( 'One feature per line' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'price_description',
            'label' => esc_html__( 'Price description', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Sign up' , 'thesaas' ),
            'label_block' => true,
          ],
          [
            'name' => 'link',
            'label' => esc_html__( 'Link', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '#' , 'thesaas' ),
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
    $plans = $settings['t5_pricing_plan'];

    foreach ( $plans as $key => $plan ) {
      if ( 'yes' === $plan['hidden'] ) {
        unset( $plans[ $key ] );
      }
    }

    ?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

        <?php if ( 'yes' == $settings['t5_yearly_pricing_plan'] ) : ?>
        <div class="text-center mb-70">
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t5_plans_toggle_color'] ); ?> active" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> <?php echo $settings['t5_monthly_text'] ?>
            </label>
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t5_plans_toggle_color'] ); ?>" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> <?php echo $settings['t5_yearly_text'] ?>
            </label>
          </div>
        </div>
        <?php endif; ?>


        <?php foreach ( $plans as $plan ) : ?>

          <a class="row no-gutters pricing-4" href="<?php echo esc_url( $plan['link'] ); ?>">
            <div class="col-12 col-md-9 plan-description">
              <h5><?php echo $plan['name']; ?></h5>
              <p><?php echo $plan['description']; ?></p>
            </div>

            <div class="col-12 col-md-3 plan-price">
              <h3 class="price">
                <span class="price-unit"><?php echo $plan['price_unit']; ?></span>
                <span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['price'] ); ?>" data-yearly="<?php echo esc_attr( $plan['price_yearly'] ); ?>"><?php echo $plan['price']; ?></span>
                <span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['period'] ); ?>" data-yearly="<?php echo esc_attr( $plan['period_yearly'] ); ?>"><?php echo $plan['period']; ?></span>
              </h3>
              <p><?php echo $plan['price_description']; ?></p>
            </div>
          </a>

          <br>

        <?php endforeach; ?>


    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );
    $radio_id = rand(1, 999);
    ?>
    <?php $widget->js('section_tag'); ?>
      <?php $widget->js('section_header'); ?>


      <# if ( 'yes' == settings.t5_yearly_pricing_plan ) { #>
      <div class="text-center mb-70">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-round btn-outline {{ settings.t5_plans_toggle_color }} active" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> {{{ settings.t5_monthly_text }}}
          </label>
          <label class="btn btn-round btn-outline {{ settings.t5_plans_toggle_color }}" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> {{{ settings.t5_yearly_text }}}
          </label>
        </div>
      </div>
      <# } #>

        <#

        function nl2br (str, is_xhtml) {
           var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
           return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }

        var plans = settings.t5_pricing_plan;
        plans = _.reject( plans, function(plan) {
          if ( 'yes' == plan.hidden ) {
            return true;
          }
          return false;
        });

        if ( plans ) {

          _.each( plans, function( plan ) {
          #>
            <a class="row no-gutters pricing-4" href="{{ plan.link }}">
              <div class="col-12 col-md-9 plan-description">
                <h5>{{{ plan.name }}}</h5>
                <p>{{{ nl2br( plan.description ) }}}</p>
              </div>

              <div class="col-12 col-md-3 plan-price">
                <h3 class="price">
                  <span class="price-unit">{{{ plan.price_unit }}}</span>
                  <span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.price }}" data-yearly="{{ plan.price_yearly }}">{{{ plan.price }}}</span>
                <span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.period }}" data-yearly="{{ plan.period_yearly }}">{{{ plan.period }}}</span>
                </h3>
                <p>{{{ nl2br( plan.price_description ) }}}</p>
              </div>
            </a>

            <br>
          <#
          } );
        }
        #>


    </div></section>
    <?php
  }

}
