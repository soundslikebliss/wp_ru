<?php
/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses nulis_header_style() to style front-end.
 * @uses nulis_admin_header_style() to style wp-admin form.
 * @uses nulis_admin_header_image() to add custom markup to wp-admin form.
 * @uses register_default_headers() to set up the bundled header images.
 *
 * @since Nulis 1.0
 */
function nulis_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '55626D',
		'default-image'          => '%s/assets/images/headers/nulis-header.png',

		// Set height and width, with a maximum value for the width.
		'height'                 => 730,
		'width'                  => 1600,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'nulis_header_style',
		'admin-head-callback'    => 'nulis_admin_header_style',
		'admin-preview-callback' => 'nulis_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'circle' => array(
			'url'           => '%s/assets/images/headers/nulis-header.png',
			'thumbnail_url' => '%s/assets/images/headers/nulis-header-thumb.png',
			'description'   => _x( 'Nulis', 'Nulis theme default header', 'nulis' )
		)
	) );
}
add_action( 'after_setup_theme', 'nulis_custom_header_setup', 11 );

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: Hide text (returns 'blank'), or any hex value.
 *
 * @since Nulis 1.0
 */
function nulis_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="nulis-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 1600px auto;
			padding-bottom: 5.5em;
		}
		.inner-header {
			padding-top: 3.5em;
			padding-bottom: 4.5em;
		}
		.site-branding {
			padding-top: 4.5em;
			padding-bottom: 0;
		}
		@media (max-width: 767px) {
			.site-header {
				background-size: 768px cover;
			}
		}
		@media (max-width: 359px) {
			.site-header {
				background-size: 360px cover;
			}
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-branding .site-title,
		.site-branding .site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	
	<?php
		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-header .user-avatar {
			border-color: #<?php echo esc_attr( $text_color ); ?>;
		}
		.site-header .user-avatar:hover {
			border-color: rgba(95, 95, 95, 0.38);
		}
		.site-branding .site-title a,
		.site-branding .site-description,
		.site-header .social-links a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
		.site-branding .site-title a:hover,
		.site-header .social-links a:hover {
			color: rgba(95, 95, 95, 0.38);
		}
		.site-header .social-links a {
			border: 2px solid #<?php echo esc_attr( $text_color ); ?>;
		}
		.site-header .social-links a:hover {
			border: 2px solid rgba(95, 95, 95, 0.38);
		}
	<?php endif; ?>
	</style>
	<?php
}
