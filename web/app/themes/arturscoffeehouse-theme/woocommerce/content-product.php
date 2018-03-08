<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class( 'col-12 col-md-6 col-xl-4' ); ?>>
  <a class="shop-item" href="<?php echo esc_url( $product->get_permalink() ); ?>">
    <div class="item-details align-items-center">
      <h5><?php echo $product->get_title(); ?></h5>

      <div class="item-price">
      	<span class="unit"><?php echo get_woocommerce_currency_symbol(); ?></span>
      	<?php echo $product->get_price(); ?>
      </div>
    </div>
    <?php echo $product->get_image( 'thesaas-featured-image' ) ?>
  </a>

</div>
