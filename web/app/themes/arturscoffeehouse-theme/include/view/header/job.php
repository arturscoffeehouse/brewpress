<?php

$custom = get_post_custom( get_the_ID() );
$location = ( isset( $custom['location'][0] ) ) ? $custom['location'][0] : '';

?>

<?php get_template_part( 'include/view/header/header_tag' ); ?>
	<div class="container text-center">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">

				<h1><?php the_title(); ?></h1>
				<?php if ( ! empty( $location ) ) : ?>
				<p class="fs-20"><i class="fa fa-map-marker mr-8"></i> <?php echo $location; ?></p>
				<?php endif; ?>

			</div>
		</div>

	</div>
</header>