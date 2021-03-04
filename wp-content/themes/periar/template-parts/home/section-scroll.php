<?php
$periar_cat_id = intval( get_theme_mod( 'periar_scroll_section_category_setting', 1 ) );

    $periar_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  14,
        'offset'            =>  1,
        'cat'               =>  $periar_cat_id,
        'order'             =>  'DESC',
    );

    $periar_list_item  = new WP_Query( $periar_list_args );

    $periar_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  1,
        'cat'               =>  $periar_cat_id,
        'order'             =>  'DESC',
    );

    $periar_block_item  = new WP_Query( $periar_block_args );
?>
<div class="container prr-spacing">
    <div class="row">
        <div class="col-md-6">
            <?php
                if ( $periar_block_item->have_posts() ) :
                    while ( $periar_block_item->have_posts() ) : $periar_block_item->the_post();
            ?>
            <div class="prr-massive-blog-excerpt">
                <?php if ( has_post_thumbnail() ):
                ?>
                <a href="<?php the_permalink(); ?>"><img src="" alt="" /><?php the_post_thumbnail( 'periar-600-3x2' ); ?></a>
                <?php
                    endif;
                ?>
                <div class="prr-block-post-meta clearfix">
                    <div class="prr-category">
                        <?php the_category( ' ' ); ?>
                    </div><!-- .prr-category -->
                    <div class="prr-times-read-area">
                        <span class="icofont-clock-time"></span>
                        <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                    </div><!-- .prr-times-read-area -->
                </div>
                <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
                <div class="prr-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div><!-- .prr-massive-blog-excerpt -->
            <?php
                endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;

                wp_reset_postdata();
            ?>
        </div><!-- .col-md-6 -->
        <div class="col-md-6">
            <h2><span class="prr-title"><?php echo esc_html( get_cat_name( $periar_cat_id ) ); ?></span></h2>
            <div class="post-slide-hor-2-arrow">
                <div class="prev">
                    <span class="icofont-swoosh-down"></span>
                </div><!-- .prev -->
                <div class="next">
                    <span class="icofont-swoosh-up"></span>
                </div><!-- .next -->
            </div><!-- .post-slide-hor-arrow -->
            <div class="post-slide-hor-2">
                <?php
                    if ( $periar_list_item->have_posts() ) :
                        while ( $periar_list_item->have_posts() ) : $periar_list_item->the_post();
                ?>
                <div class="prr-sbs-post-excerpt clearfix prr-excerpt-slide">
                    <?php if ( has_post_thumbnail() ): ?>
                    <div class="content-left">
                        <?php if ( has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('periar-1200-3x2'); ?>
                            </a>
                        <?php endif; ?>
                    </div><!-- .content-left -->
                    <div class="content-right">
                    <?php endif; ?>
                        <div class="prr-block-post-meta clearfix">
                            <div class="prr-category">
                                <?php the_category( ' ' ); ?>
                            </div><!-- .prr-category -->
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
                        <div class="prr-times-read-area clearfix">
                            <span class="icofont-clock-time"></span>
                            <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                        </div><!-- .prr-times-read-area -->
                    <?php if ( has_post_thumbnail() ): ?>
                    </div><!-- .content-right -->
                    <?php endif; ?>
                </div><!-- .prr-sbs-post-excerpt -->
                <?php
                    endwhile;

                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;

                    wp_reset_postdata();
                ?>
            </div><!-- .post-slide-hor -->
        </div><!-- .col-md-6 -->
    </div><!-- .row -->
</div><!-- .container -->
