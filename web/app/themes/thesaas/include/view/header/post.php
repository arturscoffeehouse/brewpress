
<?php

$custom = get_post_custom( get_the_ID() );

$overlay_color = ( isset( $custom['overlay_color'][0] ) ) ? $custom['overlay_color'][0] : '#000';
$overlay_opacity = ( isset( $custom['overlay_opacity'][0] ) ) ? $custom['overlay_opacity'][0] : '8';
if ( '10' == $overlay_opacity ) {
  $overlay_opacity = '1';
}
else {
  $overlay_opacity = '0.'. $overlay_opacity;
}
$header_fullscreen = ( isset( $custom['header_fullscreen'][0] ) ) ? $custom['header_fullscreen'][0] : 'h-fullscreen';

?>

<?php if ( has_post_thumbnail() ) : ?>
  <header class="header header-inverse <?php echo $header_fullscreen; ?> pb-80" style="background-image: url(<?php the_post_thumbnail_url() ?>);">
    <div class="header-overlay" style="background-color: <?php esc_attr_e( $overlay_color ); ?>; opacity: <?php esc_attr_e( $overlay_opacity ); ?>;"></div>
<?php else : ?>
  <header class="header header-inverse" style="background-color: <?php echo get_theme_mod( 'header_bg_color', '#c2b2cd' ); ?>">
<?php endif; ?>

  <div class="container text-center">

    <div class="row h-full">
      <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

        <div class="post-cats">
          <?php
            $categories = wp_get_post_categories( get_the_ID() );
            $max_cat = 5;
            foreach ( $categories as $cat ) {
            	$category = get_category( $cat );
                printf( '<a href="%1$s">%2$s</a>',
                    esc_url( get_category_link( $category->term_id ) ),
                    esc_html( $category->name )
                );

                $max_cat--;
                if ( 0 == $max_cat ) {
                	break;
                }
            }
          ?>
        </div>
        <br>
        <h1 class="display-4 hidden-sm-down"><?php the_title(); ?></h1>
        <h1 class="hidden-md-up"><?php the_title(); ?></h1>
        <br><br>
        <p class="fs-13">
          <?php if ( get_theme_mod( 'hide_author_link', false ) ) : ?>
            <span class="opacity-70 mr-8"><?php esc_html_e( 'By', 'thesaas' ); ?> <?php the_author(); ?></span>
          <?php else: ?>
            <span class="opacity-70 mr-8"><?php esc_html_e( 'By', 'thesaas' ); ?></span> 
            <a class="text-white" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author(); ?></a>
          <?php endif; ?>
          <span class="mx-3">&#8211;</span>
          <span class="opacity-70 mr-8"><?php esc_html_e( 'On', 'thesaas' ); ?></span> 
          <?php echo thesaas_posted_on(); ?>
        </p>
        <p>
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
            <img class="rounded-circle w-40" src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="...">
          </a>
        </p>

      </div>

      <div class="col-12 align-self-end text-center">
        <?php if ( has_post_thumbnail() && 'h-fullscreen' == $header_fullscreen ) : ?>
          <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-content"><span></span></a>
        <?php endif; ?>
      </div>

    </div>

  </div>
</header>
