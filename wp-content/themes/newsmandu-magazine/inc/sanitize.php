<?php
/**
 * Sanitize functions.
 *
 * @package Newsmandu
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsmandu_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Sanitize the menu bar layout options.
 *
 * @param string $input Menu bar layout.
 */
function newsmandu_magazine_sanitize_menubar_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'newsmandu-magazine' ),
		'alt'      => __( 'Alternative', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the main menu drop-down mode option.
 *
 * @param string $input options.
 */
function newsmandu_magazine_sanitize_mainmenu_dropdown_mode( $input ) {
	$valid = array(
		'default'   => __( 'Default', 'newsmandu-magazine' ),
		'bootstrap' => __( 'Bootstrap', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the main menu style mode option.
 *
 * @param string $input options.
 */
function newsmandu_magazine_sanitize_mainmenu_style( $input ) {
	$valid = array(
		'regular' => __( 'Regular', 'newsmandu-magazine' ),
		'fixed'   => __( 'Fixed', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the sidebar position options.
 *
 * @param string $input Sidebar position options.
 */
function newsmandu_magazine_sanitize_sidebar_position( $input ) {
	$valid = array(
		'right' => __( 'Right sidebar', 'newsmandu-magazine' ),
		'left'  => __( 'Left sidebar', 'newsmandu-magazine' ),
		'none'  => __( 'No sidebar', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the navigation mode options.
 *
 * @param string $input navigation mode options.
 */
function newsmandu_magazine_sanitize_blog_pagination_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'newsmandu-magazine' ),
		'numeric'  => __( 'Numeric', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the blog layout options.
 *
 * @param string $input blog layout options.
 */
function newsmandu_magazine_sanitize_blog_layout( $input ) {
	$valid = array(
		'list'     => esc_html__( 'List', 'newsmandu-magazine' ),
		'standard' => esc_html__( 'Standard', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function newsmandu_magazine_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

if ( ! function_exists( 'newsmandu_magazine_switch_sanitize' ) ) {
	/**
	 * Switch sanitization
	 *
	 * @param  int $input  input to be sanitized.
	 * @return int  Sanitized value
	 */
	function newsmandu_magazine_switch_sanitize( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}
/**
 * Sanitize the add to cart style mode option.
 *
 * @param string $input options.
 */
function newsmandu_magazine_sanitize_player_atc_style( $input ) {
	$valid = array(
		'dropdown' => __( 'Dropdown', 'newsmandu-magazine' ),
		'popup'    => __( 'Popup', 'newsmandu-magazine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}
if ( ! function_exists( 'newsmandu_magazine_iframe_sanitize' ) ) {
	/**
	 * Iframe sanitization.
	 *
	 * @param  string $input    input value.
	 * @return integer  Sanitized value
	 */
	function newsmandu_magazine_iframe_sanitize( $input ) {
		return wp_kses( $input, newsmandu_magazine_expanded_alowed_tags() );
	}
}

