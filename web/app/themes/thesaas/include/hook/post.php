<?php

/**
 * Add class to prev/next pages button in blog list.
 */
function thesaas_posts_link_attributes() {
  return 'class="btn btn-white"';
}
add_filter( 'next_posts_link_attributes', 'thesaas_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'thesaas_posts_link_attributes' );



/**
 * Remove #more from post's URL.
 */
function thesaas_remove_more_link_scroll( $link ) {
  $link = preg_replace( '|#more-[0-9]+|', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'thesaas_remove_more_link_scroll' );



/**
 * Register Meta Box
 */
function thesaas_register_page_meta_box() {
  add_meta_box( 'thesaas-page-options', esc_html__( 'More options', 'thesaas' ), 'thesaas_page_meta_box_callback', array( 'page', 'product' ), 'side' );
}
add_action( 'add_meta_boxes', 'thesaas_register_page_meta_box');

/**
 * Add fields
 */
function thesaas_page_meta_box_callback( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'thesaas_inner_custom_box', 'thesaas_inner_custom_box_nonce' );

  $subtitle = get_post_meta( $post->ID, 'subtitle', true );
  ?>
  <div class="pagebox">
    <p><?php esc_html_e('Header subtitle', 'thesaas' ); ?></p>
    <input type="text" name="subtitle" value="<?php echo esc_attr( $subtitle ); ?>" style="width:100%">
    <p class="description"><?php esc_html_e( 'A text to display below title in the page header.', 'thesaas' ); ?></p>
  </div>
  <?php

}



/*
 * Change post state for job and portfolio
 */
/*
function thesaas_custom_post_states( $states ) { 

  global $post;
  if ( 'page' !== get_post_type( $post->ID ) ) {
    return $states;
  }

  if ( $post->ID == get_theme_mod( 'portfolio_page_id', 0 ) ) {
    $states[] = __( 'Portfolio page', 'thesaas' ); 
  }
  elseif ( $post->ID == get_theme_mod( 'job_page_id', 0 ) ) {
    $states[] = __( 'Job page', 'thesaas' ); 
  }

  return $states;
}
add_filter('display_post_states', 'thesaas_custom_post_states');
*/


/*
 * Load a custom page instead of CPT archive page
 */
/*
add_filter( 'template_include', 'thesaas_alter_cpt_archive', 99 );
function thesaas_alter_cpt_archive($template) {

  global $wp_query;
  global $post;

  $args = null;
  
  if ( is_post_type_archive( 'job' ) ) {
    $post_id = get_theme_mod( 'job_page_id', 0 );
    if ( $post_id > 0 ) {
      $args = array(
        'page_id' => $post_id,
      );
    }
  }
  elseif ( is_post_type_archive( 'portfolio' ) ) {
    $post_id = get_theme_mod( 'portfolio_page_id', 0 );
    if ( $post_id > 0 ) {
      $args = array(
        'page_id' => $post_id,
      );
    }
  }

  if ( null !== $args ) {
    $wp_query = new WP_Query( $args );
    $post = $wp_query->posts[0];
    setup_postdata( $post );

    $template = locate_template('page.php');
  }

  
  return $template;
}
*/



/**
 * Register Meta Box
 */
function thesaas_register_post_meta_box() {
  add_meta_box( 'thesaas-post-options', esc_html__( 'More options', 'thesaas' ), 'thesaas_post_meta_box_callback', 'post', 'side' );
}
add_action( 'add_meta_boxes', 'thesaas_register_post_meta_box');

/**
 * Add fields
 */
function thesaas_post_meta_box_callback( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'thesaas_inner_custom_box', 'thesaas_inner_custom_box_nonce' );

  $custom = get_post_custom( $post->ID );

  $overlay_color = ( isset( $custom['overlay_color'][0] ) ) ? $custom['overlay_color'][0] : '#000';
  $overlay_opacity = ( isset( $custom['overlay_opacity'][0] ) ) ? $custom['overlay_opacity'][0] : '8';
  $header_fullscreen = ( isset( $custom['header_fullscreen'][0] ) ) ? $custom['header_fullscreen'][0] : 'h-fullscreen';
  ?>
  <script>
  jQuery(document).ready(function($){
    $('.color_field').each(function(){
      $(this).wpColorPicker();
    });
  });
  </script>

  <p class="howto">Please note that the following options work if you set a featured image.</p>

  <div class="pagebox">
    <p><?php esc_html_e('Overlay color', 'thesaas' ); ?></p>
    <input class="color_field" type="text" name="overlay_color" value="<?php esc_attr_e( $overlay_color ); ?>">
  </div>

  <div class="pagebox">
    <p><?php esc_html_e('Overlay visibility', 'thesaas' ); ?></p>
    <select name="overlay_opacity" style="width: 100%;">
      <?php for ( $i=0; $i<=10; $i++ ) : ?>
        <option value="<?php esc_attr_e( $i ); ?>" <?php echo ($i == $overlay_opacity) ? 'selected' : ''; ?>><?php echo $i * 10; ?>%</option>
      <?php endfor; ?>
    </select>
  </div>

  <div class="pagebox">
    <br>
    <label>
      <input type="checkbox" name="header_fullscreen" value="h-fullscreen" <?php echo $header_fullscreen == 'h-fullscreen' ? 'checked' : '' ?>>
      <?php esc_html_e('Fullscreen header', 'thesaas' ); ?>
    </label>
  </div>

  <?php

}



/**
 * Save meta box content.
 */
function thesaas_save_meta_box( $post_id ) {
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

  if ( 'page' == $_POST['post_type'] ) {
    // Check the user's permissions.
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
      return $post_id;
    }

    $subtitle = sanitize_text_field( $_POST['subtitle'] );
    update_post_meta( $post_id, 'subtitle', $subtitle );
  }

  elseif ( 'product' == $_POST['post_type'] ) {
    // Check the user's permissions.
    if ( ! current_user_can( 'edit_product', $post_id ) ) {
      return $post_id;
    }

    $subtitle = sanitize_text_field( $_POST['subtitle'] );
    update_post_meta( $post_id, 'subtitle', $subtitle );
  }

  elseif ( 'post' == $_POST['post_type'] ) {
    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    // Sanitize the user input.
    $overlay_color   = sanitize_text_field( $_POST['overlay_color'] );
    $overlay_opacity = sanitize_text_field( $_POST['overlay_opacity'] );
    $header_fullscreen = sanitize_text_field( $_POST['header_fullscreen'] );

    // Update the meta field.
    update_post_meta( $post_id, 'overlay_color', $overlay_color );
    update_post_meta( $post_id, 'overlay_opacity', $overlay_opacity );
    update_post_meta( $post_id, 'header_fullscreen', $header_fullscreen );
  }

}
add_action( 'save_post', 'thesaas_save_meta_box' );






// Only display posts in search result
//
function thesaas_search_filter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}

if ( !is_admin() ) {
  add_filter('pre_get_posts','thesaas_search_filter');
}




add_filter('the_tags', 'thesaas_remove_href_of_tag_list');
function thesaas_remove_href_of_tag_list($list) {
  if ( get_theme_mod( 'hide_tags_list_link', false ) ) {
    $list = preg_replace('/(<[^>]+) href=".*?"/i', '$1', $list);
  }
  return $list;
}


