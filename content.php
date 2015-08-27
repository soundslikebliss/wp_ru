<?php
/**
 * @package Nulis
 */
$format = get_post_format();
$nulis_excerpts = get_theme_mod('nulis_excerpt_options');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( is_sticky()): ?>
			<h5 class="stickies badger"></h5>
		<?php else : ?>
			<a class="badge badger" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'lightnote' ), get_post_format_string( $format ) ) ); ?>"></a>
		<?php endif; ?><!-- .badge -->

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nulis_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'nulis-featured' ); ?></a>
		</figure>

	<?php endif;?><!-- .entry-thumbnail -->	

	<div class="entry-content">
		<?php 
			if ( $nulis_excerpts ) :
				 	
				 	the_excerpt();	
				 
				 else : 	
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
			endif;
		?>
	</div><!-- .entry-content -->

	<?php if ( ! $nulis_excerpts ):?>
	<footer class="entry-footer clear">
		<?php nulis_comments(); ?>		
		<?php nulis_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif;?>

</article><!-- #post-## -->