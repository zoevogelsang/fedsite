<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmandu
 */

?>

</div><!-- #content -->
<footer id="footer">
	<?php if ( is_active_sidebar( 'newswidget' ) ) : ?>
	<div class="newsletter-widgets">
		<div class="container">
			<?php dynamic_sidebar( 'Newsletter-widget' ); ?>
		</div>
	</div>
	<?php endif; ?> <!-- End of div newsletter -->
	<?php if ( get_theme_mod( 'footer_instagram_title' ) || get_theme_mod( 'footer_instagram' ) ) : ?>
	<div class="footer-gallery">
		<?php if ( get_theme_mod( 'footer_instagram_title' ) ) : ?>
		<h2><?php echo esc_html( get_theme_mod( 'footer_instagram_title' ) ); ?></h2>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'footer_instagram' ) ) : ?>
			<?php echo wp_kses( do_shortcode( get_theme_mod( 'footer_instagram' ) ), newsmandu_magazine_expanded_alowed_tags() ); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?> <!-- end of footer gallery -->
	<div class="bottom-footer">
		<div class="container">
			<?php
					$active = array();
			for ( $i = 1; $i <= 4; $i++ ) {
				if ( is_active_sidebar( 'footer-' . $i ) ) {
					$active[] = $i;
				}
			}
			?>
			<?php if ( 0 !== count( $active ) ) { ?>
			<div id="footer-widgets" class="footer-widgets row">
				<?php foreach ( $active as $footer_widget_id ) : ?>
				<div class="col-lg-3 col-sm-6 column">
					<?php dynamic_sidebar( 'footer-' . $footer_widget_id ); ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php } ?>
			<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
			<div class="row footer-social">
				<div class="col-sm-12">
				<?php
				if ( has_nav_menu( 'social_menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'social_menu',
						)
					);
					endif;
				?>
				</div>
			</div> <!-- end of footer social div -->
			<?php endif; ?>
			<div class="site-info row">
				<?php if ( get_theme_mod( 'footer_copyright_text' ) ) : ?>
				<div class="copyright-text col-md-6">
					<p><?php echo esc_html( get_theme_mod( 'footer_copyright_text' ) ); ?></p>
				</div>
				<?php endif; ?>
				<div class="author col-md-6">
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'newsmandu-magazine' ), 'Newsmandu Magazine', '<a href="">Themesmandu</a>' );
					?>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>
	<button class="up-btn" id="up-btn" title="<?php echo esc_attr__( 'Go to top', 'newsmandu-magazine' ); ?>"
		style="display: block;"><i class="fas fa-chevron-up"></i></button>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
