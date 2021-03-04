<?php
function periar_load_customize_classes( $wp_customize ) {
    get_template_part( '/inc/customizer/customizer-alpha-color-picker/class-customizer-alpha-color-control' );
}
add_action( 'customize_register', 'periar_load_customize_classes', 0 );

require_once( get_template_directory() . '/inc/theme-setup.php' );
require_once( get_template_directory() . '/inc/enqueue.php' );
require_once( get_template_directory() . '/inc/custom-functions.php' );
require_once( get_template_directory() . '/inc/customizer-options.php' );
require_once( get_template_directory() . '/inc/custom-widget.php' );
require_once( get_template_directory() . '/inc/sanitization-callbacks.php' );
require_once( get_template_directory() . '/inc/get-started-notice/notice.php' );
require_once( get_template_directory() . '/inc/welcome-page.php' );
