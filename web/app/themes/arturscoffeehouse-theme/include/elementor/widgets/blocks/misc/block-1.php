<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Misc_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

    $widget->panel( 'header_content', [
      'small'  => esc_html__( 'Jobs', 'thesaas' ),
      'header' => esc_html__( 'Open Positions', 'thesaas' ),
      'lead'   => esc_html__( 'Following list displays our current required positions. This list will update regularly.', 'thesaas' ),
    ] );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

    $id = rand();
    $counter = 1;

    $jobs = get_posts( array(
      'post_type'   => 'job'
    ) );

		?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

        <div class="accordion" id="accordion-job-<?php echo $id; ?>">

          <?php
          foreach ( $jobs as $job ) :
            $custom = get_post_custom( $job->ID );
            $location = ( isset( $custom['location'][0] ) ) ? $custom['location'][0] : '';
          ?>
          <div class="card">
            <h5 class="card-title">
              <a class="d-flex collapsed" data-toggle="collapse" data-parent="#accordion-job-<?php echo $id; ?>" href="#collapse-job-<?php echo $id; ?>-<?php echo $counter; ?>">
                <span class="mr-auto"><?php echo $job->post_title; ?></span>
                <?php if ( ! empty( $location ) ) : ?>
                <span class="text-lighter hidden-sm-down"><i class="fa fa-map-marker mr-8"></i> <?php echo $location; ?></span>
                <?php endif; ?>
              </a>
            </h5>

            <div id="collapse-job-<?php echo $id; ?>-<?php echo $counter; ?>" class="collapse">
              <div class="card-block">
                <p><?php echo $job->post_excerpt; ?></p>

                <hr class="w-100">

                <p class="text-center"><a class="btn btn-lg btn-primary" href="<?php echo esc_url( get_post_permalink( $job->ID ) ) ?>"><?php esc_html_e( 'Apply Now', 'thesaas' ); ?></a></p>
              </div>
            </div>
          </div>
        <?php $counter++; endforeach; ?>

        </div>

    </div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );

    $id = rand();
    $counter = 1;

    $jobs = get_posts( array(
      'post_type'   => 'job'
    ) );

		?>
    <?php $widget->js('section_tag'); ?>
      <?php $widget->js('section_header'); ?>

        <div class="accordion" id="accordion-job-<?php echo $id; ?>">

          <?php
          foreach ( $jobs as $job ) :
            $custom = get_post_custom( $job->ID );
            $location = ( isset( $custom['location'][0] ) ) ? $custom['location'][0] : '';
          ?>
          <div class="card">
            <h5 class="card-title">
              <a class="d-flex collapsed" data-toggle="collapse" data-parent="#accordion-job-<?php echo $id; ?>" href="#collapse-job-<?php echo $counter; ?>">
                <span class="mr-auto"><?php echo $job->post_title; ?></span>
                <?php if ( ! empty( $location ) ) : ?>
                <span class="text-lighter hidden-sm-down"><i class="fa fa-map-marker mr-8"></i> <?php echo $location; ?></span>
                <?php endif; ?>
              </a>
            </h5>

            <div id="collapse-job-<?php echo $counter; ?>" class="collapse">
              <div class="card-block">
                <p><?php echo $job->post_excerpt; ?></p>

                <hr class="w-100">

                <p class="text-center"><a class="btn btn-lg btn-primary" href="<?php echo esc_url( get_post_permalink( $job->ID ) ) ?>"><?php esc_html_e( 'Apply Now', 'thesaas' ); ?></a></p>
              </div>
            </div>
          </div>
        <?php $counter++; endforeach; ?>

        </div>

    </div></section>
		<?php
	}

}
