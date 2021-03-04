<?php
/*******************************************************************************
 *  Add a Custom CSS file to Admin Area
 *******************************************************************************/
function periar_admin_theme_stylesheet() {
   wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() .'/assets/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'periar_admin_theme_stylesheet' );

/*******************************************************************************
 *  Adds theme page of ( About Theme )
 *******************************************************************************/
function periar_add_main_theme_page() {
    $theme = wp_get_theme();
    $theme_name = esc_html( $theme->get( 'Name' ) );
    /* translators: %1$s: Theme Name */
    add_theme_page( esc_html__( 'About Periar', 'periar' ), esc_html__( 'About Periar', 'periar' ), 'edit_theme_options', 'about_periar', 'periar_about' );
}
add_action( 'admin_menu', 'periar_add_main_theme_page' );

function periar_about() {

    $theme = wp_get_theme();
    $theme_name = esc_html( $theme->get( 'Name' ) );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
    $theme_slug = basename( get_stylesheet_directory() );
?>

<div class="container about-theme">
    <div class="row">
        <div class="twelve columns clearfix">
            <?php /* translators: %s: theme name. */ ?>
            <h1><?php printf( esc_html__( 'Getting started with %s', 'periar' ), esc_html( $theme_name ) ); ?></h1>
        </div><!-- /.apex-desh-hl -->
    </div>

    <div class="row apex-screenshot">
        <div class="six columns clearfix">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'periar' ); ?>" />
            <?php /* translators: 1: Theme name. */ ?>
            <a class="jquery-btn-get-started button button-primary button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php printf( esc_html__( 'Get started with %1$s', 'periar' ), $theme_name ); ?></a>
            <small class="ct-small"><?php esc_html_e( 'This will install and activate Crafthemes Demo Import plugin.', 'periar' ); ?></small>
        </div><!-- /.six columns -->

        <div class="six columns">
            <h3><?php esc_html_e( 'Recommended Plugins', 'periar' ); ?></h3>
            <div class="ct-plugin-section">
                <div class="row ct-re-plugin">
                    <div class="six columns">
                        <div class="ct-recommended-p">
                            <p><?php echo esc_html__( 'Contact Form 7', 'periar' ); ?></p>
                        </div><!-- /.ct-recommended-p -->
                    </div><!-- /.columns -->
                    <div class="six columns">
                        <?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) { ?>
                                <a class="button button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Installed & Actived', 'periar' ); ?></a>
                        <?php } else { ?>
                                <a class="js-btn-cf7 button button-primary button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Install Now', 'periar' ); ?></a>
                        <?php } ?>
                    </div><!-- /.one columns -->
                </div><!-- /.row -->
            </div><!-- /.ct-plugin-section -->
            <div class="ct-content">
                <h3><a href="https://www.crafthemes.com/docs/<?php echo esc_attr( $theme_slug ); ?>-documentation/" target="_blank">    <?php esc_html_e( 'Theme Documentation', 'periar' ); ?></a></h3>
                <p>
                    <?php esc_html_e( 'Read about all of the theme settings, and find out about its features.', 'periar' ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
            <div class="ct-content">
                <h3><a href="https://crafthemes-demo.com/<?php echo esc_attr( $theme_slug ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'periar' ); ?></a></h3>
                <p>
                    <?php /* translators: 1: Theme name. */ ?>
                    <?php printf( esc_html__( 'Checkout the live demo of %1$s', 'periar' ), $theme_name ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
        </div><!-- /.six columns -->
    </div><!-- /.row -->
</div><!-- /.container about-writer -->

<?php
}
