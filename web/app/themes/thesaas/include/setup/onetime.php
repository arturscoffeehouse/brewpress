<?php

function thesaas_one_time_function() {
  // Exit if the work has already been done.
  if ( '1' == get_option( 'thesaas_onetime_step', '0' ) ) {
    return;
  }

  flush_rewrite_rules( false );

  // Add or update the wp_option
  update_option( 'thesaas_onetime_step', '1' );
}
add_action( 'init', 'thesaas_one_time_function' );

