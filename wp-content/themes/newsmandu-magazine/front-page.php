<?php
/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newsmandu
 */

get_header();
?>
	<?php
	$activefeat = array();
	for ( $i = 0; $i < 3; $i++ ) {
		if ( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) ) {
			$activefeat[] = $i;
		}
	}
	?>
	<?php
	$activesec = array();
	for ( $i = 0; $i <= 4; $i++ ) {
		if ( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) {
			$activesec[] = $i;
		}
	}
	?>
	<?php if ( 0 !== count( $activefeat ) || count( $activesec ) ) : ?>
		<?php if ( get_theme_mod( 'featured_post_toggle' ) || get_theme_mod( 'featured_post_second_toggle' ) ) : ?>
<section class="featured-section <?php echo ( get_theme_mod( 'slider_toggle' ) ? 'with-slider' : ' ' ); ?>">
	<div class="container">
		<h2 class="feat-title"><?php echo esc_html( get_theme_mod( 'featured_title' ) ); ?><span> <?php echo esc_html( get_theme_mod( 'featured_sub_title' ) ); ?></span></h2>
			<?php if ( 0 !== count( $activefeat ) ) : ?>
				<?php if ( get_theme_mod( 'featured_post_toggle' ) ) : ?>
		<div class=" row featured-first">
					<?php
					foreach ( $activefeat as $i ) :
						$newsmandu_magazine_featured_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) ) );
						$newsmandu_magazine_featured_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) )->post_title );
						$newsmandu_magazine_featured_date        = get_the_date( '', get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) );
						$author_id                               = get_post_field( 'post_author', get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) );
						$newsmandu_magazine_featured_author      = get_the_author_meta( 'display_name', $author_id );
						$newsmandu_magazine_featured_author_link = get_author_posts_url( $author_id );
						$newsmandu_magazine_featured_category    = get_the_term_list( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ), 'category' );
						$newsmandu_magazine_featured_description = apply_filters( 'the_excerpt', get_the_excerpt( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) ) );
						?>
			<div class="entries col-md-4">
				<div class="entries-visual">
						<?php if ( $newsmandu_magazine_featured_image ) : ?>
					<img src="<?php echo esc_url( $newsmandu_magazine_featured_image ); ?>" alt="">    
					<?php endif; ?>
				</div>
				<div class="entries-desc">
						<?php echo wp_kses_post( $newsmandu_magazine_featured_category ); ?><span>|</span><a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_date ); ?></a> 
						<?php if ( $newsmandu_magazine_featured_title ) : ?>
						<h2><a href="<?php echo esc_url( get_permalink( get_theme_mod( 'newsmandu_magazine_featured_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_title ); ?></a></h2>
					<?php endif; ?>
					<p><a href="<?php echo esc_url( $newsmandu_magazine_featured_author_link ); ?>"><?php echo esc_html__( 'By ', 'newsmandu-magazine' ); ?><?php echo esc_html( $newsmandu_magazine_featured_author ); ?></a> </p>
						<?php if ( $newsmandu_magazine_featured_description ) : ?>
						<div class="desc">
							<?php echo wp_kses_post( $newsmandu_magazine_featured_description ); ?>
						</div>
					<?php endif; ?>
				</div>	
			</div>
			<?php endforeach; ?>
		</div>
			<?php endif; ?><!-- End of featured post toggle -->
		<?php endif; ?><!-- End of Active count Loop -->
			<?php if ( get_theme_mod( 'ad_setting2' ) ) : ?>
		<div class = 'ad-area'>
				<?php echo wp_kses( get_theme_mod( 'ad_setting2' ), newsmandu_magazine_expanded_alowed_tags() ); ?>
		</div>
		<?php endif; ?> <!-- End of ad-area1 -->
			<?php if ( 0 !== count( $activesec ) ) : ?>
				<?php if ( get_theme_mod( 'featured_post_second_toggle' ) ) : ?>
		<div class="featured-second row">
					<?php
					foreach ( $activesec as $key => $i ) :
						$newsmandu_magazine_featured_second_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) );
						$newsmandu_magazine_featured_second_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) )->post_title );
						$newsmandu_magazine_featured_second_date        = get_the_date( '', get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) );
						$author_id_2                                    = get_post_field( 'post_author', get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) );
						$newsmandu_magazine_featured_second_author      = get_the_author_meta( 'display_name', $author_id_2 );
						$newsmandu_magazine_featured_second_author_link = get_author_posts_url( $author_id_2 );
						?>
						<?php if ( $i < 3 ) : ?>
							<?php if ( 0 === $i ) : ?>
			<div class="col-md-8">
				<div class="row">
				<?php endif; ?>
					<div class="col-sm-<?php echo ( 0 === $i ? '12 bot-space' : '6 last-space' ); ?>">
							<?php if ( $newsmandu_magazine_featured_second_image ) : ?>
						<img src="<?php echo esc_url( $newsmandu_magazine_featured_second_image ); ?>" alt="">  
						<?php endif; ?>
						<div class="content-meta">
							<?php if ( $newsmandu_magazine_featured_second_title ) : ?>
							<h2><a href="<?php echo esc_url( get_permalink( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_second_title ); ?></a></h2>
							<?php endif; ?>
							<div class="meta">
								<i class="fas fa-user-alt"><a href="<?php echo esc_url( $newsmandu_magazine_featured_second_author_link ); ?>"><?php echo esc_html__( 'By', 'newsmandu-magazine' ); ?> <?php echo esc_html( $newsmandu_magazine_featured_second_author ); ?></a></i>
								<i class="far fa-calendar-alt"><a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_second_date ); ?></a></i>
							</div>
						</div>
					</div>
							<?php if ( 2 === $i ) : ?>
				</div>
			</div>
			<?php endif; ?>
			<?php endif; ?>

						<?php if ( 3 === $i ) : ?>
			<div class="col-md-4 last-div">
							<?php if ( $newsmandu_magazine_featured_second_image ) : ?>
				<img src="<?php echo esc_url( $newsmandu_magazine_featured_second_image ); ?>" alt="">  
				<?php endif; ?>
				<div class="content-meta">
							<?php if ( $newsmandu_magazine_featured_second_title ) : ?>
					<h2><a href="<?php echo esc_url( get_permalink( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_second_title ); ?></a></h2>
					<?php endif; ?>
					<div class="meta">
					<i class="fas fa-user-alt"><a href="<?php echo esc_url( $newsmandu_magazine_featured_second_author_link ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_second_author ); ?></a></i>
					<i class="far fa-calendar-alt"><a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'newsmandu_magazine_featured_second_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_magazine_featured_second_date ); ?></a></i>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?><!-- End of featured second post toggle -->
		<?php endif; ?><!-- End of Active count Loop -->
	</div>
</section>
<?php endif; ?> <!-- End of Toggle Loop-->
<?php endif; ?> <!-- End of Active Loop -->
<?php if ( get_theme_mod( 'top_stories_toggle' ) ) : ?>
<section class="top-stories">
	<?php
		$newsmandu_magazine_top_stories_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_magazine_post_page_dropdown' ) ) );
		$newsmandu_magazine_top_stories_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_magazine_post_page_dropdown' ) )->post_title );
		$newsmandu_magazine_top_stories_description = apply_filters( 'the_content', get_post( get_theme_mod( 'newsmandu_magazine_post_page_dropdown' ) )->post_content );
	?>
	<?php if ( $newsmandu_magazine_top_stories_image || $newsmandu_magazine_top_stories_title || $newsmandu_magazine_top_stories_description ) : ?>
	<div class="bg-img" style="background-image:url( <?php echo esc_url( $newsmandu_magazine_top_stories_image ); ?> );" >
		<div class="overlay"></div>
		<div class="top-stories-content container">
			<h2><?php echo esc_html( $newsmandu_magazine_top_stories_title ); ?></h2>
			<?php echo wp_kses_post( $newsmandu_magazine_top_stories_description ); ?>
		</div>
	</div>
	<?php endif; ?>
	<div class="container">
		<div class="row top-post">
			<?php newsmandu_magazine_latest_post(); ?>
		</div>
		<?php if ( get_theme_mod( 'ad_setting3' ) ) : ?>
		<div class = 'ad-area'>
			<?php echo wp_kses( get_theme_mod( 'ad_setting3' ), newsmandu_magazine_expanded_alowed_tags() ); ?>
		</div>
		<?php endif; ?> <!-- End of ad-area2 -->
		<div class="row">
			<div class="skip-post col-md-<?php echo ( is_active_sidebar( 'fpsidebar' ) ? '8' : '12' ); ?>">
					<?php newsmandu_magazine_latest_skip_post(); ?>
			</div>
			<?php if ( is_active_sidebar( 'fpsidebar' ) ) : ?>	
			<div class="sidebar col-md-4">
				<?php dynamic_sidebar( 'fpsidebar' ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?><!-- End of top story post toggle -->
<?php
get_footer();
