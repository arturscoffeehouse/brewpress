<?php

/**
 * Contains methods for customizing the theme customization screen.
 */

class Thesaas_Customizer {

  /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    *
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    */
  public static function register ( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector' => '.site-title a',
      'render_callback' => function() {
        bloginfo( 'name' );
      },
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector' => '.site-description',
      'render_callback' => function() {
        bloginfo( 'description' );
      },
    ) );


    /**
    * Custom logo.
    */
    $wp_customize->add_setting( 'logo_default', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_default', array(
      'label'      => esc_html__( 'Logo', 'thesaas' ),
      'section'    => 'title_tagline',
      'settings'   => 'logo_default',
      'priority'   => 1,
    ) ) );

    $wp_customize->add_setting( 'logo_light', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_light', array(
      'label'      => esc_html__( 'Logo light', 'thesaas' ),
      'section'    => 'title_tagline',
      'settings'   => 'logo_light',
      'priority'   => 2,
    ) ) );

    $wp_customize->add_setting( 'logo_footer', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer', array(
      'label'      => esc_html__( 'Footer Logo', 'thesaas' ),
      'section'    => 'title_tagline',
      'settings'   => 'logo_footer',
      'priority'   => 3,
    ) ) );




    self::panel_configuration( $wp_customize );
    self::panel_style( $wp_customize );
    self::panel_topbar( $wp_customize );
    self::panel_header( $wp_customize );
    self::panel_footer( $wp_customize );
    self::panel_show_hide( $wp_customize );
    //self::panel_social( $wp_customize );
    self::panel_add_script( $wp_customize );



    /**
    * Static front page
    */
    /*
    // Portfolio page
    $wp_customize->add_setting( 'portfolio_page_id', array(
      'default' => 0,
      'sanitize_callback' => [ __CLASS__, 'sanitize_callback_dropdown_page' ],
    ) );

    $wp_customize->add_control( 'portfolio_page_id', array(
      'type' => 'dropdown-pages',
      'section' => 'static_front_page', // Add a default or your own section
      'label' => __( 'Portfolio page', 'thesaas' ),
      'description' => __( 'Overwrite the default portfolio archive page.', 'thesaas' ),
    ) );

    // Job page
    $wp_customize->add_setting( 'job_page_id', array(
      'default' => 0,
      'sanitize_callback' => [ __CLASS__, 'sanitize_callback_dropdown_page' ],
    ) );

    $wp_customize->add_control( 'job_page_id', array(
      'type' => 'dropdown-pages',
      'section' => 'static_front_page', // Add a default or your own section
      'label' => __( 'Job page', 'thesaas' ),
      'description' => __( 'Overwrite the default job archive page.', 'thesaas' ),
    ) );
    */



  }


  /**
    * This will output the custom WordPress settings to the live theme's WP head.
    *
    * Used by hook: 'wp_head'
    *
    * @see add_action('wp_head',$func)
    */
  public static function header_output() {
    return;
    ?>
    <!--Customizer CSS-->
    <style type="text/css">
      <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?>
      <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?>
      <?php self::generate_css('a', 'color', 'link_textcolor'); ?>
    </style>
    <!--/Customizer CSS-->
    <?php
  }


  /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    *
    * Used by hook: 'customize_preview_init'
    *
    * @see add_action('customize_preview_init',$func)
    */
  public static function live_preview() {
    wp_enqueue_script(
      'the-customizer',
      get_template_directory_uri() . '/assets/js/the-customizer.js',
      array( 'jquery', 'customize-preview' ),
      '',
      true
    );
  }

  /**
  * This will generate a line of CSS for use in header output. If the setting
  * ($mod_name) has no defined value, the CSS will not be output.
  *
  * @uses get_theme_mod()
  * @param string $selector CSS selector
  * @param string $style The name of the CSS *property* to modify
  * @param string $mod_name The name of the 'theme_mod' option to fetch
  * @param string $prefix Optional. Anything that needs to be output before the CSS property
  * @param string $postfix Optional. Anything that needs to be output after the CSS property
  * @param bool $echo Optional. Whether to print directly to the page (default: true).
  * @return string Returns a single line of CSS with selectors and a property.
  */
  public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
    $return = '';
    $mod = get_theme_mod($mod_name);
    if ( ! empty( $mod ) ) {
      $return = sprintf('%s { %s:%s; }',
        $selector,
        $style,
        $prefix.$mod.$postfix
      );
      if ( $echo ) {
        echo $return;
      }
    }
    return $return;
  }



  public static function sanitize_callback_dropdown_page( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    if ( 0 == $page_id ) {
      return 0;
    }

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
  }




  public static function panel_configuration( $wp_customize ) {
    $link_google_api = 'https://developers.google.com/maps/documentation/javascript/get-api-key';

    $wp_customize->add_section( 'site_config_settings', array(
      'title' => esc_html__( 'Site Configuration', 'thesaas' ),
      'priority' => 20,
    ));

    // API Key
    $wp_customize->add_setting( "google_api_key", array(
      'sanitize_callback' => 'esc_js',
    ));

    $wp_customize->add_control( 'google_api_key', array(
      'label' => esc_html__( "Google Map API key", 'thesaas' ),
      'description' => '<a href="'. esc_url( $link_google_api ) .'" target="#">'. esc_html__( 'Get API Key', 'thesaas' ) .'</a>',
      'section' => 'site_config_settings',
      'type' => 'text',
    ));

    // Analytics ID
    $wp_customize->add_setting( "google_analytics_id", array(
      'sanitize_callback' => 'esc_js',
    ));

    $wp_customize->add_control( 'google_analytics_id', array(
      'label' => esc_html__( "Google Analytics Tracking ID", 'thesaas' ),
      'description' => esc_html__( 'Your tracking ID would be a value in this format: UA-12345678-9', 'thesaas' ),
      'section' => 'site_config_settings',
      'type' => 'text',
    ));

    // Blog style
    $wp_customize->add_setting( 'blog_list_style', array(
      'default' => 'grid',
      'sanitize_callback' => 'esc_js',
    ) );
    $wp_customize->add_control( 'blog_list_style', array(
      'label'   => esc_html__( 'Blog list style', 'thesaas' ),
      'section' => 'site_config_settings',
      'type'    => 'select',
      'settings' => 'blog_list_style',
      'choices' => [
        'grid' => esc_html__( "Grid", 'thesaas' ),
        'list' => esc_html__( "List", 'thesaas' ),
        'classic' => esc_html__( "Classic", 'thesaas' ),
      ],
    ));
  }




  public static function panel_style( $wp_customize ) {
    $wp_customize->add_section( 'style_settings', array(
      'title' => esc_html__( 'Style', 'thesaas' ),
      'priority' => 20,
    ));

    // Body font 
    //
    $wp_customize->add_setting( 'custom_font_body' );

    $wp_customize->add_control( 'custom_font_body', array(
      'label' => esc_html__( 'Body font (e.g. Open Sans)', 'thesaas' ),
      'section' => 'style_settings',
      'type' => 'text',
      'description' => '<a href="https://fonts.google.com/" target="_blank">'. esc_html__( 'Available fonts?', 'thesaas' ) .'</a>',
    ));

    // Title font 
    //
    $wp_customize->add_setting( 'custom_font_title' );

    $wp_customize->add_control( 'custom_font_title', array(
      'label' => esc_html__( 'Title font (e.g. Dosis)', 'thesaas' ),
      'section' => 'style_settings',
      'type' => 'text',
      'description' => '<a href="https://fonts.google.com/" target="_blank">'. esc_html__( 'Available fonts?', 'thesaas' ) .'</a>',
    ));

    // Primary color
    //
    $wp_customize->add_setting( 'custom_color_primary', array(
      'default'           => '#0facf3',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_color_primary', array(
      'label'      => esc_html__( 'Primary color', 'thesaas' ),
      //'mode'       => 'hue',
      'section'    => 'style_settings',
      'settings'   => 'custom_color_primary',
    ) ) );
  }



  public static function panel_topbar( $wp_customize ) {

    $wp_customize->add_panel( 'topbar_settings', array(
      'title' => esc_html__( 'Topbar', 'thesaas' ),
      'priority' => 30,
    ));

    $wp_customize->add_section( 'topbar_settings_general', array(
      'title' => esc_html__( 'General', 'thesaas' ),
      'panel' => 'topbar_settings',
    ));

    

    // Topbar menu
    $wp_customize->add_setting( "topbar_toggle_type", array(
      'default' => 'hover',
    ));
    $wp_customize->add_control( 'topbar_toggle_type', array(
      'label' => esc_html__( "Toggle menu on", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'radio',
      'choices' => [
        'hover' => esc_html__( "Hover", 'thesaas' ),
        'click' => esc_html__( "Click", 'thesaas' ),
      ],
    ));

    // Hamburger icon position
    $wp_customize->add_setting( "topbar_toggler_position", array(
      'default' => 'left',
    ));
    $wp_customize->add_control( 'topbar_toggler_position', array(
      'label' => esc_html__( "Hamburger icon ( &#9776; ) position", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'radio',
      'choices' => [
        'left' => esc_html__( "Left", 'thesaas' ),
        'right' => esc_html__( "Right", 'thesaas' ),
      ],
    ));


    // Topbar container size
    $wp_customize->add_setting( 'global_topbar_container', array(
      'default'           => 'container',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'global_topbar_container', array(
      'label'   => esc_html__( 'Container type', 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type'    => 'select',
      'settings' => 'global_topbar_container',
      'choices' => [
        'container'       => esc_html__( "Default", 'thesaas' ),
        'container-fluid' => esc_html__( "Fluid", 'thesaas' ),
        'container-wide'  => esc_html__( "Wide", 'thesaas' ),
      ],
    ));


    // Topbar breakpoint
    $wp_customize->add_setting( 'global_topbar_breakpoint', array(
      'default'           => 'md',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'global_topbar_breakpoint', array(
      'label'   => esc_html__( 'Sceen size to display hamburger icon', 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type'    => 'select',
      'settings' => 'global_topbar_breakpoint',
      'choices' => [
        'xs' => esc_html__( "Extra small (< 575px)", 'thesaas' ),
        'sm' => esc_html__( "Small (< 767px)", 'thesaas' ),
        'md' => esc_html__( "Medium (< 991px)", 'thesaas' ),
        'lg' => esc_html__( "Large (< 1199px)", 'thesaas' ),
        'xl' => esc_html__( "Extra large (> 1200px)", 'thesaas' ),
      ],
    ));


    // Disable sticky topbar
    $wp_customize->add_setting( "topbar_disable_sticky", [
      'default' => false,
    ] );
    $wp_customize->add_control( 'topbar_disable_sticky', array(
      'label' => esc_html__( "Disable sticky behavior", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'checkbox',
    ));


    // Disable inverse topbar
    $wp_customize->add_setting( "topbar_disable_inverse", [
      'default' => false,
    ] );
    $wp_customize->add_control( 'topbar_disable_inverse', array(
      'label' => esc_html__( "Disable light text color", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'checkbox',
    ));
    
    /*
    // Sticky topbar
    $wp_customize->add_setting( "topbar_sticky", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'topbar_sticky', array(
      'label' => esc_html__( "Sticky topbar", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'checkbox',
    ));


    // Inverse topbar
    $wp_customize->add_setting( "topbar_inverse", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'topbar_inverse', array(
      'label' => esc_html__( "Light text color", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'checkbox',
    ));
    */

    // Put topbar buttons inside collapse menu
    $wp_customize->add_setting( "topbar_buttons_inside_collapse", [
      'default' => false,
    ] );
    $wp_customize->add_control( 'topbar_buttons_inside_collapse', array(
      'label' => esc_html__( "Put topbar buttons inside collapse menu", 'thesaas' ),
      'section' => 'topbar_settings_general',
      'type' => 'checkbox',
    ));



    $wp_customize->add_section( 'topbar_settings_btn1', array(
      'title' => esc_html__( 'Button 1', 'thesaas' ),
      'panel' => 'topbar_settings',
    ));

    // Button 1 - Text
    $wp_customize->add_setting( "topbar_btn_1_text", array(
      'sanitize_callback' => 'esc_js',
    ));
    $wp_customize->add_control( 'topbar_btn_1_text', array(
      'label' => esc_html__( "Text", 'thesaas' ),
      'section' => 'topbar_settings_btn1',
      'type' => 'text',
    ));


    // Button 1 - Link
    $wp_customize->add_setting( "topbar_btn_1_link", array(
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'topbar_btn_1_link', array(
      'label' => esc_html__( "Link", 'thesaas' ),
      'section' => 'topbar_settings_btn1',
      'type' => 'text',
    ));


    // Button 1 - Color
    $wp_customize->add_setting( 'topbar_btn_1_color', array(
      'default'           => 'white',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'topbar_btn_1_color', array(
      'label'   => esc_html__( 'Button 1 - Color', 'thesaas' ),
      'section' => 'topbar_settings_btn1',
      'type'    => 'select',
      'settings' => 'topbar_btn_1_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'thesaas' ),
        'secondary' => esc_html__( "Secondary", 'thesaas' ),
        'info' => esc_html__( "Info", 'thesaas' ),
        'success' => esc_html__( "Success", 'thesaas' ),
        'warning' => esc_html__( "Warning", 'thesaas' ),
        'danger' => esc_html__( "Danger", 'thesaas' ),
        'white' => esc_html__( "White", 'thesaas' ),
        'dark' => esc_html__( "Dark", 'thesaas' ),
      ],
    ));


    // Button 1 - Outline
    $wp_customize->add_setting( "topbar_btn_1_outline", [
      'default' => false,
    ] );
    $wp_customize->add_control( 'topbar_btn_1_outline', array(
      'label' => esc_html__( "Outline style", 'thesaas' ),
      'section' => 'topbar_settings_btn1',
      'type' => 'checkbox',
    ));


    // Button 1 - Class
    $wp_customize->add_setting( "topbar_btn_1_class", array(
      'sanitize_callback' => 'esc_js',
    ));
    $wp_customize->add_control( 'topbar_btn_1_class', array(
      'label' => esc_html__( "Extra classes", 'thesaas' ),
      'section' => 'topbar_settings_btn1',
      'type' => 'text',
    ));





    $wp_customize->add_section( 'topbar_settings_btn2', array(
      'title' => esc_html__( 'Button 2', 'thesaas' ),
      'panel' => 'topbar_settings',
    ));

    // Button 2 - Text
    $wp_customize->add_setting( "topbar_btn_2_text", array(
      'sanitize_callback' => 'esc_js',
    ));
    $wp_customize->add_control( 'topbar_btn_2_text', array(
      'label' => esc_html__( "Text", 'thesaas' ),
      'section' => 'topbar_settings_btn2',
      'type' => 'text',
    ));


    // Button 2 - Link
    $wp_customize->add_setting( "topbar_btn_2_link", array(
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'topbar_btn_2_link', array(
      'label' => esc_html__( "Link", 'thesaas' ),
      'section' => 'topbar_settings_btn2',
      'type' => 'text',
    ));


    // Button 2 - Color
    $wp_customize->add_setting( 'topbar_btn_2_color', array(
      'default'           => 'white',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'topbar_btn_2_color', array(
      'label'   => esc_html__( 'Button 2 - Color', 'thesaas' ),
      'section' => 'topbar_settings_btn2',
      'type'    => 'select',
      'settings' => 'topbar_btn_2_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'thesaas' ),
        'secondary' => esc_html__( "Secondary", 'thesaas' ),
        'info' => esc_html__( "Info", 'thesaas' ),
        'success' => esc_html__( "Success", 'thesaas' ),
        'warning' => esc_html__( "Warning", 'thesaas' ),
        'danger' => esc_html__( "Danger", 'thesaas' ),
        'white' => esc_html__( "White", 'thesaas' ),
        'dark' => esc_html__( "Dark", 'thesaas' ),
      ],
    ));


    // Button 2 - Outline
    $wp_customize->add_setting( "topbar_btn_2_outline", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'topbar_btn_2_outline', array(
      'label' => esc_html__( "Outline style", 'thesaas' ),
      'section' => 'topbar_settings_btn2',
      'type' => 'checkbox',
    ));


    // Button 2 - Class
    $wp_customize->add_setting( "topbar_btn_2_class", array(
      'sanitize_callback' => 'esc_js',
    ));
    $wp_customize->add_control( 'topbar_btn_2_class', array(
      'label' => esc_html__( "Extra classes", 'thesaas' ),
      'section' => 'topbar_settings_btn2',
      'type' => 'text',
    ));
  }


  public static function panel_header( $wp_customize ) {
    $wp_customize->add_section( 'section_header', array(
      'title' => esc_html__( 'Header', 'thesaas' ),
      'priority' => 30,
    ));

    $wp_customize->add_setting( 'header_bg_color', array(
      'default'           => '#c2b2cd',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
      'label'      => esc_html__( 'Default background color', 'thesaas' ),
      //'mode'       => 'hue',
      'section'    => 'section_header',
      'settings'   => 'header_bg_color',
      'priority'   => 3,
    ) ) );


    $wp_customize->add_setting( 'page_bg_img', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'page_bg_img', array(
      'label'       => esc_html__( 'Default background image', 'thesaas' ),
      'description' => esc_html__( 'If you set this value, an image displays in headers instead of background color.', 'thesaas' ),
      'section'     => 'section_header',
      'settings'    => 'page_bg_img',
      'priority'    => 4,
    ) ) );

    $wp_customize->add_setting( 'page_overlay_color', array(
      'default'           => '#191919',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_overlay_color', array(
      'label'      => esc_html__( 'Background image overlay color', 'thesaas' ),
      //'mode'       => 'hue',
      'section'    => 'section_header',
      'settings'   => 'page_overlay_color',
      'priority'   => 5,
    ) ) );

    $wp_customize->add_setting( 'page_overlay_opacity', array(
      'default'           => '7',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'page_overlay_opacity', array(
      'label'   => esc_html__( 'Background image overlay color', 'thesaas' ),
      'section' => 'section_header',
      'type'    => 'select',
      'settings' => 'page_overlay_opacity',
      'choices' => [
        '1' => esc_html__( "10%", 'thesaas' ),
        '2' => esc_html__( "20%", 'thesaas' ),
        '3' => esc_html__( "30%", 'thesaas' ),
        '4' => esc_html__( "40%", 'thesaas' ),
        '5' => esc_html__( "50%", 'thesaas' ),
        '6' => esc_html__( "60%", 'thesaas' ),
        '7' => esc_html__( "70%", 'thesaas' ),
        '8' => esc_html__( "80%", 'thesaas' ),
        '9' => esc_html__( "90%", 'thesaas' ),
      ],
      'priority'   => 5,
    ));

    // Inverse color
    $wp_customize->add_setting( "header_inverse_color", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'header_inverse_color', array(
      'label' => esc_html__( "White text color", 'thesaas' ),
      'section' => 'section_header',
      'type' => 'checkbox',
    ));
  }


  public static function panel_footer( $wp_customize ) {

    $wp_customize->add_panel( 'panel_footer', array(
      'title' => esc_html__( 'Footer', 'thesaas' ),
      'priority' => 31,
    ));


    // General
    //
    $wp_customize->add_section( 'section_footer_general', array(
      'title' => esc_html__( 'General options', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    // Layout
    $wp_customize->add_setting( 'footer_layout', array(
      'default'           => '1',
    ) );
    $wp_customize->add_control( 'footer_layout', array(
      'label'   => esc_html__( 'Footer layout', 'thesaas' ),
      'description'   => __( 'See available layouts in <a href="http://thetheme.io/thesaas/block-footer.html">here</a>', 'thesaas' ),
      'type'    => 'select',
      'settings' => 'footer_layout',
      'section' => 'section_footer_general',
      'choices' => [
        '1' => esc_html__( "Layout 1", 'thesaas' ),
        '2' => esc_html__( "Layout 2", 'thesaas' ),
        '3' => esc_html__( "Layout 3", 'thesaas' ),
        '4' => esc_html__( "Layout 4", 'thesaas' ),
        '5' => esc_html__( "Layout 5", 'thesaas' ),
      ],
    ));


    // Social
    //
    $wp_customize->add_section( 'section_footer_social', array(
      'title' => esc_html__( 'Social icons', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    $social_sites = thesaas_social_sites();

    foreach( $social_sites as $social_site ) {
      $wp_customize->add_setting( 'social_'. $social_site, array(
        'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control( 'social_'. $social_site, array(
        'label' => ucwords( $social_site ) . ' ' . esc_html__( 'URL:', 'thesaas' ),
        'section' => 'section_footer_social',
        'type' => 'text',
      ));
    }

    // Footer 1
    // 
    $wp_customize->add_section( 'section_footer_1', array(
      'title' => esc_html__( 'Footer 1', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    // Copyright text
    $wp_customize->add_setting( 'footer1_copyright', [
      'default' => esc_html__( '', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer1_copyright', array(
      'label' => esc_html__( 'Copyright text', 'thesaas' ),
      'description' => esc_html__( 'A text to display in the second row', 'thesaas' ),
      'section' => 'section_footer_1',
      'type' => 'textarea',
    ));


    // Footer 2
    // 
    $wp_customize->add_section( 'section_footer_2', array(
      'title' => esc_html__( 'Footer 2', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    // Copyright text
    $wp_customize->add_setting( 'footer2_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer2_copyright', array(
      'label' => esc_html__( 'Copyright text', 'thesaas' ),
      'section' => 'section_footer_2',
      'type' => 'textarea',
    ));


    // Footer 3
    // 
    $wp_customize->add_section( 'section_footer_3', array(
      'title' => esc_html__( 'Footer 3', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    // Text
    $wp_customize->add_setting( 'footer3_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer3_text', array(
      'label' => esc_html__( 'Text', 'thesaas' ),
      'section' => 'section_footer_3',
      'type' => 'textarea',
    ));


    // Footer 4
    // 
    $wp_customize->add_section( 'section_footer_4', array(
      'title' => esc_html__( 'Footer 4', 'thesaas' ),
      'panel' => 'panel_footer'
    ));

    // Col 1 - Title
    $wp_customize->add_setting( 'footer4_col1_title', [
      'default' => esc_html__( 'TheSaaS', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col1_title', array(
      'label' => esc_html__( 'Column 1 - Title', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 1 - Text
    $wp_customize->add_setting( 'footer4_col1_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col1_text', array(
      'label' => esc_html__( 'Column 1 - Text', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));

    // Col 1 - Copyright
    $wp_customize->add_setting( 'footer4_col1_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col1_copyright', array(
      'label' => esc_html__( 'Column 1 - Copyright', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));


    // Col 2 - Title
    $wp_customize->add_setting( 'footer4_col2_title', [
      'default' => esc_html__( 'Company', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col2_title', array(
      'label' => esc_html__( 'Column 2 - Title', 'thesaas' ),
      'description' => esc_html__( 'Primary Footer Menu', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));


    // Col 3 - Title
    $wp_customize->add_setting( 'footer4_col3_title', [
      'default' => esc_html__( 'Get Started', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col3_title', array(
      'label' => esc_html__( 'Column 3 - Title', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Text
    $wp_customize->add_setting( 'footer4_col3_text', [
      'default' => esc_html__( 'TheSaaS design is harmonious, clean and user friendly. Even though the template has a lot of content, it doesn’t looks messy and all files and code are well structured, commented and divided.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col3_text', array(
      'label' => esc_html__( 'Column 3 - Text', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));

    // Col 3 - Btn1 - Title
    $wp_customize->add_setting( 'footer4_col3_btn1_text', [
      'default' => esc_html__( 'Take a test drive', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col3_btn1_text', array(
      'label' => esc_html__( 'Column 3 - Button 1 - Text', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn1 - Link
    $wp_customize->add_setting( 'footer4_col3_btn1_link', [
      'default' => '#'
    ]);
    $wp_customize->add_control( 'footer4_col3_btn1_link', array(
      'label' => esc_html__( 'Column 3 - Button 1 - Link', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn1 - Color
    $wp_customize->add_setting( 'footer4_col3_btn1_color', array(
      'default'           => 'primary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer4_col3_btn1_color', array(
      'label'   => esc_html__( 'Column 3 - Button 1 - Color', 'thesaas' ),
      'section' => 'section_footer_4',
      'type'    => 'select',
      'settings' => 'footer4_col3_btn1_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'thesaas' ),
        'secondary' => esc_html__( "Secondary", 'thesaas' ),
        'info' => esc_html__( "Info", 'thesaas' ),
        'success' => esc_html__( "Success", 'thesaas' ),
        'warning' => esc_html__( "Warning", 'thesaas' ),
        'danger' => esc_html__( "Danger", 'thesaas' ),
        'white' => esc_html__( "White", 'thesaas' ),
        'dark' => esc_html__( "Dark", 'thesaas' ),
      ],
    ));


    // Col 3 - Btn2 - Title
    $wp_customize->add_setting( 'footer4_col3_btn2_text', [
      'default' => esc_html__( 'Contact us', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer4_col3_btn2_text', array(
      'label' => esc_html__( 'Column 3 - Button 2 - Text', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn2 - Link
    $wp_customize->add_setting( 'footer4_col3_btn2_link', [
      'default' => '#'
    ]);
    $wp_customize->add_control( 'footer4_col3_btn2_link', array(
      'label' => esc_html__( 'Column 3 - Button 2 - Link', 'thesaas' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn2 - Color
    $wp_customize->add_setting( 'footer4_col3_btn2_color', array(
      'default'           => 'secondary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer4_col3_btn2_color', array(
      'label'   => esc_html__( 'Column 3 - Button 2 - Color', 'thesaas' ),
      'section' => 'section_footer_4',
      'type'    => 'select',
      'settings' => 'footer4_col3_btn2_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'thesaas' ),
        'secondary' => esc_html__( "Secondary", 'thesaas' ),
        'info' => esc_html__( "Info", 'thesaas' ),
        'success' => esc_html__( "Success", 'thesaas' ),
        'warning' => esc_html__( "Warning", 'thesaas' ),
        'danger' => esc_html__( "Danger", 'thesaas' ),
        'white' => esc_html__( "White", 'thesaas' ),
        'dark' => esc_html__( "Dark", 'thesaas' ),
      ],
    ));



    // Footer 5
    // 
    $wp_customize->add_section( 'section_footer_5', array(
      'title' => esc_html__( 'Footer 5', 'thesaas' ),
      'panel' => 'panel_footer'
    ));


    // Col 1 - Text
    $wp_customize->add_setting( 'footer5_col1_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col1_text', array(
      'label' => esc_html__( 'Column 1 - Text', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'textarea',
    ));

    // Col 1 - Copyright
    $wp_customize->add_setting( 'footer5_col1_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col1_copyright', array(
      'label' => esc_html__( 'Column 1 - Copyright', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'textarea',
    ));


    // Col 2 - Title
    $wp_customize->add_setting( 'footer5_col2_title', [
      'default' => esc_html__( 'Samples', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col2_title', array(
      'label' => esc_html__( 'Column 2 - Title', 'thesaas' ),
      'description' => esc_html__( 'Primary Footer Menu', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 3 - Title
    $wp_customize->add_setting( 'footer5_col3_title', [
      'default' => esc_html__( 'Company', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col3_title', array(
      'label' => esc_html__( 'Column 3 - Title', 'thesaas' ),
      'description' => esc_html__( 'Secondary Footer Menu', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Title
    $wp_customize->add_setting( 'footer5_col4_title', [
      'default' => esc_html__( 'Subscribe', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col4_title', array(
      'label' => esc_html__( 'Column 4 - Title', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Input placeholder
    $wp_customize->add_setting( 'footer5_col4_placeholder', [
      'default' => esc_html__( 'Email Address', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col4_placeholder', array(
      'label' => esc_html__( 'Column 4 - Input Placeholder', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Button color
    $wp_customize->add_setting( 'footer5_col4_btn_color', array(
      'default'           => 'primary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer5_col4_btn_color', array(
      'label'   => esc_html__( 'Column 4 - Button Color', 'thesaas' ),
      'section' => 'section_footer_5',
      'type'    => 'select',
      'settings' => 'footer5_col4_btn_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'thesaas' ),
        'secondary' => esc_html__( "Secondary", 'thesaas' ),
        'info' => esc_html__( "Info", 'thesaas' ),
        'success' => esc_html__( "Success", 'thesaas' ),
        'warning' => esc_html__( "Warning", 'thesaas' ),
        'danger' => esc_html__( "Danger", 'thesaas' ),
        'white' => esc_html__( "White", 'thesaas' ),
        'dark' => esc_html__( "Dark", 'thesaas' ),
      ],
    ));


    // Col 4 - MailChimp Form URL
    $wp_customize->add_setting( 'footer5_col4_mailchimp', [
      'default' => esc_html__( '', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col4_mailchimp', array(
      'label' => esc_html__( 'Column 4 - MailChimp Form URL', 'thesaas' ),
      'description' => '<a href="http://thetheme.io/thesaas/block-subscribe.html#mailchimp-integration" target="_blank">'. esc_html__( 'What is this?', 'thesaas' ) .'</a>',
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Image
    $wp_customize->add_setting( 'footer5_col4_image', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer5_col4_image', array(
      'label'      => esc_html__( 'Image', 'thesaas' ),
      'description' => esc_html__( 'If you set an image, it will replace the subscribe form', 'thesaas' ),
      'section'    => 'section_footer_5',
      'settings'   => 'footer5_col4_image',
    ) ) );


    // Col 4 - Image link address
    $wp_customize->add_setting( 'footer5_col4_image_link', [
      'default' => esc_html__( '', 'thesaas' )
    ]);
    $wp_customize->add_control( 'footer5_col4_image_link', array(
      'label' => esc_html__( 'Column 4 - Image Link Address', 'thesaas' ),
      'description' => esc_html__( 'A URL for image to be forward on click', 'thesaas' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


  }


  public static function panel_show_hide( $wp_customize ) {
    $wp_customize->add_section( 'section_show_hide', array(
      'title' => esc_html__( 'Show/Hide Feature', 'thesaas' ),
      'priority' => 40,
    ));

    // Hide topbar search
    $wp_customize->add_setting( "hide_topbar_search", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'hide_topbar_search', array(
      'label' => esc_html__( "Hide topbar search icon", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Hide cart icon from topbar
    $wp_customize->add_setting( "hide_cart_icon", [
      'default' => false,
    ] );
    $wp_customize->add_control( 'hide_cart_icon', array(
      'label' => esc_html__( "Hide cart icon from topbar", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Hide footer logo
    $wp_customize->add_setting( "hide_footer_logo" );
    $wp_customize->add_control( 'hide_footer_logo', array(
      'label' => esc_html__( "Hide footer logo", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Hide share buttons from blog posts
    $wp_customize->add_setting( "hide_post_share", [
      'default' => true,
    ] );
    $wp_customize->add_control( 'hide_post_share', array(
      'label' => esc_html__( "Hide share buttons from blog posts", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Show scroll-top button
    $wp_customize->add_setting( "show_scroll_top" );
    $wp_customize->add_control( 'show_scroll_top', array(
      'label' => esc_html__( "Show scroll-top button", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Disable tag link
    $wp_customize->add_setting( "hide_tags_list_link" );
    $wp_customize->add_control( 'hide_tags_list_link', array(
      'label' => esc_html__( "Disable link to tag page in single blog post", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));

    // Disable author link
    $wp_customize->add_setting( "hide_author_link" );
    $wp_customize->add_control( 'hide_author_link', array(
      'label' => esc_html__( "Disable link to author page in single blog post", 'thesaas' ),
      'section' => 'section_show_hide',
      'type' => 'checkbox',
    ));
  }


  public static function panel_social( $wp_customize ) {
    $wp_customize->add_section( 'social_settings', array(
      'title' => esc_html__( 'Social Icons', 'thesaas' ),
      'priority' => 120,
    ));

    $social_sites = thesaas_social_sites();

    foreach( $social_sites as $social_site ) {
      $wp_customize->add_setting( 'social_'. $social_site, array(
        'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control( 'social_'. $social_site, array(
        'label' => ucwords( $social_site ) . ' ' . esc_html__( 'URL:', 'thesaas' ),
        'section' => 'social_settings',
        'type' => 'text',
      ));
    }
  }


  public static function panel_add_script( $wp_customize ) {
    $wp_customize->add_section( 'additional_script', array(
      'title' => esc_html__( 'Additional JavaScript', 'thesaas' ),
      'priority' => 210,
    ));

    // Textarea
    //
    $wp_customize->add_setting( 'additional_script' );
    $wp_customize->add_control( 'additional_script', array(
      'label' => '',
      'section' => 'additional_script',
      'type' => 'textarea',
      'description' => esc_html__( 'This code will add to bottom of each page inside a <script> tag.', 'thesaas' ),
    ));
  }



}


// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Thesaas_Customizer' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Thesaas_Customizer' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Thesaas_Customizer' , 'live_preview' ) );
