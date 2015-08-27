<?php
/**
* The template for displaying Social Links.
*
* @package Nulis
* @Since 1.0.0
*
*/	
$dribbble_link = get_theme_mod( 'nulis_dribbble_link' );
$facebook_link = get_theme_mod( 'nulis_facebook_link' );
$flickr_link = get_theme_mod( 'nulis_flickr_link' );
$github_link = get_theme_mod( 'nulis_github_link' );
$google_plus_link = get_theme_mod( 'nulis_google_plus_link' );
$linkedin_link = get_theme_mod( 'nulis_linkedin_link' );
$pinterest_link = get_theme_mod( 'nulis_pinterest_link' );
$rss_link = get_theme_mod( 'nulis_rss_link' );
$tumblr_link = get_theme_mod( 'nulis_tumblr_link' );
$twitter_link = get_theme_mod( 'nulis_twitter_link' );
$vimeo_link = get_theme_mod( 'nulis_vimeo_link' );
$youtube_link = get_theme_mod( 'nulis_youtube_link' );
$social_links = ( '' != $dribbble_link
		|| '' != $facebook_link
		|| '' != $flickr_link		
		|| '' != $github_link
		|| '' != $google_plus_link		
		|| '' != $linkedin_link
		|| '' != $pinterest_link
		|| '' != $rss_link
		|| '' != $tumblr_link		
		|| '' != $twitter_link
		|| '' != $vimeo_link
		|| '' != $youtube_link		
	) ? true : false;
?>

<?php if ( $social_links ) : ?>
<section class="social-area">
	<div class="social-container">
		<ul class="social-links">

			<?php if ( '' != $dribbble_link ) : ?>
			<li class="dribbble-link">
				<a href="<?php echo esc_url( $dribbble_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Dribbble', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Dribbble', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $facebook_link ) : ?>
			<li class="facebook-link">
				<a href="<?php echo esc_url( $facebook_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Facebook', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Facebook', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $flickr_link ) : ?>
			<li class="flickr-link">
				<a href="<?php echo esc_url( $flickr_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Flickr', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Flickr', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>	

			<?php if ( '' != $github_link ) : ?>
			<li class="github-link">
				<a href="<?php echo esc_url( $github_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Github', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Github', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $google_plus_link ) : ?>
			<li class="google-plus-link">
				<a href="<?php echo esc_url( $google_plus_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Google Plus', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Google Plus', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>			

			<?php if ( '' != $linkedin_link ) : ?>
			<li class="linkedin-link">
				<a href="<?php echo esc_url( $linkedin_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'LinkedIn', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'LinkedIn', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $pinterest_link ) : ?>
			<li class="pinterest-link">
				<a href="<?php echo esc_url( $pinterest_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Pinterest', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Pinterest', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $rss_link ) : ?>
			<li class="rss-link">
				<a href="<?php echo esc_url( $rss_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'RSS', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'RSS', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $tumblr_link ) : ?>
			<li class="tumblr-link">
				<a href="<?php echo esc_url( $tumblr_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Tumblr', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Tumblr', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $twitter_link ) : ?>
			<li class="twitter-link">
				<a href="<?php echo esc_url( $twitter_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Twitter', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Twitter', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $vimeo_link ) : ?>
			<li class="vimeo-link">
				<a href="<?php echo esc_url( $vimeo_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Vimeo', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Vimeo', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( '' != $youtube_link ) : ?>
			<li class="youtube-link">
				<a href="<?php echo esc_url( $youtube_link ); ?>" class="social-iconic" title="<?php esc_attr_e( 'Youtube', 'nulis' ); ?>" target="_blank">
					<span class="screen-reader-text"><?php _e( 'Youtube', 'nulis' ); ?></span>
				</a>
			</li>
			<?php endif; ?>	

		</ul><!-- .social-links -->
	</div><!-- .social-container -->
</section><!-- .social-area -->
<?php endif; // end if social links ?>
