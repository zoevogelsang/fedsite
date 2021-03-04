<?php

/***************************************************************************************************
 * Enqueue all CSS and JS
 ***************************************************************************************************/

if ( ! function_exists( 'periar_enqueue_cs_js' ) ) :

function periar_enqueue_cs_js() {

    $periar_primary_color  = esc_attr( get_theme_mod( 'periar_primary_color_setting' ) ); //E.g. #FF0000
    $periar_fancy_underline_color = esc_attr( get_theme_mod( 'fancy_underline_color_setting' ) );
    $periar_custom_css     = "
        .prr-category a,
        .display-tag a,
        .main-nav > li a:hover,
        .mobile-menu-container ul > li > a:hover{
            color: {$periar_primary_color};
        }
        .post-slide-hor-arrow div, .post-slide-hor-2-arrow div,
        .link-pages .current .page-numbers,
        .post-content a.post-page-numbers:hover span {
            background: {$periar_primary_color};
        }
        .prr-title,
        .reply a {
            background-image: linear-gradient(180deg, transparent 65%, $periar_fancy_underline_color 0);
        }

        .post-content a {
            background-image: linear-gradient(180deg, transparent 65%, $periar_fancy_underline_color 0);
        }

        .animated-underline {
            background-image: linear-gradient(180deg, transparent 90%, $periar_primary_color 0);
        }

        blockquote {
            border-left: 10px solid $periar_primary_color;
        }

        .main-nav>.menu-item-has-children:hover>ul,
        .main-nav>.has-children:hover>ul,
        .mobile-nav>li{
            border-bottom: 1px solid $periar_primary_color;
        }
        .main-nav .menu-item-has-children .menu-item-has-children>ul,
        .main-nav .has-sub-children>ul,
        .nav-parent{
            border-left: 1px solid $periar_primary_color;
        }

        .newsletter-area .newsletter-form input[type=\"submit\"]{
            background-color: {$periar_primary_color};
            border: 1px solid {$periar_primary_color};

            box-shadow: 0px 3px 12px {$periar_primary_color};
        }
        .prr-instagram-feed .sbi_follow_btn:before {
            border: 1px solid $periar_primary_color;
        }
        .prr-instagram-feed #sb_instagram svg:not(:root).svg-inline--fa {
            color:{$periar_primary_color};
        }
        footer.prr-footer {
            border-top: 2px solid $periar_primary_color;
        }
        .footer-site-info{
            border-top: 1px solid $periar_primary_color;
        }
        input:hover, input[type=\"text\"]:hover,
        input[type=\"email\"]:hover,
        input[type=\"url\"]:hover,
        textarea:hover,
        .form-submit #submit {
            border-bottom-color: $periar_primary_color;
        }
        .prr-cat-tag {
            background: $periar_primary_color;
            box-shadow: 0px 3px 12px {$periar_primary_color};
        }
        .next-post-wrap:before, .previous-post-wrap:before {
            color: {$periar_primary_color};
        }";

    $theme          = wp_get_theme();
    $theme_version  = $theme->get( 'Version' );

    wp_enqueue_style( 'periar-gfonts', periar_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'periar-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'periar-icofont', get_template_directory_uri() . '/assets/css/icofont.min.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'periar-bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'periar-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'periar-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'periar-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'periar-style-css', get_template_directory_uri() . '/style.css', array(), $theme_version, 'all' );

    $periar_check_color = get_theme_mod( 'periar_primary_color_setting' );
    if ( !empty( $periar_check_color ) ) {
        wp_add_inline_style( 'periar-style-css', $periar_custom_css );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  		wp_enqueue_script( 'comment-reply' );
  	}
    wp_enqueue_script( 'periar-jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), $theme_version, true );
    wp_enqueue_script( 'periar-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), $theme_version, true );
}

endif;

add_action( 'wp_enqueue_scripts', 'periar_enqueue_cs_js' );
