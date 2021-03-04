<?php
/**
 * Theme specific dynamic styles.
 *
 * @package Newsmandu
 */

/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function newsmandu_magazine_slider_dynamic_css() {
	for ( $i = 0; $i < 4; $i++ ) :
		?>
		<!-- Style for slider background -->
		<style>
		.carousel-item-<?php echo absint( $i ); ?>
		{
			background-image: url(
			<?php
			echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_magazine_slider_post_' . $i ) ) ) );
			?>
			);
			height: 750px;
		}
		.header-content h2 {
			color: chartreuse;
		}
		.header-content p {
			color: white;
		}
		</style>
		<?php
	endfor;

}
add_action( 'wp_head', 'newsmandu_magazine_slider_dynamic_css' );
