<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Nulis
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

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
		</a>

		<hgroup class="blog-name">
			<?php if ( get_theme_mod( 'nulis_short_profile' ) && get_theme_mod( 'nulis_hide_footer_title_description' ) ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_theme_mod( 'nulis_fullname' ); ?></a></h1>
				<h2 class="site-description"><?php echo get_theme_mod( 'nulis_short_profile' ); ?></h2>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'nulis_hide_footer_title_description' ) ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif;?>
		</hgroup>
		
		<?php get_template_part('socials');?>

		<div class="site-info">
			<p class="credits">
				
				<br />
				
				<a href="#" id="scrollup" class="genericon genericon-collapse"></a>
			</p><!-- .credits -->	
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
