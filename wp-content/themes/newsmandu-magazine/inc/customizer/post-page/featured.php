<?php
/**
 * Newsmandu-Magazine theme customizer for selecting featured post in blog page.
 *
 * @package Newsmandu
 */

/**
 * Post List helper function.
 *
 * @param array $args posts.
 */
function newsmandu_magazine_post_list( $args = array() ) {
	$args       = wp_parse_args( $args, array( 'numberposts' => '-1' ) );
	$posts      = get_posts( $args );
	$output     = array();
	$output[''] = esc_html__( '&mdash; Select Post &mdash;', 'newsmandu-magazine' );
	foreach ( $posts as $post ) {
		$thetitle  = $post->post_title;
		$getlength = strlen( $thetitle );
		$thelength = 32;

		$thetitle = substr( $thetitle, 0, $thelength );
		if ( $getlength > $thelength ) {
			$thetitle .= '...';
		};
		$output[ $post->ID ] = sprintf( '%s', esc_html( $thetitle ) );
	}
	return $output;
}

	$wp_customize->add_setting(
		'post_dropdown_setting',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_dropdown_setting',
			array(
				'label'    => __( 'Featured Post', 'newsmandu-magazine' ),
				'section'  => 'blog_options',
				'settings' => 'post_dropdown_setting',
				'type'     => 'select',
				'choices'  => newsmandu_magazine_post_list(),
				'priority' => '10',
			)
		)
	);
