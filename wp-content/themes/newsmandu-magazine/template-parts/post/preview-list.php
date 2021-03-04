<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-md-row box-shadow h-md-250' ); ?>>
<?php
				// https://developer.wordpress.org/reference/functions/the_post_thumbnail/.
				the_post_thumbnail(
					array( 390, 260 ),
					array( 'class' => 'align-self-center card-img-right flex-auto d-lg-block' )
				);
				?>
		<div class="card-body d-flex flex-column align-items-start">
			<?php
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		<?php
		if ( get_post_type() === 'post' ) {
			?>
			<div class="entry-meta">
			<?php newsmandu_magazine_posted_on(); ?>
			<?php newsmandu_magazine_posted_by(); ?>
			</div>
			<?php
		}
		?>
		
			<div class="entry-summary card-text mb-auto">
				<?php newsmandu_magazine_entry_summary(); ?>
			</div>
		</div>
			

</article><!-- #post-<?php the_ID(); ?> -->
