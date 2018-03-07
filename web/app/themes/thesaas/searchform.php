<?php
/**
 * Template for displaying search forms in TheSaaS
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form form-round" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input type="text" id="<?php echo $unique_id; ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'thesaas' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-lg btn-primary"><?php echo _x( 'Search', 'submit button', 'thesaas' ); ?></button>
		</span>
	</div>
</form>
