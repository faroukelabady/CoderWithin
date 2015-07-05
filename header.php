<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Coder Within
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'coderwithin' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div>
			<nav class="top-bar" data-topbar role="navigation">
					<ul class="title-area">
							<li class="name">
								<h1>
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name') ?>
								</a>
								</h1>
							</li>
							<li class="toggle-topbar menu-icon">
									<a href="#">
										<span>Menu</span>
									</a>
							</li>
					</ul>

					<section class="top-bar-section">
						<?php wp_nav_menu( array(
								'container' => false,
								'container_class' => '',
								'theme_location' => 'primary',
								'menu_class' => 'top-bar-menu right',
								'before' => '',                                 // Before each link <a>
				        'after' => '',                                  // After each link </a>
				        'link_before' => '',                            // Before each link text
				        'link_after' => '',                             // After each link text
								'depth' => 10,
								'fallback_cb' => false,                         // Fallback function (see below)
								'walker' => new Top_Bar_Walker(),
									) );
								?>
						<!-- Right Nav Section -->
						<!-- <ul class="right">
							<li class="active"><a href="#">Right Button Active</a></li>
							<li class="has-dropdown">
								<a href="#">Right Button Dropdown</a>
								<ul class="dropdown">
									<li><a href="#">First link in dropdown</a></li>
									<li class="active"><a href="#">Active link in dropdown</a></li>
								</ul>
							</li>

						</ul> -->
					</section>

		</nav>
		</div>

		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<!-- <nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coderwithin' ); ?></button>
		 <?php
			// wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
			 ?>
		</nav> #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
