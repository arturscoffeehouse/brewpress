<?php


// Register Custom Portfolio
function thesaas_register_portfolio_cpt() {

  $labels = array(
    'name'                  => esc_html_x( 'Portfolios', 'Portfolio General Name', 'thesaas' ),
    'singular_name'         => esc_html_x( 'Portfolio', 'Portfolio Singular Name', 'thesaas' ),
    'menu_name'             => esc_html__( 'Portfolios', 'thesaas' ),
    'name_admin_bar'        => esc_html__( 'Portfolio', 'thesaas' ),
    'archives'              => esc_html__( 'Portfolio Archives', 'thesaas' ),
    'attributes'            => esc_html__( 'Portfolio Attributes', 'thesaas' ),
    'parent_item_colon'     => esc_html__( 'Parent Portfolio:', 'thesaas' ),
    'all_items'             => esc_html__( 'All Portfolios', 'thesaas' ),
    'add_new_item'          => esc_html__( 'Add New Portfolio', 'thesaas' ),
    'add_new'               => esc_html__( 'Add New', 'thesaas' ),
    'new_item'              => esc_html__( 'New Portfolio', 'thesaas' ),
    'edit_item'             => esc_html__( 'Edit Portfolio', 'thesaas' ),
    'update_item'           => esc_html__( 'Update Portfolio', 'thesaas' ),
    'view_item'             => esc_html__( 'View Portfolio', 'thesaas' ),
    'view_items'            => esc_html__( 'View Portfolios', 'thesaas' ),
    'search_items'          => esc_html__( 'Search Portfolio', 'thesaas' ),
    'not_found'             => esc_html__( 'Not found', 'thesaas' ),
    'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'thesaas' ),
    'featured_image'        => esc_html__( 'Featured Image', 'thesaas' ),
    'set_featured_image'    => esc_html__( 'Set featured image', 'thesaas' ),
    'remove_featured_image' => esc_html__( 'Remove featured image', 'thesaas' ),
    'use_featured_image'    => esc_html__( 'Use as featured image', 'thesaas' ),
    'insert_into_item'      => esc_html__( 'Insert into portfolio', 'thesaas' ),
    'uploaded_to_this_item' => esc_html__( 'Uploaded to this portfolio', 'thesaas' ),
    'items_list'            => esc_html__( 'Portfolios list', 'thesaas' ),
    'items_list_navigation' => esc_html__( 'Portfolios list navigation', 'thesaas' ),
    'filter_items_list'     => esc_html__( 'Filter portfolios list', 'thesaas' ),
  );
  $args = array(
    'label'                 => esc_html__( 'Portfolio', 'thesaas' ),
    'description'           => esc_html__( 'Portfolio Description', 'thesaas' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
    'taxonomies'            => array( 'portfolio_category', 'portfolio_skills' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 30,
    'menu_icon'             => 'dashicons-portfolio',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'register_meta_box_cb'  => 'thesaas_register_portfolio_meta_box',
  );
  register_post_type( 'portfolio', $args );



}
add_action( 'init', 'thesaas_register_portfolio_cpt', 0 );



// Register Categories Taxonomy
function thesaas_register_portfolio_category_taxonomy() {

  $labels = array(
    'name'                       => esc_html_x( 'Categories', 'Category General Name', 'thesaas' ),
    'singular_name'              => esc_html_x( 'Category', 'Category Singular Name', 'thesaas' ),
    'menu_name'                  => esc_html__( 'Category', 'thesaas' ),
    'all_items'                  => esc_html__( 'All Categories', 'thesaas' ),
    'parent_item'                => esc_html__( 'Parent Category', 'thesaas' ),
    'parent_item_colon'          => esc_html__( 'Parent Category:', 'thesaas' ),
    'new_item_name'              => esc_html__( 'New Category Name', 'thesaas' ),
    'add_new_item'               => esc_html__( 'Add New Category', 'thesaas' ),
    'edit_item'                  => esc_html__( 'Edit Category', 'thesaas' ),
    'update_item'                => esc_html__( 'Update Category', 'thesaas' ),
    'view_item'                  => esc_html__( 'View Category', 'thesaas' ),
    'separate_items_with_commas' => esc_html__( 'Separate category with commas', 'thesaas' ),
    'add_or_remove_items'        => esc_html__( 'Add or remove category', 'thesaas' ),
    'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'thesaas' ),
    'popular_items'              => esc_html__( 'Popular Categories', 'thesaas' ),
    'search_items'               => esc_html__( 'Search Categories', 'thesaas' ),
    'not_found'                  => esc_html__( 'Not Found', 'thesaas' ),
    'no_terms'                   => esc_html__( 'No category', 'thesaas' ),
    'items_list'                 => esc_html__( 'Categories list', 'thesaas' ),
    'items_list_navigation'      => esc_html__( 'Categories list navigation', 'thesaas' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}
add_action( 'init', 'thesaas_register_portfolio_category_taxonomy', 0 );



// Register Skills Taxonomy
function thesaas_register_skills_taxonomy() {

  $labels = array(
    'name'                       => esc_html_x( 'Skills', 'Skill General Name', 'thesaas' ),
    'singular_name'              => esc_html_x( 'Skill', 'Skill Singular Name', 'thesaas' ),
    'menu_name'                  => esc_html__( 'Skill', 'thesaas' ),
    'all_items'                  => esc_html__( 'All Skills', 'thesaas' ),
    'parent_item'                => esc_html__( 'Parent Skill', 'thesaas' ),
    'parent_item_colon'          => esc_html__( 'Parent Skill:', 'thesaas' ),
    'new_item_name'              => esc_html__( 'New Skill Name', 'thesaas' ),
    'add_new_item'               => esc_html__( 'Add New Skill', 'thesaas' ),
    'edit_item'                  => esc_html__( 'Edit Skill', 'thesaas' ),
    'update_item'                => esc_html__( 'Update Skill', 'thesaas' ),
    'view_item'                  => esc_html__( 'View Skill', 'thesaas' ),
    'separate_items_with_commas' => esc_html__( 'Separate skills with commas', 'thesaas' ),
    'add_or_remove_items'        => esc_html__( 'Add or remove skills', 'thesaas' ),
    'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'thesaas' ),
    'popular_items'              => esc_html__( 'Popular Skills', 'thesaas' ),
    'search_items'               => esc_html__( 'Search Skills', 'thesaas' ),
    'not_found'                  => esc_html__( 'Not Found', 'thesaas' ),
    'no_terms'                   => esc_html__( 'No skills', 'thesaas' ),
    'items_list'                 => esc_html__( 'Skills list', 'thesaas' ),
    'items_list_navigation'      => esc_html__( 'Skills list navigation', 'thesaas' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'portfolio_skills', array( 'portfolio' ), $args );

}
add_action( 'init', 'thesaas_register_skills_taxonomy', 0 );





/**
 * Register Meta Box
 */
function thesaas_register_portfolio_meta_box() {
  add_meta_box( 'thesaas-page-options', esc_html__( 'Project Details', 'thesaas' ), 'thesaas_portfolio_meta_box_callback', 'portfolio', 'side' );
}
add_action( 'add_meta_boxes', 'thesaas_register_portfolio_meta_box');


/**
 * Add fields
 */
function thesaas_portfolio_meta_box_callback( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'thesaas_inner_custom_box', 'thesaas_inner_custom_box_nonce' );

  $custom = get_post_custom( $post->ID );

  $subtitle = ( isset( $custom['subtitle'][0] ) ) ? $custom['subtitle'][0] : '';

  $client = ( isset( $custom['client'][0] ) ) ? $custom['client'][0] : '';
  $date = ( isset( $custom['date'][0] ) ) ? $custom['date'][0] : '';
  $url = ( isset( $custom['url'][0] ) ) ? $custom['url'][0] : '';
  ?>
  <div class="pagebox">
    <label><?php esc_html_e('Header subtitle', 'thesaas' ); ?></label>
    <input type="text" name="subtitle" value="<?php echo esc_attr( $subtitle ); ?>" style="width:100%">
  </div>

  <br>
  <hr>
  <br>

  <div class="pagebox">
    <label><?php esc_html_e('Client', 'thesaas' ); ?></label>
    <input type="text" name="client" value="<?php echo esc_attr( $client ); ?>" style="width:100%">
  </div>

  <br>

  <div class="pagebox">
    <label><?php esc_html_e('Date', 'thesaas' ); ?></label>
    <input type="text" name="date" value="<?php echo esc_attr( $date ); ?>" style="width:100%">
  </div>

  <br>

  <div class="pagebox">
    <label><?php esc_html_e('Project URL', 'thesaas' ); ?></label>
    <input type="text" name="url" value="<?php echo esc_attr( $url ); ?>" style="width:100%">
  </div>
  <?php

}






/**
 * Save meta box content.
 */
function thesaas_save_portfolio_meta_box( $post_id ) {
  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['thesaas_inner_custom_box_nonce'] ) ) {
      return $post_id;
  }

  $nonce = $_POST['thesaas_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'thesaas_inner_custom_box' ) ) {
      return $post_id;
  }

  /*
   * If this is an autosave, our form has not been submitted,
   * so we don't want to do anything.
   */
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post_id;
  }


  /* OK, it's safe for us to save the data now. */

  if ( 'portfolio' == $_POST['post_type'] ) {
    $subtitle = sanitize_text_field( $_POST['subtitle'] );
    $client = sanitize_text_field( $_POST['client'] );
    $date = sanitize_text_field( $_POST['date'] );
    $url = sanitize_text_field( $_POST['url'] );

    update_post_meta( $post_id, 'subtitle', $subtitle );
    update_post_meta( $post_id, 'client', $client );
    update_post_meta( $post_id, 'date', $date );
    update_post_meta( $post_id, 'url', $url );
  }

}
add_action( 'save_post', 'thesaas_save_portfolio_meta_box' );


