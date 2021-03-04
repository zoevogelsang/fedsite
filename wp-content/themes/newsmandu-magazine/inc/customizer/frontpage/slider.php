<?php
/**
 * Newsmandu Theme Customizer for front page slider section
 *
 * @package Newsmandu
 */

/* Add dropdown post control */
require get_template_directory() . '/inc/class-newsmandu-magazine-dropdown-posts-control.php';
$wp_customize->add_section(
	'frontpage_slider',
	array(
		'title'    => __( 'Front Page slider', 'newsmandu-magazine' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'slider_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'slider_toggle',
		array(
			'label'   => esc_html__( 'Show Slider Section', 'newsmandu-magazine' ),
			'section' => 'frontpage_slider',
		)
	)
);
		// setting article section post select.
for ( $i = 0; $i < 4; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_magazine_slider_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Magazine_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_magazine_slider_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for slider %d', 'newsmandu-magazine' ), $j ),

				'section'     => 'frontpage_slider',

				'input_attrs' => array(
					'posts_per_page' => 10000,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}
