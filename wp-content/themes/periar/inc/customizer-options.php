<?php

function periar_blog_section_setup( $wp_customize ) {

  $wp_customize->add_section( 'periar_options',
   array(
      'title'       => __( 'Homepage Setup', 'periar' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );

  $wp_customize->add_section( 'periar_single_options',
   array(
      'title'       => __( 'Single Page Settings', 'periar' ), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
   )
  );
  /******************************** Big Category *****************************/
  // Credits: https://blog.josemcastaneda.com/2015/05/13/customizer-dropdown-category-selection/
  // create an empty array
  $cats = array();

  // we loop over the categories and set the names and
  // labels we need
  foreach ( get_categories() as $categories => $category ){
    $cats[$category->term_id] = $category->name;
  }

    $wp_customize->add_setting( 'periar_grid_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'periar_grid_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Grid Section Category', 'periar' ), //Admin-visible name of the control
        'settings'   => 'periar_grid_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'periar_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'periar_scroll_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'periar_scroll_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Vertical Slider Section Category', 'periar' ), //Admin-visible name of the control
        'settings'   => 'periar_scroll_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'periar_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'periar_bottom_section_category_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => '1', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'absint',
     )
    );
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'periar_bottom_section_category_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Bottom Section Category', 'periar' ), //Admin-visible name of the control
        'settings'   => 'periar_bottom_section_category_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'periar_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => $cats,
    )
    ) );

    $wp_customize->add_setting( 'periar_single_page_image_setting', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => 'container', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'sanitize_callback' => 'periar_sanitize_select',
     )
    );

    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'periar_single_page_image_control', //Set a unique ID for the control
     array(
        'label'      => __( 'Single Post Featured Image', 'periar' ), //Admin-visible name of the control
        'settings'   => 'periar_single_page_image_setting', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'periar_single_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => array(
            'container' => 'In container',
            'full-width' => 'Full Width',
        ),
    )
    ) );
}

add_action( 'customize_register', 'periar_blog_section_setup');

function periar_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'periar_primary_color_setting', array(
      'default'   => '#00c4cc',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'periar_primary_color_control', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary color', 'periar' ),
      'settings'      =>  'periar_primary_color_setting',
    ) ) );

    // Fancy Underline Color
    $wp_customize->add_setting(
        'fancy_underline_color_setting',
        array(
            'default'     => 'rgba(0, 197, 204,0.7)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'periar_sanitize_alpha_color',
        )
    );

    $wp_customize->add_control(
        new Periar_Customizer_Alpha_Color_Control(
            $wp_customize,
            'fancy_underline_color_control',
            array(
                'label'         => __( 'Fancy Underline Color', 'periar' ),
                'section'       => 'colors',
                'settings'      => 'fancy_underline_color_setting',
                'show_opacity'  => true, // Optional.
            )
        )
    );
}

add_action( 'customize_register', 'periar_accent_color_setup');
