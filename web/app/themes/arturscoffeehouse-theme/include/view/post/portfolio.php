<?php
/**
 * Template part for displaying single post.
 */

$custom = get_post_custom( get_the_ID() );

$client = ( isset( $custom['client'][0] ) ) ? $custom['client'][0] : '';
$date = ( isset( $custom['date'][0] ) ) ? $custom['date'][0] : '';
$url = ( isset( $custom['url'][0] ) ) ? $custom['url'][0] : '';

?>

<article class="section">
  <div class="container">
    
    <div class="row">
      <div class="col-12 col-md-8">
        <a href="<?php esc_url( the_permalink() ); ?>">
          <img src="<?php echo esc_url( the_post_thumbnail_url() ); ?>" alt="<?php esc_attr_e( get_the_title() ); ?>">
        </a>
      </div>


      <div class="col-12 col-md-4">
        <h5><?php esc_html_e( 'Project details', 'thesaas' ) ?></h5>

        <p><?php the_excerpt(); ?></p>

        <ul class="project-details">
          <?php if ( ! empty( $client ) ) : ?>
            <li>
              <strong><?php esc_html_e( 'Client', 'thesaas' ) ?></strong>
              <?php echo $client; ?>
            </li>
          <?php endif; ?>

          <?php if ( ! empty( $date ) ) : ?>
            <li>
              <strong><?php esc_html_e( 'Date', 'thesaas' ) ?></strong>
              <?php echo $date; ?>
            </li>
          <?php endif; ?>

          <?php if ( ! empty( get_the_terms( get_the_ID(), 'portfolio_skills' ) ) ): ?>
            <li>
              <strong>Skills</strong>
              <?php echo get_the_term_list( get_the_ID(), 'portfolio_skills', '<div class="links-default-text">', ', ', '</div>' ); ?>
            </li>
          <?php endif; ?>

          <?php if ( ! empty( $url ) ) : ?>
            <li>
              <strong><?php esc_html_e( 'Address', 'thesaas' ) ?></strong>
              <a href="<?php echo esc_url( $url ); ?>"><?php echo thesaas_remove_http( $url ); ?></a>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>

    <?php if ( ! empty( get_post()->post_content ) ): ?>
    <br>
    <hr>
    <br>

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">
        <?php the_content() ?>  
      </div>
    </div>
  <?php endif; ?>

  </div>
</article>


