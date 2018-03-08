<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Content_Block_3 {

  const ID = 3;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
      'bg_gray' => true,
    ] );

    $widget->panel( 'header_content', [
      'small'  => esc_html__( 'News', 'thesaas' ),
      'header' => esc_html__( 'Latest Blog Posts', 'thesaas' ),
      'lead'   => esc_html__( 'We are so excited and proud of our theme. It is really easy to create a landing page for your awesome product.', 'thesaas' ),
    ] );


    $widget->panel( 'button', [
      'text' => esc_html__( 'View all', 'thesaas' ),
      'outline' => true,
      'color' => 'btn-primary',
      'link' => thesaas_get_blog_posts_page_url(),
    ] );

  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();

    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3,
        //'category' => 3,
        'post_status' => 'publish'
    ));

    ?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

        <div class="row gap-y">
          
          <?php foreach( $recent_posts as $post ) : ?>
          <?php
            $post_id = $post['ID'];
            $url = get_permalink( $post_id );
            $content = '';
            if ( has_excerpt( $post_id ) ) {
              $content = get_the_excerpt( $post_id );
            }
            else {
              $extended = get_extended( get_post_field( 'post_content', $post_id ) );
              $content = $extended['main'];
            }
          ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card card-bordered card-hover-shadow">
                <a href="<?php echo esc_url( $url ); ?>">
                <?php echo get_the_post_thumbnail( $post_id, 'thesaas-featured-image', [ 'class' => 'card-img-top' ] ); ?>
                </a>
                <div class="card-block">
                  <h4 class="card-title"><a href="<?php echo esc_url( $url ); ?>"><?php echo $post['post_title'] ?></a></h4>
                  <p class="card-text"><?php echo $content; ?></p>
                  <a class="fw-600 fs-12" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Read more', 'thesaas' ); ?> <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
        <?php endforeach; ?>

        </div>

        <br><br>
        <p class="text-center">
          <?php $widget->html('button'); ?>
        </p>

    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );


    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3,
        'post_status' => 'publish'
    ));

    ?>
    <?php $widget->js('section_tag'); ?>
      <?php $widget->js('section_header'); ?>

        <div class="row gap-y">
          
          <?php foreach( $recent_posts as $post ) : ?>
          <?php
            $post_id = $post['ID'];
            $url = get_permalink( $post_id );
            $content = '';
            if ( has_excerpt( $post_id ) ) {
              $content = get_the_excerpt( $post_id );
            }
            else {
              $extended = get_extended( get_post_field( 'post_content', $post_id ) );
              $content = $extended['main'];
            }
          ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card card-bordered card-hover-shadow">
                <a href="<?php echo esc_url( $url ); ?>">
                <?php echo get_the_post_thumbnail( $post_id, 'thesaas-featured-image', [ 'class' => 'card-img-top' ] ); ?>
                </a>
                <div class="card-block">
                  <h4 class="card-title"><a href="<?php echo esc_url( $url ); ?>"><?php echo $post['post_title'] ?></a></h4>
                  <p class="card-text"><?php echo $content; ?></p>
                  <a class="fw-600 fs-12" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Read more', 'thesaas' ); ?> <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
        <?php endforeach; ?>

        </div>

        <br><br>
        <p class="text-center">
          <?php $widget->js('button'); ?>
        </p>

    </div></section>
    <?php
  }

}
