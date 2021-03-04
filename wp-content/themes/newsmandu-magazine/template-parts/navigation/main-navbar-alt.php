<?php
/**
 * Template part for alternative displaying main navigation top-bar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>
<?php if ( get_theme_mod( 'mainmenu_dropdown_mode' ) !== 'bootstrap' ) { ?>

<nav class="navbar navbar-expand-lg main-navigation nav-search appear-left">
	<?php } else { ?>
	<nav class="navbar navbar-expand-lg main-navigation nav-search">
		<?php } ?>
		<div class="container">

			<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarmenus">
				<span></span>
				<span></span>
				<span></span>
			</button>

			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => 'div',
					'container_id'    => 'navbarmenus',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'depth'           => 8,
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => 'Newsmandu_Magazine_WP_Bootstrap_Navwalker::fallback',
				)
			);
			?>

			<?php
			get_template_part( 'template-parts/navigation/add-item', 'search-form' );
			?>


		</div><!-- .container -->
	</nav><!-- .site-navigation -->
