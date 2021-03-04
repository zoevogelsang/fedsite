<?php
/**
 * Newsmandu-Magazine Theme color selector for category.
 *
 * @package Newsmandu
 */

	// Category color selector.
	$wp_customize->add_section(
		'newsmandu_magazine_category_color',
		array(
			'title'       => esc_html__( 'Category Color Select', 'newsmandu-magazine' ),
			'description' => esc_html__( 'Category Section Color Selector. (Category color will change only in top story section.)', 'newsmandu-magazine' ),
			'panel'       => 'frontpage_options',
		)
	);
	// Destination color picker settings.
	$tax_args   = array(
		'hierarchical' => 0,
		'taxonomy'     => 'category',
	);
	$categories = get_categories( $tax_args );
	foreach ( $categories as $category ) {
		// Background Color.
		$wp_customize->add_setting(
			'category_bg_color_' . $category->term_id,
			array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'category_bg_color_' . $category->term_id,
				array(
					'label'   => $category->name . ' Background Color',
					'section' => 'newsmandu_magazine_category_color',
				)
			)
		);
		// Text Color.
		$wp_customize->add_setting(
			'category_color_' . $category->term_id,
			array(
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'category_color_' . $category->term_id,
				array(
					'label'   => $category->name . ' Text Color',
					'section' => 'newsmandu_magazine_category_color',
				)
			)
		);
	}
