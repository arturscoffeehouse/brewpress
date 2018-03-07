<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Portfolio_Block_2 {

  const ID = 2;

  public function controls( $widget ) {
    $widget->set_id( self::ID );
    $id = self::ID;

    $widget->panel( 'section', [
      'includes' => [ 'bg_gray' ],
    ] );

    $widget->panel( 'header_content', [
      'small'  => esc_html__( 'Demo', 'thesaas' ),
      'header' => esc_html__( 'Sample Landing Pages', 'thesaas' ),
      'lead'   => esc_html__( 'Apart from internal pages, we have designed several single sample pages to get start with.', 'thesaas' ),
    ] );


    The_Controls::start_section( $widget, 'portfolio', $id );

    $widget->add_control(
      't'. $id . '_filterable',
      The_Controls::option_switch( esc_html__( 'Filterable items', 'thesaas' ), [], [
        'default' => '',
        'return' => 'yes',
      ] )
    );

    $widget->add_control(
      't'. $id . '_columns',
      The_Controls::option_slider( esc_html__( 'Columns', 'thesaas' ), [], [
        'min'  => 2,
        'max'  => 4,
        'default' => 3,
      ] )
    );

    $posts = array();
    $posts[0] = esc_html__( 'None', 'thesaas' );

    $portfolio_posts = get_posts( array(
      'numberposts' => -1,
      'post_type'   => 'portfolio',
    ) );

    foreach ( $portfolio_posts as $post ) {
      $posts[ $post->ID ] = $post->post_title;
    }


    $items = [
      [
        'title' => esc_html__( 'Helpato', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-helpato-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Trello', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-trello-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Gmail', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-gmail-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Skype', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-skype-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'GitHub', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-github-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Mobile App', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-app-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Bootstrap', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-bootstrap-sm.jpg' ) ],
        'url' => '#',
      ],
      [
        'title' => esc_html__( 'Slack', 'thesaas' ),
        'image' => [ 'url' => thesaas_get_img_uri( 'demo-slack-sm.jpg' ) ],
        'url' => '#',
      ],
    ];

    $widget->add_control(
      't'. $id .'_items',
      [
        'label' => esc_html__( 'Items', 'thesaas' ),
        'type' => Controls_Manager::REPEATER,
        'default' => $items,
        'fields' => [
          [
            'name' => 'post',
            'label' => esc_html__( 'Select a portfolio post', 'thesaas' ),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'default' => '0',
            'label' => esc_html__( 'Select None to insert manually', 'thesaas' ),
            'description' => '<a href="'. admin_url() .'post-new.php?post_type=portfolio" target="_blank">'. esc_html__( 'Add new portfolio', 'thesaas' ) .'</a>',
            'options' => $posts,
          ],
          [
            'name' => 'title',
            'label' => esc_html__( 'Title', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'condition' => [
              'post' => '0',
            ],
          ],
          [
            'name' => 'link',
            'label' => esc_html__( 'Link', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'condition' => [
              'post' => '0',
            ],
          ],
          [
            'name' => 'image',
            'label' => esc_html__( 'Image', 'thesaas' ),
            'type' => Controls_Manager::MEDIA,
            'default' => [
              'url' => thesaas_get_img_uri( 'placeholder.jpg' ),
            ],
            'condition' => [
              'post' => '0',
            ],
          ],
          [
            'name' => 'groups',
            'label' => esc_html__( 'Group', 'thesaas' ),
            'description' => esc_html__( 'Comma separated group names. It\'s required if you need filterable items.', 'thesaas' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'condition' => [
              'post' => '0',
            ],
          ],
        ],
        'title_field' => '{{{ title }}}',
        'separator' => isset( $arg['separator'] ) ? 'before' : 'default',
      ]
    );

    The_Controls::end_section( $widget );
  }



  public function html( $widget ) {
    $widget->set_id( self::ID );
    $settings = $widget->get_settings();

    $cols = $settings['t2_columns']['size'];
    $col_class = 'col-12';
    switch ( $cols ) {
      case 1:
        $col_class = 'col-12';
        break;

      case 2:
        $col_class = 'col-12 col-md-6';
        break;

      case 3:
        $col_class = 'col-12 col-lg-4';
        break;

      case 4:
        $col_class = 'col-6 col-lg-3';
        break;

      default:
        $col_class = 'col-12 col-md-6';
        break;
    }

    $filterable = false;
    if ( 'yes' == $settings['t2_filterable'] ) {
      $filterable = true;
    }

    ?>
    <?php $widget->html('section_tag'); ?>
      <?php $widget->html('section_header'); ?>

      <?php if ( $filterable ) : ?>
        <div data-provide="shuffle">
          <div class="text-center gap-multiline-items-2" data-shuffle="filter">
            <button class="btn btn-outline btn-round btn-info active" data-shuffle="button" style="min-width: 100px;"><?php esc_html_e( 'All', 'thesaas' ); ?></button>
            <?php
            $filters = array();
            foreach ( $settings['t2_items'] as $item ) {
              if ( '0' == $item['post'] ) {
                if ( empty( $item['groups'] ) ) {
                  continue;
                }

                $groups = explode( ',', $item['groups'] );
                foreach ($groups as $key => $value) {
                  $filters[ trim( strtolower( $value ) ) ] = $value;
                }
              }
              else {
                $id = intval( $item['post'] );
                $cats = wp_get_post_terms( $id, 'portfolio_category' );
                foreach ($cats as $cat) {
                  $filters[ trim( strtolower( $cat->slug ) ) ] = $cat->name;
                }
              }
            }

            foreach ( $filters as $key => $value ) {
              $key = str_replace( ', ', ',', $key );
              $key = str_replace( ' ', '_', $key );
              
              echo '<button class="btn btn-outline btn-round btn-info" data-shuffle="button" data-group="'. $key .'" style="min-width: 100px;">'. $value .'</button>';
            }
            ?>
          </div>

          <br><br>

          <div class="row gap-y gap-2 text-center" data-shuffle="list">
      <?php else: ?>
        <div>
          <div class="row gap-y gap-2 text-center">
      <?php endif; ?>


          <?php
          foreach ( $settings['t2_items'] as $item ) :

            $title = $item['title'];
            $description = $item['groups'];
            $image = $item['image']['url'];
            $link = $item['link'];

            $groups = strtolower( $item['groups'] );
            $groups = str_replace( ', ', ',', $groups );
            $groups = str_replace( ' ', '_', $groups );

            if ( '0' !== $item['post'] ) {
              $id = intval( $item['post'] );
              $post = get_post( $id );
              $cats = wp_get_post_terms( $id, 'portfolio_category' );

              $title = $post->post_title;
              $image = get_the_post_thumbnail_url( $id, 'thesaas-featured-image' );
              $link = get_post_permalink( $id );
              
              $cat_str = array();
              $slug_str = array();
              foreach ($cats as $cat) {
                $cat_str[] = $cat->name;
                $slug_str[] = $cat->slug;
              }

              $description = implode( ', ', $cat_str );
              $groups = implode( ',', $slug_str );
            }
          ?>
            <?php if ( $filterable ) : ?>
              <div class="<?php echo $col_class; ?> portfolio-2" data-shuffle="item" data-groups="<?php echo esc_attr( $groups ); ?>">
            <?php else: ?>
              <div class="<?php echo $col_class; ?> portfolio-2">
            <?php endif; ?>
              <p><a href="<?php echo esc_url( $link ); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>"></a></p>
              <p><strong><?php echo $title; ?></strong><br><small><?php echo $description; ?></small></p>
            </div>

          <?php endforeach; ?>

        </div>
      </div>

    </div></section>
    <?php
  }



  public function javascript( $widget ) {
    $widget->set_id( self::ID );

    ?>

    <?php $widget->js('section_tag'); ?>
      <?php $widget->js('section_header'); ?>

        <p class="text-center">
          <?php esc_html_e( 'You\'ll see portfolio items after saving and reloading the page.', 'thesaas' ); ?>
        </p>

    </div></section>
    <?php
  }

}
