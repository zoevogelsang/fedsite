<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

get_header();
?>

<div class="container">
	<div class="row">

	<div id="primary" class="content-area<?php newsmandu_magazine_content_class(); ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/* Get Sidebar #secondary */
get_sidebar();
?>
</div><!-- /.row -->
	<?php if ( get_theme_mod( 'ad_setting4' ) ) : ?>
		<div class = 'ad-area'>
			<?php echo wp_kses( get_theme_mod( 'ad_setting4' ), $my_allowed ); ?>
		</div>
		<?php endif; ?> <!-- End of ad-area1 -->
</div><!-- /.container -->

<?php
get_footer();
