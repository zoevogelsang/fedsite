<?php
/**
 * Template part for displaying Top section in homepage
 */

    $periar_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  8,
        'offset'            =>  1,
    );

    $periar_list_item  = new WP_Query( $periar_list_args );

    $periar_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  1,
        'ignore_sticky_posts' => 1
    );

    $periar_block_item  = new WP_Query( $periar_block_args );
?>
<div id="content" class="container prr-spacing">
    <div class="row">
        <div class="col-md-7 offset-md-2 featured-area d-flex align-items-center">
            <?php
                if ( $periar_block_item->have_posts() ) :
                    while ( $periar_block_item->have_posts() ) : $periar_block_item->the_post();
            ?>
            <div class="featured-section">
                <div class="main-featured-image">
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('periar-650-3x2'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="featured-title">
                        <div class="prr-category">
                            <?php the_category( ' ' ); ?>
                        </div><!-- .prr-category -->
                        <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
                        <div class="prr-post-meta">
                            <span class="icofont-user-alt-3"></span>
                            <span class="prr-author"><?php the_author(); ?></span><!-- .prr-author -->
                            <span class="icofont-clock-time"></span>
                            <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                        </div><!-- .prr-post-meta -->
                    </div><!-- .featured-title -->
                </div><!-- .main-featured-image -->
            </div><!-- .featured-section -->
            <?php
                endwhile;
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;

                wp_reset_postdata();
            ?>
        </div><!-- .col-md-9 -->

        <div class="col-md-3">
            <div class="post-slide-hor-arrow">
                <div class="prev">
                    <span class="icofont-swoosh-down"></span>
                </div><!-- .prev -->
                <div class="next">
                    <span class="icofont-swoosh-up"></span>
                </div><!-- .next -->
            </div><!-- .post-slide-hor-arrow -->

            <div class="post-slide-hor">
            <?php
                if ( $periar_list_item->have_posts() ) :
                    while ( $periar_list_item->have_posts() ) : $periar_list_item->the_post();
            ?>
                <div class="prr-excerpt-slide">
                    <div class="prr-category">
                        <?php the_category( ' ' ); ?>
                    </div><!-- .prr-category -->
                    <div class="prr-excerpt-area">
                        <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
                        <p><?php echo esc_html( periar_excerpt( 15 ) ); ?></p>
                    </div><!-- .prr-excerpt-area -->
                </div><!-- .prr-excerpt-slider -->
            <?php
                endwhile;

                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;

                wp_reset_postdata();
            ?>
            </div><!-- .post-slide-hor -->
        </div><!-- .col-md-3 -->
    </div><!-- .row -->
</div><!-- .container featured area -->
