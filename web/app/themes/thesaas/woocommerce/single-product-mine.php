<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
 do_action( 'woocommerce_before_single_product' );

 if ( post_password_required() ) {
 	echo get_the_password_form();
 	return;
 }


get_header( 'shop' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
		global $product;
		$unit = get_woocommerce_currency_symbol();
		$image = $product->get_image_id();
		$gallery = $product->get_gallery_image_ids();
	?>

	<section class="section">
	  <div class="container">
	    
	    <div class="row">
	      <div class="col-12 col-md-8">
	      	<?php
	      	if ( 0 == count( $gallery ) ) {
	      		echo '<div class="text-center">'. $product->get_image( 'thesaas-featured-image' ) .'</div>';
	      	}
	      	else {
	  			?>
	        <div class="swiper-container">
	          <div class="swiper-wrapper">
	          	<?php foreach ($gallery as $key => $value): ?>
	            <div class="swiper-slide text-center"><img src="<?php echo wp_get_attachment_image_url( $value, 'large' ); ?>" alt="..."></div>
	          	<?php endforeach; ?>
	          </div>
	          
	          <div class="swiper-pagination"></div>
	        </div>
	  			<?php
	      	}
	      	?>

	      </div>


	      <div class="col-12 col-md-4">
	        <br>
	        <h5><?php echo $product->get_title(); ?></h5>

	        <p>
	        	<?php if ( $product->is_on_sale() ): ?>
	          <del class="mr-20"><?php echo $unit . $product->get_regular_price(); ?></del>
	        	<?php endif; ?>
	          <span class="lead"><?php echo $unit . $product->get_price(); ?></span>
	        </p>

	        <?php echo $product->get_short_description(); ?>

	        <hr>
					<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>
						<button class="btn btn-block btn-primary ajax_add_to_cart add_to_cart_button" data-quantity="1" data-product_id="<?php echo $product->get_id(); ?>">Add to cart</button>
						<div class="alert alert-success mt-16" id="added_to_cart_feedback">This item added to your cart successfully.<br>
						<strong><a class="alert-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>">View your cart</a></strong></div>
					</form>
	      </div>
	    </div>


	    <br>
	    <hr>
	    <br>


	    <div class="row">
	      <div class="col-12 col-lg-8 offset-lg-2">
	        <?php the_content(); ?>
	      </div>
	    </div>

	  </div>
	</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
