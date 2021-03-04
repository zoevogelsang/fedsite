<?php
/**
 * Template part for displaying featured post on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>

<?php
// Get featured post ID.
$newsmandu_magazine_featured_id = absint( get_theme_mod( 'post_dropdown_setting' ) );

if ( empty( $newsmandu_magazine_featured_id ) ) {
	return;
}

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $newsmandu_magazine_featured_id ), 'full' );

	// Getting post by ID.
	$query = new WP_Query( 'p=' . $newsmandu_magazine_featured_id );
while ( $query->have_posts() ) :
	$query->the_post();
	?>

<!-- Begin Featured Post -->
<div class="container">
	<div class="jumbotron blog-jumbotron" 
	<?php
	if ( ! empty( $thumbnail ) ) {
		echo ' style="background: url(' . esc_url( $thumbnail[0] ) . ');"'; }
	?>
		>

		<div class="col-md-12 px-0">
			<?php
			the_title( sprintf( '<h1 class="display-4"><a href="%s" class="featured-title title text-white" rel="bookmark">', esc_url( get_permalink( $post->ID ) ) ), '</a></h1>' );
			?>

			<div class="lead my-3">
				<?php the_excerpt(); ?>
			</div>

		</div><!-- .col-md-6.px-0 -->

	</div><!-- .jumbotron -->
</div>

<!-- END Featured Post -->

	<?php
	endwhile;
	// Reset $query.
	wp_reset_postdata();
