<?php
/**
 * The template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Newsmandu
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area <?php newsmandu_magazine_content_class(); ?>">
			<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				?>

				<ul class="search-results list-group list-group-flush pb-4">

				<?php
					/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called search-result.php in the template-parts folder.
					 */
					get_template_part( 'template-parts/search', 'result' );

					endwhile;
				?>

				</ul>

				<?php
				the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
				?>

			</main>
		</div><!-- #primary -->
		<?php
		/* Get Sidebar #secondary */
			get_sidebar();
		?>
	</div>
</div><!-- /.container -->

<?php
get_footer();
