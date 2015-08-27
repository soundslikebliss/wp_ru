<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nulis
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nulis' ); ?></a>

	<div class="toolbar">
		<ul class="sidebar-toggle clear">
			<li class="menu-icon-wrapper"><a id="menu-icon" aria-controls="menu" aria-expanded="false" href="#" class="iconized m-icon"><span class="screen-reader-text"><?php _e( 'Menu', 'nulis' ); ?></span></a></li>
			<li  class="search-icon-wrapper"><a id="search-icon" aria-controls="search" aria-expanded="false" href="#" class="iconized s-icon"><span class="screen-reader-text"><?php _e( 'Search', 'nulis' ); ?></span></a></li>
		</ul><!-- .sidebar-toggle -->	
	</div><!-- .toolbar -->		

	<section id="top-panel" class="site-panel">
		<div class="search-box clear toggle">
			<?php get_search_form();?>
		</div><!-- .search-box -->

		<div class="widget-box toggle">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav class="main-navigation clear" role="navigation">			
				<?php 
				wp_nav_menu( array( 
					'theme_location'  => 'primary',
					'container_class' => 'primary-nav clear',
					'menu_id'         => 'navbar',
					'menu_class'	  => 'nav-menu'
				    ) );
			    ?>
			</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php get_sidebar(); ?>
		</div><!-- .widget-box -->
	</section><!-- #top-panel -->

	<header id="masthead" class="site-header" role="banner">
		<div class="inner-header">
			<div class="site-branding">
				<?php
				$logo_image = get_theme_mod('nulis_logo_image');
				$use_gravatar = get_theme_mod('nulis_use_gravatar'); ?>
				<a class="user-avatar circle" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if ( $use_gravatar ) :?>
						<img class="nulis-avatar circle gravatar" src="<?php echo nulis_gravatar_logo(); ?>"/>
					<?php elseif ( $logo_image ) : ?>
						<img class="nulis-avatar circle" src="<?php echo $logo_image ?>"/>
					<?php else: ?>
						<figure class="nulis-avatar default-logo circle"/></figure>
					<?php endif; ?>
				</a><!-- .user-avatar -->

				<hgroup class="blog-name">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup><!-- .blog-name -->
			</div><!-- .site-branding -->

			<?php get_template_part('socials');?>
		</div><!-- .inner-header -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
	