<?php
/**
 * Template part for displaying search form in the main-navbar-alt.php
 *
 * If you want to add another item instead of a form, use something like this:
 * <div class="my-2 my-md-0 d-none d-lg-inline">something</div>
 *
 * @package Newsmandu
 */

?>

<div class="search-form">
<i class="fas fa-search search-icon"></i>
<form class="form my-2 my-md-0" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
	<i class="fas fa-times close-icon"></i>
		<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'newsmandu-magazine' ); ?>" value="<?php the_search_query(); ?>">
		<button class="submit btn-uni" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'newsmandu-magazine' ); ?>"><i class="fas fa-search"></i></button>
	</div>
</form> 
</div>
