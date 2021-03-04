<?php if( is_active_sidebar( 'perier_blog-footer-left' ) ||
			is_active_sidebar( 'perier_blog-footer-middle' ) ||
			is_active_sidebar( 'perier_blog-footer-right' ) ) : ?>
		<footer class="prr-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
							<?php
								if( is_active_sidebar( 'perier_blog-footer-left' ) ) {
									dynamic_sidebar( 'perier_blog-footer-left' );
								}
							?>
					</div>
					<div class="col-md-4">
						<?php
							if( is_active_sidebar( 'perier_blog-footer-middle' ) ) {
								dynamic_sidebar( 'perier_blog-footer-middle' );
							}
						?>
					</div>
					<div class="col-md-4">
						<?php
							if( is_active_sidebar( 'perier_blog-footer-right' ) ) {
								dynamic_sidebar( 'perier_blog-footer-right' );
							}
						?>
					</div>
				</div>
			</div>
		</footer>
<?php endif; ?>
		<div class="container">
			<div class="footer-site-info">
				<?php esc_html_e( 'Copyright', 'periar' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( '. All rights reserved.', 'periar' ); ?>
				<span class="footer-info-right">
				<?php echo esc_html__(' | Designed by', 'periar') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/', 'Periar'); ?>"><?php echo esc_html__(' Crafthemes.com', 'periar') ?></a>
				</span>
			</div><!-- /.footer-site-info -->
		</div>
    <?php wp_footer(); ?>
  </body>
</html>
