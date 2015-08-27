<?php
/**
 * @package Nulis
 */
$format = get_post_format();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) : ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
			<?php else : ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( nulis_get_link_url() ) ), '</a></h2>' );
			endif;
		?>
		
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php nulis_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>		
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'nulis-featured' ); ?></a>
		</figure>

	<?php endif;?><!-- .entry-thumbnail -->	

	<div class="entry-content">
		<?php the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nulis' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nulis' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer clear">
		<?php nulis_comments(); ?>
		<?php nulis_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
