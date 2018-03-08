<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Pricing_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Plans', 'thesaas' ),
			'header' => esc_html__( 'Pricing', 'thesaas' ),
			'lead'   => esc_html__( 'Choose any of the following plans to get start with. You can always change your plan from your account.', 'thesaas' ),
		] );

		$widget->panel( 'pricing_plans' );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
    $radio_id = rand(1, 999);
		$plans = $settings['t1_pricing_plan'];

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

        <?php if ( 'yes' == $settings['t1_yearly_pricing_plan'] ) : ?>
        <div class="text-center mb-70">
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t1_plans_toggle_color'] ); ?> active" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> <?php echo $settings['t1_monthly_text'] ?>
            </label>
            <label class="btn btn-round btn-outline <?php echo esc_attr( $settings['t1_plans_toggle_color'] ); ?>" style="min-width: 150px">
              <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> <?php echo $settings['t1_yearly_text'] ?>
            </label>
          </div>
        </div>
        <?php endif; ?>

        <div class="row gap-y text-center">

					<?php foreach ( $plans as $plan ) :
            if ( 'yes' == $plan['popular'] ) {
              $plan['btn_color'] = 'btn-success';
            }
          ?>
	          <div class="<?php echo $col_class; ?>">
	            <div class="pricing-1">
	              <p class="plan-name"><?php echo $plan['name']; ?></p>
	              <br>
	              <?php if ( '' !== $plan['price'] ) : ?>

		              <?php if ( 'yes' == $plan['popular'] ) : ?>
		              	<h2 class="price text-success">
		              <?php else : ?>
		              	<h2 class="price">
		              <?php endif; ?>
		              	<span class="price-unit"><?php echo $plan['price_unit']; ?></span>
		              	<span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['price'] ); ?>" data-yearly="<?php echo esc_attr( $plan['price_yearly'] ); ?>"><?php echo $plan['price']; ?></span>
		              	<span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="<?php echo esc_attr( $plan['period'] ); ?>" data-yearly="<?php echo esc_attr( $plan['period_yearly'] ); ?>"><?php echo $plan['period']; ?></span>
		              </h2>
		              <br>

	            	<?php endif; ?>

	              <small><?php echo nl2br( $plan['features'] ); ?></small>
	              <br><br>
	              <p class="text-center py-3">
	                <a class="btn <?php esc_attr_e( $plan['btn_color'] ); ?> <?php esc_attr_e( $plan['btn_outline'] ); ?> <?php esc_attr_e( $plan['btn_round'] ); ?> <?php esc_attr_e( $plan['btn_class'] ); ?>" href="<?php echo esc_url( $plan['btn_link'] ); ?>"><?php echo $plan['btn_text']; ?></a>
	              </p>
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

      <# if ( 'yes' == settings.t1_yearly_pricing_plan ) { #>
      <div class="text-center mb-70">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-round btn-outline {{ settings.t1_plans_toggle_color }} active" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="monthly" autocomplete="off" checked> {{{ settings.t1_monthly_text }}}
          </label>
          <label class="btn btn-round btn-outline {{ settings.t1_plans_toggle_color }}" style="min-width: 150px">
            <input type="radio" name="pricing-<?php echo $radio_id; ?>" value="yearly" autocomplete="off"> {{{ settings.t1_yearly_text }}}
          </label>
        </div>
      </div>
      <# } #>

      <div class="row gap-y text-center">
			<#

			function nl2br (str, is_xhtml) {
			   var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
			   return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
			}

			var plans = settings.t1_pricing_plan;
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
          if ( 'yes' == plan.popular ) {
            plan.btn_color = 'btn-success';
          }
				#>
        <div class="{{ col_class }}">
          <div class="pricing-1">
            <p class="plan-name">{{{ plan.name }}}</p>
            <br>
            <# if ( '' !== plan.price ) { #>
              <# if ( 'yes' == plan.popular ) { #>
              	<h2 class="price text-success">
              <# } else { #>
              	<h2 class="price">
              <# } #>
              	<span class="price-unit">{{{ plan.price_unit }}}</span>
              	<span data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.price }}" data-yearly="{{ plan.price_yearly }}">{{{ plan.price }}}</span>
              	<span class="plan-period" data-bind-radio="pricing-<?php echo $radio_id; ?>" data-monthly="{{ plan.period }}" data-yearly="{{ plan.period_yearly }}">{{{ plan.period }}}</span>
              </h2>
              <br>
            <# } #>

            <small>{{{ nl2br( plan.features ) }}}</small>
            <br><br>
            <p class="text-center py-3">
              <a class="btn {{ plan.btn_color }} {{ plan.btn_outline }} {{ plan.btn_round }} {{ plan.btn_class }}" href="{{ plan.btn_link }}">{{{ plan.btn_text }}}</a>
            </p>
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
