jQuery( function( $ ) {
  // Add space for Elementor Menu Anchor link
  // 
  console.log(window.elementorFrontend);
  if ( undefined !== window.elementorFrontend ) {
    elementorFrontend.hooks.addFilter( 'frontend/handlers/menu_anchor/scroll_top_distance', function( scrollTop ) {
      return scrollTop - 30;
    } );
  }
} );