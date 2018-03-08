
<?php get_template_part( 'include/view/header/header_tag' ); ?>
	<div class="container text-center">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">

				<h1><?php the_title(); ?></h1>
				<p class="fs-20 opacity-70"><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></p>

			</div>
		</div>

	</div>
</header>
	