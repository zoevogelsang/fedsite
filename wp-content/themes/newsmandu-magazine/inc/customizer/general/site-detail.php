<?php
/**
 * Newsmandu Theme Customizer for top menu site info section.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

	// Setting toggle section.
	$wp_customize->add_setting(
		'top_menu_toggle',
		array(
			'default'           => 0,
			'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
		)
	);

	$wp_customize->add_control(
		new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
			$wp_customize,
			'top_menu_toggle',
			array(
				'label'   => esc_html__( 'Show Top Menu Section', 'newsmandu-magazine' ),
				'section' => 'general_options',
			)
		)
	);

	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'phone_number',
			array(
				'label'       => __( 'Phone Number', 'newsmandu-magazine' ),
				'description' => __( 'Enter the phone number of the site.', 'newsmandu-magazine' ),
				'section'     => 'general_options',
				'type'        => 'text',
			)
		)
	);
		/* Section for entering the email of the site.*/
	$wp_customize->add_setting(
		'contact_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_email',
			array(
				'label'       => __( 'Email', 'newsmandu-magazine' ),
				'description' => __( 'Enter the email address of the site.', 'newsmandu-magazine' ),
				'section'     => 'general_options',
				'type'        => 'text',
			)
		)
	);
