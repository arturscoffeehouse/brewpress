

<?php get_template_part( 'include/view/header/header_tag' ); ?>
	<div class="container text-center">

		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">
				<?php if ( have_posts() ) : ?>
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'thesaas' ), get_search_query() ); ?></h1>
				<?php else : ?>
					<h1><?php esc_html_e( 'Nothing Found', 'thesaas' ); ?></h1>
				<?php endif; ?>
			</div>
		</div>

	</div>
</header>
