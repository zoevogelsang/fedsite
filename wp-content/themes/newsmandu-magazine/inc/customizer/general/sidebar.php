<?php
/**
 * Newsmandu-Magazine Theme Customizer for side bar.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_magazine_sanitize_sidebar_position',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sidebar_position',
			array(
				'label'    => __( 'Sidebar Displays', 'newsmandu-magazine' ),
				'section'  => 'general_options',
				'settings' => 'sidebar_position',
				'type'     => 'select',
				'choices'  => array(
					'right' => __( 'Right sidebar', 'newsmandu-magazine' ),
					'left'  => __( 'Left sidebar', 'newsmandu-magazine' ),
					'none'  => __( 'No sidebar', 'newsmandu-magazine' ),
				),
				'priority' => '15',
			)
		)
	);
