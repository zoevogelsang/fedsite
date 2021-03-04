<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

/**
 * Register different customizer features.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsmandu_magazine_customize_register( $wp_customize ) {
	/**
	 *
	 * Add postMessage support for site title and description for the Theme Customizer.
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.navbar-brand',
				'render_callback' => 'newsmandu_magazine_starter_customize_partial_blogname',
			)
		);
	}
	if ( class_exists( 'WP_Customize_Control' ) ) {
		/**
		* Custom customizer controls.
		*/
		require get_template_directory() . '/inc/customizer/custom-controls/class-newsmandu-magazine-toggle-switch-custom-control.php';
	}
	/**
	 *
	 * Add Section
	 */
	$wp_customize->add_section(
		'general_options',
		array(
			'title'      => __( 'General Settings', 'newsmandu-magazine' ),
			'capability' => 'edit_theme_options',
			'priority'   => 160,
		)
	);
	/* Menu bar mode */
	require get_template_directory() . '/inc/customizer/general/menubar.php';
	/* Sidebar section */
	require get_template_directory() . '/inc/customizer/general/sidebar.php';
	/* Section for entering the phone no.*/
	require get_template_directory() . '/inc/customizer/general/site-detail.php';
	/**
	 *
	 * Add Section
	 */
	$wp_customize->add_section(
		'blog_options',
		array(
			'title'      => __( 'Posts page Settings', 'newsmandu-magazine' ),
			'capability' => 'edit_theme_options',
			'priority'   => 170,
		)
	);
	// Settings.
	// Blog Pagination.
	require get_template_directory() . '/inc/customizer/post-page/blog-pagination.php';
	// Featured.
	require get_template_directory() . '/inc/customizer/post-page/featured.php';
	// Layout.
	require get_template_directory() . '/inc/customizer/post-page/layout.php';
	/**
	 *
	 * Add Panel Front Page Settings
	 */
	$wp_customize->add_panel(
		'frontpage_options',
		array(
			'title'           => __( 'Front Page Settings', 'newsmandu-magazine' ),
			'priority'        => 190,
			'active_callback' => 'newsmandu_magazine_set_front_page',
		)
	);
	/**
	 *
	 * Add Section Head Banner to Panel
	 */
	require get_template_directory() . '/inc/customizer/frontpage/head-banner.php';
	/* Add Section Slider to Panel */
	require get_template_directory() . '/inc/customizer/frontpage/slider.php';
	// Add Section for featured post.
	require get_template_directory() . '/inc/customizer/frontpage/featuredpost.php';
	// More Link.
	require get_template_directory() . '/inc/customizer/frontpage/more-link.php';
	// Footer section.
	require get_template_directory() . '/inc/customizer/footer.php';
	// load destination color picker option.
	require get_template_directory() . '/inc/customizer/theme-options/cat-color.php';

	/**
	 *
	 * Add Panel Advertisment Section Settings
	 */
	$wp_customize->add_panel(
		'ad_section',
		array(
			'title'      => __( 'Advertisement Settings', 'newsmandu-magazine' ),
			'capability' => 'edit_theme_options',
			'priority'   => 160,
		)
	);
	// load destination color picker option.
	require get_template_directory() . '/inc/customizer/ad/adforheader.php';
	require get_template_directory() . '/inc/customizer/ad/adforfrontpage.php';
}
	// END Options.
	add_action( 'customize_register', 'newsmandu_magazine_customize_register' );
	/**
	 *
	 * Helper function for Contextual Control
	 * Whether the static page is set to a front displays
	 * https://developer.wordpress.org/reference/classes/wp_customize_control/active_callback/
	 */
function newsmandu_magazine_set_front_page() {
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return true;
	}
}
	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
function newsmandu_magazine_customize_preview_js() {
	wp_enqueue_script( 'newsmandu-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '25032018', true );
}
	add_action( 'customize_preview_init', 'newsmandu_magazine_customize_preview_js' );
	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
	 *
	 * @uses get_theme_mod()
	 * @param string $selector CSS selector.
	 * @param string $style The name of the CSS *property* to modify.
	 * @param string $mod_name The name of the 'theme_mod' option to fetch.
	 * @param string $prefix Optional. Anything that needs to be output before the CSS property.
	 * @param string $postfix Optional. Anything that needs to be output after the CSS property.
	 * @param bool   $echo Optional. Whether to print directly to the page (default: true).
	 * @return string Returns a single line of CSS with selectors and a property.
	 */
function newsmandu_magazine_generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
	$return = '';
	$mod    = esc_html( get_theme_mod( $mod_name ) );
	if ( ! empty( $mod ) ) {
		$return = sprintf(
			'%s { %s:%s; }',
			$selector,
			$style,
			$prefix . $mod . $postfix
		);
		if ( $echo ) {
			echo $return; // WPCS: XSS OK.
		}
	}
	return $return;
}

/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function newsmandu_magazine_customizer_css() {
	?>
<!--Customizer CSS-->
<style type="text/css">
	<?php
	newsmandu_magazine_generate_css( '.front-page .jumbotron', 'background-color', 'banner_bg_color' );
	newsmandu_magazine_generate_css( '.front-page .jumbotron h1, .front-page .jumbotron p', 'color', 'banner_text_color' );
	newsmandu_magazine_generate_css( '.front-page .jumbotron a.btn', 'color', 'banner_button_text_color' );
	newsmandu_magazine_generate_css( '.front-page .jumbotron a.btn', 'background-color', 'banner_button_bg_color' );
	?>
</style>
	<?php
}
add_action( 'wp_head', 'newsmandu_magazine_customizer_css' );
