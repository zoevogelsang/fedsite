<?php
/**
 * The site header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmandu
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div id="page" class="site">
		<div class="menu-overlay-bg">
			<span></span>
			<span></span>
		</div>
		<header id="top-header" class="site-header" role="banner">
			<a class="skip-link" href="#content"><?php _e( 'To the content', 'newsmandu-magazine' ); ?></a>
			<?php if ( get_theme_mod( 'top_menu_toggle' ) ) : ?>
			<div class="top-menu">
				<div class="container">
					<div class="row navbar">
						<?php if ( get_theme_mod( 'contact_email' ) || get_theme_mod( 'phone_number' ) ) : ?>
						<div class="site-detail col-sm-6">
							<?php if ( get_theme_mod( 'contact_email' ) ) : ?>
							<p><?php echo esc_html( get_theme_mod( 'contact_email' ) ); ?></p>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'phone_number' ) ) : ?>
							<p><?php echo esc_html( get_theme_mod( 'phone_number' ) ); ?></p>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						<div class="secondary-menu col-sm-6">
							<?php
							if ( has_nav_menu( 'top_menu' ) ) :
								wp_nav_menu(
									array(
										'theme_location' => 'top_menu',
									)
								);
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'ad_setting1' ) || get_bloginfo( 'name' ) || has_custom_logo() ) : ?>
			<div class="site-logo">
				<div class="container">
				<?php if ( get_bloginfo( 'name' ) || has_custom_logo() ) : ?>
					<div class="site-branding">
						<?php if ( ! has_custom_logo() ) { ?>
							<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
							itemprop="url"><?php bloginfo( 'name' ); ?></a>
							<?php
						endif;
						$newsmandu_magazine_description = get_bloginfo( 'description', 'display' );
						if ( $newsmandu_magazine_description || is_customize_preview() ) :
							?>
						<p class="site-description"><?php echo wp_kses_post( $newsmandu_magazine_description ); ?></p>
						<?php endif; ?>
							<?php
						} else {
							the_custom_logo();
						}
						?>
					</div>
					<?php endif; ?> <!-- End of condition for site-banding div -->
					<?php if ( get_theme_mod( 'ad_setting1' ) ) : ?>
					<div class = 'ad-area'>
						<?php echo wp_kses( get_theme_mod( 'ad_setting1' ), newsmandu_magazine_expanded_alowed_tags() ); ?>
					</div>
					<?php endif; ?> <!-- End of ad-area1 -->
				</div>
			</div>
			<?php endif; ?> <!-- End of condition for site-logo div -->
			<?php
			if ( get_theme_mod( 'menubar_mode' ) === 'alt' ) {
				// alternative navigation bar:
				// left: logo, main menu - right: search form or something.
				get_template_part( 'template-parts/navigation/main-navbar', 'alt' );
			} else {
				// standard navigation bar:
				// left: logo - right: main menu.
				get_template_part( 'template-parts/navigation/main-navbar' );
			}

			// header page title.
			newsmandu_magazine_header_page_title();

			if ( is_front_page() && ! is_home() ) {
				// head banner on the front page if it enabled.
				get_template_part( 'template-parts/jumbotron' );
			}
			?>
		</header><!-- #masthead -->
		<?php if ( is_front_page() ) : ?>
		<!-- slider background -->
			<?php if ( get_theme_mod( 'slider_toggle' ) ) : ?>
		<div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3900">
			<ul class="carousel-indicators">
				<?php
				for ( $i = 0; $i < 4; $i++ ) :
					?>
				<li data-target="#header-slider" data-slide-to="<?php echo esc_attr( $i ); ?>"
					class="<?php echo esc_html( 0 === $i ? 'active' : '' ); ?>"></li>
				<?php endfor; ?>
			</ul>
			<div class="carousel-inner">
				<?php
				for ( $i = 0; $i < 4; $i++ ) :
					?>
				<div class="carousel-item <?php echo esc_attr( 'carousel-item-' . $i ); ?> <?php echo esc_html( 0 === $i ? 'active' : '' ); ?>">
					<div class="carousel-wrap">
						<div class="header-content">
							<div class="container">
								<?php
								$newsmandu_magazine_slider_post = new WP_Query( array( 'p' => get_theme_mod( 'newsmandu_magazine_slider_post_' . $i ) ) );
								while ( $newsmandu_magazine_slider_post->have_posts() ) :
									$newsmandu_magazine_slider_post->the_post();
									$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu-magazine' ) );
									if ( $categories_list ) {
										?>
								<span class="frontpage-cat-links"><?php echo wp_kses_post( $categories_list ); ?></span>
										<?php
									}
									?>
								<h2><a
										href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
								</h2>
								<p><i class="fas fa-user-alt"><span class="detail"><a
												href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></i>
									<i class="far fa-calendar-alt"><span class="detail"><a
												href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span></i>
								</p>
									<?php
							endwhile;
								?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
		<?php endif; ?> <!-- End of div header slider -->
		<?php endif; ?> <!-- end for condition check of is home page -->
		<div id="content" class="content-wrap">
