<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'periar_fonts_url' ) ) :

function periar_fonts_url() {
  $periar_fonts_url  = '';
  $periar_merri   = _x( 'on', 'Merriweather font: on or off', 'periar' );
  $periar_open = _x( 'on', 'Open Sans font: on or off', 'periar' );

  if ( 'off' !== $periar_merri || 'off' !== $periar_open ) {
    $periar_font_families = array();

    if ( 'off' !== $periar_merri ) {
      $periar_font_families[] = 'Merriweather:wght@300,400,700';
    }

    if ( 'off' !== $periar_open ) {
      $periar_font_families[] = 'Open Sans:wght@300;400;600;700';
    }
  }

  $periar_query_args = array(
    'family' => urlencode( implode( '|', $periar_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $periar_fonts_url = add_query_arg( $periar_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $periar_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class Periar_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$periar_output, $periar_depth = 0, $periar_args = array() ) {
        $periar_indent = str_repeat( "\t", $periar_depth );
        if( 'mobile_menu' == $periar_args->theme_location ) {
            $periar_output .='<a href="#" class="dropdown-toggle"><i class="icofont-caret-down"></i></a>';
        }
        $periar_output .= "\n$periar_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 * Estimated reading time
 ************************************************************************************************************************/

/* Word read count */
function periar_post_read_time( $post_id ) {

      // get the post content
      $content = get_post_field( 'post_content', $post_id );

      // count the words
      $word_count = str_word_count( strip_tags( $content ) );

      // reading time itself
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) {
       $timer = " Minute read";
      } else {
       $timer = " Minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
      }

      // I'm going to print 'X minute read' above my post
      $totalreadingtime = $readingtime . $timer;
      echo esc_html( $totalreadingtime, 'periar' );

}

/*************************************************************************************************************************
 *  Custom Excerpt Length
 ************************************************************************************************************************/

function periar_excerpt( $limit ) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function periar_excerpt_more( $more ) {
  return '...';
}

add_filter('excerpt_more', 'periar_excerpt_more');

















