<?php
/**
 * The template for displaying search results pages.
 *
 * @package Nulis
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'nulis' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); 
			$format = get_post_format();
			
			if ( in_array( $format, array( 'aside', 'link', 'quote' ) ) ) :
				get_template_part( 'content', $format );
			else: 
				get_template_part( 'content', 'search' ); 
			endif;

			endwhile; ?>

			<?php nulis_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
