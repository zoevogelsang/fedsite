<?php
    /**
     * Pagination for blog.
     */

    global $wp_query;
    $periar_blog = 999999999; // need an unlikely integer

    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }
?>
    <div class="navigation pagination" role="navigation">

        <div class="nav-links left">
            <?php
                the_posts_pagination( array(
                    'base' => str_replace( $periar_blog, '%#%', esc_url(get_pagenum_link( $periar_blog ) ) ),
                    'format' => '?paged=%#%',
                    'add_args' => false,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 4,
                    'prev_text' => esc_html__( 'Prev', 'periar' ),
                    'next_text' => esc_html__( 'Next', 'periar' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'periar' ) . ' </span>',
                    'prev_text' => esc_html__( 'Prev', 'periar' ),
                    'next_text' => esc_html__( 'Next', 'periar' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'periar' ) . ' </span>',
                ) );
            ?>
        </div>
    </div>
