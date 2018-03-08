<?php
/**
 * The template for displaying the footer
 */

$layout = get_theme_mod( 'footer_layout', '1' );
$hide_logo = get_theme_mod( 'hide_footer_logo', false );
$nav_class = 'justify-content-center';
?>

	</main>
	<!-- END Main container -->

	<?php
	switch ( $layout ) {
		case '2':
			?>
			<!-- Footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row gap-y">
            <div class="col-12 col-md-6">
              <p class="text-center text-md-left"><?php echo get_theme_mod('footer2_copyright', 'Copyright © 2017 TheThemeio. All rights reserved.') ?></p>
            </div>

            <div class="col-12 col-md-6">
	            <?php if ( has_nav_menu( 'footer' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_class'     => 'nav nav-inline nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end '. $nav_class,
									'container'      => '',
									'depth'          => 1,
								) );
							endif; ?>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
			<?php
			break;


		case '3':
			?>
			<!-- Footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            
            <div class="col-12 col-lg-6 offset-lg-3">
	            <?php if ( has_nav_menu( 'footer' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_class'     => 'nav nav-primary nav-hero '. $nav_class,
									'container'      => '',
									'depth'          => 1,
								) );
							endif; ?>

              <hr>

              <p class="text-center opacity-70"><?php echo get_theme_mod('footer3_text', 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.') ?></p>
            </div>

          </div>

        </div>
      </footer>
      <!-- END Footer -->
			<?php
			break;


		case '4':
			$btn1_text = esc_html( get_theme_mod('footer4_col3_btn1_text', 'Take a test drive') );
			$btn1_link = esc_url( get_theme_mod('footer4_col3_btn1_link', '#') );
			$btn1_color = esc_attr( get_theme_mod('footer4_col3_btn1_color', 'primary') );

			$btn2_text = esc_html( get_theme_mod('footer4_col3_btn2_text', 'Contact us') );
			$btn2_link = esc_url( get_theme_mod('footer4_col3_btn2_link', '#') );
			$btn2_color = esc_attr( get_theme_mod('footer4_col3_btn2_color', 'secondary') );
			?>
			<!-- Footer -->
      <footer class="site-footer py-90">
        <div class="container">
          <div class="row gap-y">
            <div class="col-12 col-md-5">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer4_col1_title', 'TheSaaS') ?></h6>
              <p class="fs-13"><?php echo get_theme_mod('footer4_col1_text', 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.') ?></p>
              <br>
              <p class="text-light"><?php echo get_theme_mod('footer4_col1_copyright', 'Copyright © 2017 TheThemeio. All rights reserved.') ?></p>
            </div>

            <div class="col-12 col-md-2">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer4_col2_title', 'Company') ?></h6>
              <?php if ( has_nav_menu( 'footer' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_class'     => 'nav flex-column '. $nav_class,
									'container'      => '',
									'depth'          => 1,
								) );
							endif; ?>
            </div>

            <div class="col-12 col-md-5">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer4_col3_title', 'Get Started') ?></h6>
              <p class="fs-13"><?php echo get_theme_mod('footer4_col3_text', 'TheSaaS design is harmonious, clean and user friendly. Even though the template has a lot of content, it doesn’t looks messy and all files and code are well structured, commented and divided.') ?></p>
              <br>
              <p>
              	<?php if ( ! empty( $btn1_text ) ): ?>
                <a class="btn btn-sm btn-<?php echo $btn1_color; ?> mr-10" href="<?php echo $btn1_link; ?>"><?php echo $btn1_text; ?></a>
              	<?php endif; ?>

              	<?php if ( ! empty( $btn2_text ) ): ?>
                <a class="btn btn-sm btn-<?php echo $btn2_color; ?> hidden-md-down" href="<?php echo $btn2_link; ?>"><?php echo $btn2_text; ?></a>
                <?php endif; ?>
              </p>
            </div>

          </div>
        </div>
      </footer>
      <!-- END Footer -->
			<?php
			break;


    case '5':
      $btn_color = esc_attr( get_theme_mod('footer5_col4_btn_color', 'primary') );
      $col4_img  = get_theme_mod('footer5_col4_image');

      ?>
      <!-- Footer -->
      <footer class="site-footer py-90">
        <div class="container">
          <div class="row gap-y">
            <div class="col-12 col-md-12 col-lg-4">
              <?php if ( ! $hide_logo ) : ?>
                <h6 class="heading-alt text-uppercase fs-14 mb-16">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo thesaas_get_logo('footer'); ?></a>
                </h6>
              <?php endif; ?>
              
              <p class="fs-13"><?php echo get_theme_mod('footer5_col1_text', 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.') ?></p>
              <br>
              <p class="text-light"><?php echo get_theme_mod('footer5_col1_copyright', 'Copyright © 2017 TheThemeio. All rights reserved.') ?></p>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer5_col2_title', 'Samples') ?></h6>
              <?php if ( has_nav_menu( 'footer' ) ) :
                wp_nav_menu( array(
                  'theme_location' => 'footer',
                  'menu_class'     => 'nav flex-column '. $nav_class,
                  'container'      => '',
                  'depth'          => 1,
                ) );
              endif; ?>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer5_col3_title', 'Company') ?></h6>
              <?php if ( has_nav_menu( 'footer-secondary' ) ) :
                wp_nav_menu( array(
                  'theme_location' => 'footer-secondary',
                  'menu_class'     => 'nav flex-column '. $nav_class,
                  'container'      => '',
                  'depth'          => 1,
                ) );
              endif; ?>
            </div>


            <div class="col-12 col-md-4 col-lg-3">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"><?php echo get_theme_mod('footer5_col4_title', 'Subscribe') ?></h6>

              <?php if ( $col4_img ) : ?>
                <a href="<?php echo esc_url( get_theme_mod('footer5_col4_image_link', '#') ); ?>">
                  <img src="<?php echo esc_url( $col4_img ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
              <?php else : ?>
                <form class="form-inline justify-content-center justify-content-lg-end" action="<?php echo esc_url( get_theme_mod('footer5_col4_mailchimp') ); ?>" method="POST" target="_blank">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" name="EMAIL" class="form-control" placeholder="<?php echo esc_attr( get_theme_mod('footer5_col4_placeholder', 'Email Address') ); ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-<?php echo $btn_color; ?>"><i class="fa fa-paper-plane"></i></button>
                    </span>
                  </div>
                </form>
              <?php endif; ?>

              <hr>

              <div class="social text-center">
                <?php thesaas_show_social_icons(); ?>
              </div>
              <br>
            </div>

          </div>
        </div>
      </footer>
      <!-- END Footer -->
      <?php
      break;


		default:
      $copyright_text = get_theme_mod('footer1_copyright');
			?>
			<!-- Footer -->
			<footer class="site-footer">
				<div class="container">
					<div class="row gap-y align-items-center">
						
						<?php if ( ! $hide_logo ) : ?>

						<div class="col-12 col-lg-3">
							<p class="text-center text-lg-left">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo thesaas_get_logo('footer'); ?></a>
							</p>
						</div>

						<div class="col-12 col-lg-6">

						<?php
						else:
							$nav_class = 'justify-content-center justify-content-lg-start';
							?>
							<div class="col-12 col-lg-9">
						<?php endif; ?>

						<?php if ( has_nav_menu( 'footer' ) ) :
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_class'     => 'nav nav-inline nav-primary nav-hero '. $nav_class,
								'container'      => '',
								'depth'          => 1,
							) );
						endif; ?>

						</div>

						<div class="col-12 col-lg-3">
							<div class="social text-center text-lg-right">
								<?php thesaas_show_social_icons(); ?>
							</div>
						</div>
					</div>

          <?php if ( ! empty( $copyright_text ) ) : ?>
            <hr class="w-200">
            <p class="text-center"><?php echo $copyright_text; ?></p>
          <?php endif; ?>
				</div>
			</footer>
			<!-- END Footer -->
			<?php
			break;
	}
	?>




	<?php if ( get_theme_mod( 'show_scroll_top', false ) ) : ?>
	<a class="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'hide_topbar_search', true ) ) : ?>
	<div class="searchbox">
		<form action="/" method="GET">
			<input type="text" name="s" placeholder="<?php esc_html_e( 'Type a keyword and press enter...', 'thesaas' ); ?>" autocomplete="off">
		</form>

		<button class="close" data-toggle="searchbox">&times;</button>
	</div>
	<?php endif; ?>

<?php wp_footer(); ?>
<?php get_template_part( 'include/view/footer/custom_js' ); ?>

</body>
</html>
