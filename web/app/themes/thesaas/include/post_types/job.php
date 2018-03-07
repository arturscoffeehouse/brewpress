<?php


// Register Custom Job
function thesaas_register_job_cpt() {

  $labels = array(
    'name'                  => esc_html_x( 'Jobs', 'Job General Name', 'thesaas' ),
    'singular_name'         => esc_html_x( 'Job', 'Job Singular Name', 'thesaas' ),
    'menu_name'             => esc_html__( 'Jobs', 'thesaas' ),
    'name_admin_bar'        => esc_html__( 'Job', 'thesaas' ),
    'archives'              => esc_html__( 'Job Archives', 'thesaas' ),
    'attributes'            => esc_html__( 'Job Attributes', 'thesaas' ),
    'parent_item_colon'     => esc_html__( 'Parent Job:', 'thesaas' ),
    'all_items'             => esc_html__( 'All Jobs', 'thesaas' ),
    'add_new_item'          => esc_html__( 'Add New Job', 'thesaas' ),
    'add_new'               => esc_html__( 'Add New', 'thesaas' ),
    'new_item'              => esc_html__( 'New Job', 'thesaas' ),
    'edit_item'             => esc_html__( 'Edit Job', 'thesaas' ),
    'update_item'           => esc_html__( 'Update Job', 'thesaas' ),
    'view_item'             => esc_html__( 'View Job', 'thesaas' ),
    'view_items'            => esc_html__( 'View Jobs', 'thesaas' ),
    'search_items'          => esc_html__( 'Search Job', 'thesaas' ),
    'not_found'             => esc_html__( 'Not found', 'thesaas' ),
    'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'thesaas' ),
    'featured_image'        => esc_html__( 'Featured Image', 'thesaas' ),
    'set_featured_image'    => esc_html__( 'Set featured image', 'thesaas' ),
    'remove_featured_image' => esc_html__( 'Remove featured image', 'thesaas' ),
    'use_featured_image'    => esc_html__( 'Use as featured image', 'thesaas' ),
    'insert_into_item'      => esc_html__( 'Insert into job', 'thesaas' ),
    'uploaded_to_this_item' => esc_html__( 'Uploaded to this job', 'thesaas' ),
    'items_list'            => esc_html__( 'Jobs list', 'thesaas' ),
    'items_list_navigation' => esc_html__( 'Jobs list navigation', 'thesaas' ),
    'filter_items_list'     => esc_html__( 'Filter jobs list', 'thesaas' ),
  );
  $args = array(
    'label'                 => esc_html__( 'Job', 'thesaas' ),
    'description'           => esc_html__( 'Job Description', 'thesaas' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt' ),
    'taxonomies'            => array(  ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 30,
    'menu_icon'             => 'dashicons-businessman',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'register_meta_box_cb'  => 'thesaas_register_job_meta_box',
  );
  register_post_type( 'job', $args );



}
add_action( 'init', 'thesaas_register_job_cpt', 0 );




/**
 * Register Meta Box
 */
function thesaas_register_job_meta_box() {
  add_meta_box( 'thesaas-page-options', esc_html__( 'Job Details', 'thesaas' ), 'thesaas_job_meta_box_callback', 'job', 'side' );
}
add_action( 'add_meta_boxes', 'thesaas_register_job_meta_box');


/**
 * Add fields
 */
function thesaas_job_meta_box_callback( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'thesaas_inner_custom_box', 'thesaas_inner_custom_box_nonce' );

  $custom = get_post_custom( $post->ID );

  $location = ( isset( $custom['location'][0] ) ) ? $custom['location'][0] : '';
  ?>
  <div class="pagebox">
    <label><?php esc_html_e('Location', 'thesaas' ); ?></label>
    <input type="text" name="location" value="<?php echo esc_attr( $location ); ?>" style="width:100%">
  </div>
  <?php

}






/**
 * Save meta box content.
 */
function thesaas_save_job_meta_box( $post_id ) {
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

  if ( 'job' == $_POST['post_type'] ) {
    $location = sanitize_text_field( $_POST['location'] );

    update_post_meta( $post_id, 'location', $location );
  }

}
add_action( 'save_post', 'thesaas_save_job_meta_box' );


