<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					twentyfifteen_the_custom_logo();

					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="73px">
							<path fill-rule="evenodd" fill="rgb(1, 1, 1)" d="M2.930,-0.000 C2.930,-0.000 61.070,-0.000 61.070,-0.000 C62.688,-0.000 64.000,1.312 64.000,2.930 C64.000,2.930 64.000,70.070 64.000,70.070 C64.000,71.688 62.688,73.000 61.070,73.000 C61.070,73.000 2.930,73.000 2.930,73.000 C1.312,73.000 -0.000,71.688 -0.000,70.070 C-0.000,70.070 -0.000,2.930 -0.000,2.930 C-0.000,1.312 1.312,-0.000 2.930,-0.000 Z"></path>
							<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M6.000,5.000 C6.000,5.000 58.000,5.000 58.000,5.000 C58.552,5.000 59.000,5.448 59.000,6.000 C59.000,6.000 59.000,67.000 59.000,67.000 C59.000,67.552 58.552,68.000 58.000,68.000 C58.000,68.000 6.000,68.000 6.000,68.000 C5.448,68.000 5.000,67.552 5.000,67.000 C5.000,67.000 5.000,6.000 5.000,6.000 C5.000,5.448 5.448,5.000 6.000,5.000 Z"></path>
							<path fill-rule="evenodd" fill="rgb(1, 1, 1)" d="M16.000,55.000 C16.000,55.000 16.000,50.000 16.000,50.000 C16.000,50.000 48.000,50.000 48.000,50.000 C48.000,50.000 48.000,55.000 48.000,55.000 C48.000,55.000 16.000,55.000 16.000,55.000 ZM16.000,34.000 C16.000,34.000 48.000,34.000 48.000,34.000 C48.000,34.000 48.000,39.000 48.000,39.000 C48.000,39.000 16.000,39.000 16.000,39.000 C16.000,39.000 16.000,34.000 16.000,34.000 ZM16.000,18.000 C16.000,18.000 48.000,18.000 48.000,18.000 C48.000,18.000 48.000,23.000 48.000,23.000 C48.000,23.000 16.000,23.000 16.000,23.000 C16.000,23.000 16.000,18.000 16.000,18.000 Z"></path>
							</svg></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="73px">
							<path fill-rule="evenodd" fill="rgb(1, 1, 1)" d="M2.930,-0.000 C2.930,-0.000 61.070,-0.000 61.070,-0.000 C62.688,-0.000 64.000,1.312 64.000,2.930 C64.000,2.930 64.000,70.070 64.000,70.070 C64.000,71.688 62.688,73.000 61.070,73.000 C61.070,73.000 2.930,73.000 2.930,73.000 C1.312,73.000 -0.000,71.688 -0.000,70.070 C-0.000,70.070 -0.000,2.930 -0.000,2.930 C-0.000,1.312 1.312,-0.000 2.930,-0.000 Z"></path>
							<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M6.000,5.000 C6.000,5.000 58.000,5.000 58.000,5.000 C58.552,5.000 59.000,5.448 59.000,6.000 C59.000,6.000 59.000,67.000 59.000,67.000 C59.000,67.552 58.552,68.000 58.000,68.000 C58.000,68.000 6.000,68.000 6.000,68.000 C5.448,68.000 5.000,67.552 5.000,67.000 C5.000,67.000 5.000,6.000 5.000,6.000 C5.000,5.448 5.448,5.000 6.000,5.000 Z"></path>
							<path fill-rule="evenodd" fill="rgb(1, 1, 1)" d="M16.000,55.000 C16.000,55.000 16.000,50.000 16.000,50.000 C16.000,50.000 48.000,50.000 48.000,50.000 C48.000,50.000 48.000,55.000 48.000,55.000 C48.000,55.000 16.000,55.000 16.000,55.000 ZM16.000,34.000 C16.000,34.000 48.000,34.000 48.000,34.000 C48.000,34.000 48.000,39.000 48.000,39.000 C48.000,39.000 16.000,39.000 16.000,39.000 C16.000,39.000 16.000,34.000 16.000,34.000 ZM16.000,18.000 C16.000,18.000 48.000,18.000 48.000,18.000 C48.000,18.000 48.000,23.000 48.000,23.000 C48.000,23.000 16.000,23.000 16.000,23.000 C16.000,23.000 16.000,18.000 16.000,18.000 Z"></path>
							</svg></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
				<!--<a class="mdu-button mdu-button-assine" href="/assine">
					Assine
				</a>-->
			</div><!-- .site-branding -->
		</header><!-- .site-header -->

		<?php get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
