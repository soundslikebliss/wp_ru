<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nulis
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if (is_page('Home')): ?>
			<?php get_template_part( 'content', 'intro-blurb' ); ?>
		<?php elseif (is_page('Skills')): ?>
			<?php get_template_part('content', 'skills'); ?>
		<?php endif; ?>


		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nulis' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer clear">
		<?php edit_post_link( __( 'Edit', 'nulis' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
