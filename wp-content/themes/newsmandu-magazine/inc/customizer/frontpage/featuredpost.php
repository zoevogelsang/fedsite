<?php
/**
 *
 * The front page customizer setting for featured post and top stories section
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'featured_post',
	array(
		'title'    => __( 'Front Page Featured Area 1', 'newsmandu-magazine' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'featured_post_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'featured_post_toggle',
		array(
			'label'   => esc_html__( 'Show Featured Area 1 Section', 'newsmandu-magazine' ),
			'section' => 'featured_post',
		)
	)
);
$wp_customize->add_setting(
	'featured_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'featured_title',
		array(
			'label'       => __( 'Featured Section Title', 'newsmandu-magazine' ),
			'description' => __( 'Enter the title for the featured section.', 'newsmandu-magazine' ),
			'section'     => 'featured_post',
			'type'        => 'text',
		)
	)
);
$wp_customize->add_setting(
	'featured_sub_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'featured_sub_title',
		array(
			'label'       => __( 'Featured Section Sub Title', 'newsmandu-magazine' ),
			'description' => __( 'Enter the sub title for the featured section.', 'newsmandu-magazine' ),
			'section'     => 'featured_post',
			'type'        => 'text',
		)
	)
);

		// setting article section post select.
for ( $i = 0; $i < 3; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_magazine_featured_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Magazine_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_magazine_featured_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for featured post %d', 'newsmandu-magazine' ), $j ),

				'section'     => 'featured_post',

				'input_attrs' => array(
					'posts_per_page' => 10000,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}
$wp_customize->add_section(
	'featured_post_Second',
	array(
		'title'    => __( 'Front Page Featured Area 2', 'newsmandu-magazine' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'featured_post_second_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'featured_post_second_toggle',
		array(
			'label'   => esc_html__( 'Show Featured Area 2 Section', 'newsmandu-magazine' ),
			'section' => 'featured_post_Second',
		)
	)
);
		// setting article section post select.
for ( $i = 0; $i <= 3; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_magazine_featured_second_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Magazine_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_magazine_featured_second_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for featured post %d', 'newsmandu-magazine' ), $j ),

				'section'     => 'featured_post_Second',

				'input_attrs' => array(
					'posts_per_page' => 10000,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}
$wp_customize->add_section(
	'top_stories',
	array(
		'title'    => __( 'Front Page Top Stories Post Setting', 'newsmandu-magazine' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'top_stories_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'top_stories_toggle',
		array(
			'label'   => esc_html__( 'Show Top Stories Post Section', 'newsmandu-magazine' ),
			'section' => 'top_stories',
		)
	)
);
$wp_customize->add_setting(
	'newsmandu_magazine_post_page_dropdown',
	array(
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'newsmandu_magazine_post_page_dropdown',
	array(
		'label'       => esc_html__( 'Select page for description and background image of top stories section', 'newsmandu-magazine' ),
		'description' => esc_html__(
			'Note: Selected page\'s title, description and featured image will be used in top stories section as a background.',
			'newsmandu-magazine'
		),
		'section'     => 'top_stories',
		'type'        => 'dropdown-pages',
	)
);

