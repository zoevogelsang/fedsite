<?php
/**
 * Newsmandu-Magazine Theme Customizer for advertisment.
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'ad_for_header',
	array(
		'title'    => __( 'Advertisement Area for Header', 'newsmandu-magazine' ),
		'panel'    => 'ad_section',
		'priority' => 25,
	)
);
$wp_customize->add_setting(
	'ad_setting1',
	array(
		'default'           => '',
		'sanitize_callback' => 'newsmandu_magazine_iframe_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'ad_setting1',
		array(
			'label'       => __( 'Advertisement Area For Header Section', 'newsmandu-magazine' ),
			'description' => __( 'Enter your adverstisement script hear, which will display at header section and will appear in every page.', 'newsmandu-magazine' ),
			'section'     => 'ad_for_header',
			'type'        => 'textarea',
		)
	)
);
