<?php
/**
 * Newsmandu-Magazine Theme Customizer for advertisment.
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'ad_for_front_page',
	array(
		'title'    => __( 'Advertisement Area for Front Page', 'newsmandu-magazine' ),
		'panel'    => 'ad_section',
		'priority' => 25,
	)
);
	$wp_customize->add_setting(
		'ad_setting2',
		array(
			'default'           => '',
			'sanitize_callback' => 'newsmandu_magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting2',
			array(
				'label'       => __( 'Advertisement Area For Featured Section', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage featured section.', 'newsmandu-magazine' ),
				'section'     => 'ad_for_front_page',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting3',
		array(
			'default'           => '',
			'sanitize_callback' => 'newsmandu_magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting3',
			array(
				'label'       => __( 'Advertisement Area For Top Stories Section', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage top stories section.', 'newsmandu-magazine' ),
				'section'     => 'ad_for_front_page',
				'type'        => 'textarea',
			)
		)
	);

