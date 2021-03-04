<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newsmandu
 */

get_header();
?>

<div class="container">
	<div class="row">

	<div id="primary" class="content-area <?php echo esc_attr( col_class_filter() ); ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-single-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/post/single', get_post_format() );
			?>
			<?php newsmandu_magazine_authors_profile(); ?>
			<section class="latest-post">
				<h2><?php echo esc_html__( 'You may also like', 'newsmandu-magazine' ); ?></h2>
				<div class="row top-post">
					<?php newsmandu_magazine_latest_post(); ?>
				</div>
			</section>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			newsmandu_magazine_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/* Get Sidebar #secondary */
get_sidebar();
?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();


