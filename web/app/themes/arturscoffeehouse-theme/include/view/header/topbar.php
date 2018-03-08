
<?php
$menu = thesaas_get_the_meta( 'topbar_menu', 'default' );
$hamburger_position = get_theme_mod( 'topbar_toggler_position', 'left' );
//$topbar_sticky      = get_theme_mod( 'topbar_sticky', true );
//$topbar_inverse     = get_theme_mod( 'topbar_inverse', true );
$topbar_disable_sticky  = get_theme_mod( 'topbar_disable_sticky', false );
$topbar_disable_inverse = get_theme_mod( 'topbar_disable_inverse', false );
$topbar_breakpoint  = get_theme_mod( 'global_topbar_breakpoint', 'md' );
$topbar_container   = get_theme_mod( 'global_topbar_container', 'container' );
$topbar_buttons_in_collapse = get_theme_mod( 'topbar_buttons_inside_collapse', false );

$topbar_breakpoint_page = thesaas_get_the_meta( 'topbar_breakpoint', 'md' );
if ( 'md' !== $topbar_breakpoint_page ) {
	$topbar_breakpoint = $topbar_breakpoint_page;
}

$topbar_container_page = thesaas_get_the_meta( 'topbar_container', 'container' );
if ( 'container' !== $topbar_container_page ) {
	$topbar_container = $topbar_container_page;
}

$topbar_sticky = thesaas_get_the_meta( 'topbar_is_sticky', 'topbar-sticky' );
$topbar_inverse = thesaas_get_the_meta( 'topbar_inverse', 'topbar-inverse' );

if ( $topbar_disable_sticky ) {
	$topbar_sticky = '';
}

if ( $topbar_disable_inverse ) {
	$topbar_inverse = '';
}

/*
$topbar_sticky_page = thesaas_get_the_meta( 'topbar_is_sticky', 'topbar-sticky' );
$topbar_inverse_page = thesaas_get_the_meta( 'topbar_inverse', 'topbar-inverse' );


if ( $topbar_sticky && $topbar_sticky_page != 'topbar-sticky' ) {
	$topbar_sticky = false;
}
elseif ( !$topbar_sticky && $topbar_sticky_page == 'topbar-sticky' ) {
	$topbar_sticky = true;
}


if ( $topbar_inverse && $topbar_inverse_page != 'topbar-inverse' ) {
	$topbar_inverse = false;
}
elseif ( !$topbar_inverse && $topbar_inverse_page == 'topbar-inverse' ) {
	$topbar_inverse = true;
}


$topbar_sticky = $topbar_sticky ? 'topbar-sticky' : '';
$topbar_inverse = $topbar_inverse ? 'topbar-inverse' : '';
*/
?>

<!-- Topbar -->
<nav class="topbar <?php echo sanitize_html_class( $topbar_inverse ); ?> topbar-expand-<?php echo sanitize_html_class( $topbar_breakpoint ); ?> <?php echo sanitize_html_class( $topbar_sticky ); ?>">
	<div class="<?php echo esc_attr( $topbar_container ); ?>">

		<div class="topbar-left">
			<?php if ( 'none' !== $menu && 'left' == $hamburger_position ) : ?>
			<button class="topbar-toggler">&#9776;</button>
			<?php endif; ?>
			<a class="topbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo thesaas_get_logo( 'default', 'logo-default' ); ?>
				<?php echo thesaas_get_logo( 'light', 'logo-inverse' ); ?>
			</a>
		</div>


		<div class="topbar-right">
			<?php
			$topbar_classes = 'topbar-nav nav';
			$topbar_toggle_on = get_theme_mod( 'topbar_toggle_type', 'hover' );
			if ( 'click' == $topbar_toggle_on ) {
				$topbar_classes .= ' nav-toggle-click';
			}

			$navbar_extra_li = '';
			if ( $topbar_buttons_in_collapse ) {
				$navbar_extra_li = '<li class="not-menu">'. thesaas_topbar_buttons() .'</li>';
			}

			if ( 'default' == $menu ) {

				if ( has_nav_menu( 'topbar' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'topbar',
						'menu_class'     => $topbar_classes,
						'container'      => '',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s'. $navbar_extra_li .'</ul>',
						'walker'         => new Thesaas_Walker_Nav_Menu(),
					) );
				}

			}
			elseif ( 'none' == $menu ) {
				// Do nothing
			}
			else {
				wp_nav_menu( array(
					'menu'           => $menu,
					'menu_class'     => $topbar_classes,
					'container'      => '',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s'. $navbar_extra_li .'</ul>',
					'walker'         => new Thesaas_Walker_Nav_Menu(),
				) );
			}


			// Cart icon
			// 
			if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'hide_cart_icon', false ) ) {
				echo '<a class="topbar-icon" href="'. esc_url( wc_get_cart_url() ) .'"><i class="fa fa-shopping-cart"></i><span class="badge badge-cart-count">'. sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ).'</span></a>';
			}


			// Search icon
			// 
			if ( ! get_theme_mod( 'hide_topbar_search', true ) ) {
				echo '<a class="topbar-icon" href="#" data-toggle="searchbox"><i class="fa fa-search"></i></a>';
			}
			

			// Topbar buttons
			//
			if ( ! $topbar_buttons_in_collapse ) {
				echo thesaas_topbar_buttons();
			}
			
			?>

			<?php if ( 'none' !== $menu && 'right' == $hamburger_position ) : ?>
			<button class="topbar-toggler">&#9776;</button>
			<?php endif; ?>
		</div>

	</div>
</nav>
<!-- END Topbar -->
