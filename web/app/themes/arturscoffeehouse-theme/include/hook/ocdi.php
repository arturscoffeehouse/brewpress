<?php


function thesaas_ocdi_import_files() {
  return array(
    array(
      'import_file_name'         => 'Demo Content',
      'categories'               => array( 'All' ),
      'local_import_file'        => trailingslashit( get_template_directory() ) . 'assets/data/demo-content.xml',
      'import_preview_image_url' => get_template_directory_uri() . '/screenshot.png',
      'import_notice'            => esc_html__( 'Please notice that importing all pages are not a recommended way to start, while you can only import the only pages that you need. To import selected pages, please watch the following video to learn how to use our page builder to add predesigned templates to your page: ', 'thesaas' ) . '<a href="https://www.youtube.com/watch?v=M5S_JBRjd1s" target="_blank">https://www.youtube.com/watch?v=M5S_JBRjd1s</a><br><br>'. esc_html__( 'If you still persist on importing all the data, press the following button and wait while data is importing. If you need to import WooCommerce products, you should install and activate WooCommerce plugin before pressing the following button.', 'thesaas' ),
      'preview_url'              => 'http://thetheme.io/wp/thesaas',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'thesaas_ocdi_import_files' );


function thesaas_ocdi_after_import( $selected_import ) {
  
  // Config customizer
  //
  set_theme_mod( 'logo_default', get_template_directory_uri() . '/assets/img/logo.png' );
  set_theme_mod( 'logo_light', get_template_directory_uri() . '/assets/img/logo-light.png' );


  // Set Menu
  //
  $menu_topbar  = get_term_by('name', 'Topbar Menu', 'nav_menu');
  $menu_footer  = get_term_by('name', 'Primary Footer Menu', 'nav_menu');
  $menu_footer2 = get_term_by('name', 'Secondary Footer Menu', 'nav_menu');
  set_theme_mod( 'nav_menu_locations' , array( 
    'topbar' => $menu_topbar->term_id,
    'footer' => $menu_footer->term_id,
    'footer-secondary' => $menu_footer2->term_id,
  ));


  // Assign front page and posts page (blog page)
  // 
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'thesaas_ocdi_after_import' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


