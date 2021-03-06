<?php
/**
 * @package Nulis
 */
$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a class="badge badger" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'nulis' ), get_post_format_string( $format ) ) ); ?>"></a>
	</header>
	
	<div class="entry-content">
		<?php 
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nulis' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
				
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nulis' ),
				'after'  => '</div>',
				) 
			);
		?>
				
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nulis_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<?php 
		if ( is_single() ):
			the_title( '<h1 class="entry-title">', '</h1>' );
		else:
			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); 
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clear">
		<?php nulis_comments(); ?>		
		<?php nulis_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
