<?php
/**
 * Load files
 *
 * @package Newsmandu
 */

/**
 * Load WordPress nav walker.
 */
require get_template_directory() . '/inc/class-newsmandu-magazine-wp-bootstrap-navwalker.php';

/**
 * Dynamic styles.
 */
require get_template_directory() . '/inc/dynamic-styles.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitize functions.
 */
require get_template_directory() . '/inc/sanitize.php';

/**
 * Include tgm required plaugins functionality.
 */
require get_template_directory() . '/inc/tgm-plugin/tgm-required-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
