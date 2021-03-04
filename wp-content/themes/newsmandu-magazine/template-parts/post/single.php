<?php
/**
 * Template part for displaying Single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if ( get_post_type() === 'post' ) {
	?>
		<div class="entry-meta">
			<i class="fas fa-user-alt"></i>
		<?php
			newsmandu_magazine_posted_by();
		?>
			<i class="far fa-calendar-alt"></i>
		<?php
			newsmandu_magazine_posted_on();
		?>
			<i class="fas fa-folder"></i>
		<?php
			$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu-magazine' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			echo '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
		}
		?>
		</div>
	<?php
}
?>
<?php
	the_post_thumbnail(
		'newsmandu-featured-1080-400',
		array( 'class' => 'img-fluid rounded mb-2 d-block' )
	);
	?>

<div class="card-body">


	<?php
	if ( has_excerpt() ) :
		?>
			<div class="lead"><?php the_excerpt(); ?></div>
		<?php
		endif;
	?>

	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers */
					esc_html__( 'Continue reading%s', 'newsmandu-magazine' ),
					'<span class="screen-reader-text">' . esc_html( get_the_title() ) . '</span>'
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsmandu-magazine' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php newsmandu_magazine_entry_footer(); ?>
	</footer>

</div><!-- .card-body -->
</article><!-- #post-<?php the_ID(); ?> -->
