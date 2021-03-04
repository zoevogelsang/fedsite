<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmandu
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
	return;
}

if ( get_theme_mod( 'sidebar_position' ) === 'right' ) {
	$newsmandu_magazine_sidebar_order = 'order-last';
} elseif ( get_theme_mod( 'sidebar_position' ) === 'left' ) {
	$newsmandu_magazine_sidebar_order = 'order-first';
} else {
	$newsmandu_magazine_sidebar_order = 'order-last';
}
?>

<aside id="secondary" class="widget-area col-md-4 <?php echo esc_attr( $newsmandu_magazine_sidebar_order ); ?>">		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
