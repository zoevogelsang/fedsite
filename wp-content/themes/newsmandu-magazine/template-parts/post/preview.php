<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>

<article id="post-<?php the_ID(); ?>" class="post format-standard">

	<?php if ( get_the_post_thumbnail() ) : ?>
	<figure>
		<?php the_post_thumbnail(); ?>
	</figure>
	<?php endif; ?>

	<div class="description">
		<?php
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
		<div class="entry-summary card-text">
			<?php newsmandu_magazine_entry_summary(); ?>
		</div>
		<footer class="entry-footer">
			<?php newsmandu_magazine_entry_footer(); ?>
		</footer>
	</div>
	<?php
	if ( get_post_type() === 'post' ) {
		?>

	<div class="entry-meta card-footer">
		<?php newsmandu_magazine_posted_on(); ?>
		<?php newsmandu_magazine_posted_by(); ?>
	</div>

		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
