
<?php
$shop_id  = get_option( 'woocommerce_shop_page_id' );
$title    = apply_filters( 'the_title', get_the_title( $shop_id ) );
$subtitle = get_post_meta( $shop_id, 'subtitle', true );
?>
<?php get_template_part( 'include/view/header/header_tag' ); ?>
	<div class="container text-center">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">

				<h1><?php echo $title; ?></h1>
				<p class="fs-20 opacity-70"><?php echo $subtitle; ?></p>

			</div>
		</div>

	</div>
</header>
