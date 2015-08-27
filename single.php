<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nulis
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();
			
			$format = get_post_format();
			
			if ( in_array( $format, array( 'link', 'quote', 'aside' ) ) ) :
				get_template_part( 'content', $format );
			else: 
				get_template_part( 'content', 'single' ); 
			endif;
			
				// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php nulis_post_nav(); ?>
			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
