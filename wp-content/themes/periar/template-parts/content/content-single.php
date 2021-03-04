<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-meta">
        <div class="prr-post-meta">
            <span class="icon icofont-user-alt-3"></span>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
            <span class="icon icofont-comment"></span>
            <span class="prr-times-read"><?php echo esc_html( get_comments_number() ); ?> <?php echo esc_html( 'Comments', 'periar' ); ?></span>
            <span class="icon icofont-clock-time"></span>
            <span class="prr-times-read"><?php periar_post_read_time( get_the_ID() ); ?></span>
        </div><!-- .prr-post-meta -->
    </div>

    <div class="post-content clearfix">
        <?php
            the_content(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( '<span class="screen-reader-text"> "%s"</span>', 'periar' ),
                    get_the_title()
                )
            );

            wp_link_pages(
                array(
                    'before'      => '<div class="link-pages-wrap clearfix"><div class="link-pages">' . esc_html__( 'Continue Reading:', 'periar' ),
                    'after'       => '</div></div>',
                    'link_before' => '<span class="page-numbers button">',
                    'link_after'  => '</span>',
                )
            );
        ?>
    </div><!-- /.post-content -->
</div>

<div class="display-meta clearfix">
    <div class="display-tag">
        <?php
            if( $periar_tags = get_the_tags() ) {
                echo '<span class="meta-sep"></span>';
                foreach( $periar_tags as $periar_tags ) {
                    $periar_sep = ( $periar_tags === end( $periar_tags ) ) ? '' : ' ';
                    echo '<a href="' . esc_url( get_term_link( $periar_tags, $periar_tags->taxonomy ) ) . '">#' . esc_html( $periar_tags->name ) . '</a>' . esc_html( $periar_sep );
                }
            }
        ?>
    </div><!-- /.display-tag -->
</div><!-- /.display-meta -->

<div class="pagination-single">
    <div class="pagination-nav clearfix">
        <?php $periar_prev_post = get_adjacent_post( false, '', false ); ?>
        <?php if ( is_a( $periar_prev_post, 'WP_Post' ) ) { ?>
        <div class="previous-post-wrap">
            <div class="previous-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false )->ID ) ); ?>"><?php esc_html_e( 'Previous Post', 'periar' ); ?></a></div><!-- /.previous-post -->
            <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $periar_prev_post->ID ) ); ?></a>
        </div><!-- /.previous-post-wrap -->
        <?php } ?>

        <?php $periar_next_post = get_adjacent_post( false, '', true ); ?>
        <?php if ( is_a( $periar_next_post, 'WP_Post' ) ) { ?>
        <div class="next-post-wrap">
            <div class="next-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>"><?php esc_html_e( 'Next Post', 'periar' ); ?></a></div><!-- /.next-post -->
            <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $periar_next_post->ID ) ); ?></a>
        </div><!-- /.next-post-wrap -->
        <?php } ?>
    </div><!-- /.pagination-nav -->
</div><!-- /.pagination-single-->

<div class="entry-footer prr-author-about">
    <div class="author-info vertical-align">
        <div class="author-image">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
        </div><!-- /.author-image -->
        <div class="author-details">
            <p class="entry-author-label"><?php echo esc_html__( 'About the author', 'periar' ) ?></p>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <p><?php the_author_meta( 'description' ); ?></p>
            <?php endif; ?>
            <div class="author-link">
                <?php if ( get_the_author_meta( 'user_url' ) ): ?>
                    <a href="<?php the_author_meta( 'user_url' ); ?>"><?php esc_html_e( 'Visit Website', 'periar' );?></a>
                <?php endif ?>
            </div><!-- /.author-link -->
        </div><!-- /.author-details -->
    </div><!-- /.author-info -->
</div><!-- /.entry-footer -->
