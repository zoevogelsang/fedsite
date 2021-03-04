<?php
/**
 * The template for displaying search forms
 *
 * @package Newsmandu
 */

?>

<!-- Search Form Widget -->
<div class="card">
		<form class="form my-2 my-md-0" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'newsmandu-magazine' ); ?>" value="<?php the_search_query(); ?>">
		<button class="submit btn-uni" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'newsmandu-magazine' ); ?>"><i class="fas fa-search"></i></button>
	</div>
</form> 
</div>



