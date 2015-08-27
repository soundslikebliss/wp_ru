<?php
/**
 * @package Nulis
 */
$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if (is_sticky() ): ?>
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

	<?php if ( get_post_gallery() && ! post_password_required() ) : ?>

		<div class="post-gallery clear">
			<?php echo get_post_gallery(); ?>
		</div>
	
	<?php endif; ?>	

	<div class="entry-content">
		<?php 		
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nulis' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nulis' ),
				'after'  => '</div>',
			) 
		);?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clear">
		<?php nulis_comments(); ?>		
		<?php nulis_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->