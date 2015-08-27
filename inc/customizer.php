<?php
/**
 * Nulis Theme Customizer
 *
 * @package Nulis
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nulis_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport 	= 'postMessage';

	// Remove unused section
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
	
	// Color Section
	$wp_customize->add_section( 'nulis_color', array(
		'priority'    			=> 2,
		'title'       			=> __( 'Colorized Your Blog', 'nulis' ),
		'description' 			=> __( 'Choose your favourite color to match with your character.', 'nulis' ),
	));

					$wp_customize->get_control('header_textcolor')->section 	='nulis_color';
					$wp_customize->get_control('header_textcolor')->priority 	= 1;
					$wp_customize->get_control('header_textcolor')->description = __('Change site title & description default color.', 'nulis' );
				
			$wp_customize->add_setting( 'nulis_accent_color', array(
				'default' 				=> '#FFC600',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nulis_accent_color', array(
						'label'   				=> __('Accent Color', 'nulis' ),
						'section' 				=> 'nulis_color',
						'settings'  			=> 'nulis_accent_color',
					) ) );

			$wp_customize->add_setting( 'nulis_main_color', array(
				'default' 				=> '#F3F7F9',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nulis_main_color', array(
						'label'   				=> __('Toolbar Background', 'nulis' ),
						'section' 				=> 'nulis_color',
						'settings'  			=> 'nulis_main_color',
					) ) );	

			$wp_customize->add_setting( 'nulis_about_me_color', array(
				'default' 				=> '#FFFFFF',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nulis_about_me_color', array(
						'label'   				=> __('About Me Background', 'nulis' ),
						'section' 				=> 'nulis_color',
						'settings'  			=> 'nulis_about_me_color',
					) ) );
	
			$wp_customize->add_setting( 'nulis_aboutme_text_color', array(
				'default' 				=> '#A5B2B9',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );
				
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nulis_aboutme_text_color', array(
						'label'   				=> __('About Me Text', 'nulis' ),
						'section' 				=> 'nulis_color',
						'settings'  			=> 'nulis_aboutme_text_color',
					) ) );

			$wp_customize->add_setting( 'nulis_footer_text_color', array(
				'default' 				=> '#A5B2B9',
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'         	=> 'postMessage',
			) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nulis_footer_text_color', array(
						'label'   				=> __('Footer Text', 'nulis' ),
						'section' 				=> 'nulis_color',
						'settings'  			=> 'nulis_footer_text_color',
					) ) );				

	// Logo Section
	$wp_customize->add_section( 'nulis_logo_image', array(
		'priority'    			=> 2,
		'title'       			=> __( 'Upload Avatar', 'nulis' ),
		'description' 			=> __( 'Add avatar/personal logo to your blog. You can use either Gravatar or upload your custom avatar by choosing options below.', 'nulis' ),
	));
    
		    // Use Gravatar Setting
			$wp_customize->add_setting( 'nulis_use_gravatar', array(
				'default' 				=> '',
				'sanitize_callback' 	=> 'nulis_sanitize_checkbox',
			));
			
						$wp_customize->add_control( 'nulis_use_gravatar', array(
							'label'    				=> __( 'Use gravatar', 'nulis' ),
							'section'  				=> 'nulis_logo_image',
							'type'    				=> 'checkbox',
							'description'			=> __('To use Gravatar simply check options above and write your Gravatar email address in the box below.', 'nulis'),				
						));

				    // Gravatar Email Setting
			$wp_customize->add_setting( 'gravatar_email', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'is_email',
			));

						$wp_customize->add_control( 'gravatar_email', array(
							'label'             	=> '',
							'section'           	=> 'nulis_logo_image',
							'type'              	=> 'text',
						));

			$wp_customize->add_setting( 'nulis_logo_image', array(
				'default'		 		=>  '',
				'type'              	=> 'theme_mod',
				'capability'        	=> 'edit_theme_options',
				'sanitize_callback' 	=> 'esc_url_raw',
			));
				    
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nulis_logo_images', array(
						'label'    		=> __( 'Self Upload', 'nulis' ),
						'section'  		=> 'nulis_logo_image',
						'settings' 		=> 'nulis_logo_image',
						'description' 	=> __( 'Upload your custom avatar/logo by clicking select image button below. Nulis theme recommends avatar/logo size 200x200 pixels.', 'nulis' )
						)
					));

	// Excerpt Options
	$wp_customize->add_section( 'nulis_post_excerpts', array(
		'priority'    			=> 3,
		'title'       			=> __( 'Post Excerpts', 'nulis' ),
		'description' 			=> __( 'Auto generate excerpts.', 'nulis' ),
	));

			$wp_customize->add_setting( 'nulis_excerpt_options', array(
				'default' 				=> '',
				'sanitize_callback' 	=> 'nulis_sanitize_checkbox',
			));
			
						$wp_customize->add_control( 'nulis_excerpt_options', array(
							'label'    				=> __( 'Use excerpts', 'nulis' ),
							'section'  				=> 'nulis_post_excerpts',
							'type'    				=> 'checkbox',
							'description'			=> __('Enabling this option will generate auto excerpt to your blog.', 'nulis'),				
						));
						

	// Social Links
	$wp_customize->add_section( 'nulis_social_links', array(
		'priority'    			=> 4,
		'title'       			=> __( 'Social Links', 'nulis' ),
		'description' 			=> __( 'Add social links to your blog.', 'nulis' ),
	));
	
			$wp_customize->add_setting( 'nulis_dribbble_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_dribbble_link', array(
						'label'             	=> __( 'Dribbble Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 1,
					));

			$wp_customize->add_setting( 'nulis_facebook_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_facebook_link', array(
						'label'             	=> __( 'Facebook Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 2,
					));

			$wp_customize->add_setting( 'nulis_flickr_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_flickr_link', array(
						'label'             	=> __( 'Flickr Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 3,
					));

			$wp_customize->add_setting( 'nulis_github_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_github_link', array(
						'label'             	=> __( 'Github Plus Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 4,
					));

			$wp_customize->add_setting( 'nulis_linkedin_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_linkedin_link', array(
						'label'             	=> __( 'LinkedIn Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 5,
					));	

			$wp_customize->add_setting( 'nulis_pinterest_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_pinterest_link', array(
						'label'             	=> __( 'Pinterest Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 6,
					));	

			$wp_customize->add_setting( 'nulis_rss_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_rss_link', array(
						'label'             	=> __( 'RSS Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 7,
					));	

			$wp_customize->add_setting( 'nulis_tumblr_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_tumblr_link', array(
						'label'             	=> __( 'Tumblr Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 8,
					));	

			$wp_customize->add_setting( 'nulis_twitter_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_twitter_link', array(
						'label'             	=> __( 'Twitter Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 9,
					));

			$wp_customize->add_setting( 'nulis_vimeo_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_vimeo_link', array(
						'label'             	=> __( 'Vimeo Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 10,
					));	

			$wp_customize->add_setting( 'nulis_youtube_link', array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
			));

					$wp_customize->add_control( 'nulis_youtube_link', array(
						'label'             	=> __( 'Youtube Link', 'nulis' ),
						'section'           	=> 'nulis_social_links',
						'type'              	=> 'text',
						'priority'          	=> 11,
					));	


	// Register textarea control
	class Nulis_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php 
		}
	}

	// About Me Section
	$wp_customize->add_section( 'nulis_profile', array(
		'title'       		=> __( 'About Me', 'nulis' ),
		'description' 		=> __( 'Write short description about you. To use this feature, please check options below. This text will hide current site title & site description appear in the footer section.', 'nulis' ),
		'priority'    		=> 5,
	));

			$wp_customize->add_setting( 'nulis_hide_footer_title_description', array(
				'default' 			=> '',
				'sanitize_callback' => 'nulis_sanitize_checkbox'
			));

					$wp_customize->add_control( 'nulis_hide_footer_title_description', array(
						'label'    			=> __( 'Use this feature', 'nulis' ),
						'section'  			=> 'nulis_profile',
						'type'    			=> 'checkbox',
						'priority' 			=> 10,
					));

			// Fullname Setting
			$wp_customize->add_setting( 'nulis_fullname', array(
				'default'    		=> 'Add your name',
				'type'       		=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			));
			
					$wp_customize->add_control('nulis_fullname_control', array(
						'settings' 			=> 'nulis_fullname',
						'label'    			=> __( 'Add your name', 'nulis' ),
						'section'  			=> 'nulis_profile',
						'type'     			=> 'text',
						'priority' 			=> 11,
						)
					);

			// Short Profile Setting
			$wp_customize->add_setting( 'nulis_short_profile', array(
				'default'  			=> '',
				'sanitize_callback' => 'nulis_sanitize_text',
			));

					$wp_customize->add_control( new Nulis_Textarea_Control( 
						$wp_customize, 'nulis_short_profile', array(
						'label'    			=> __( 'Short Profile', 'nulis' ),
						'section'  			=> 'nulis_profile',
						'description'		=> __(' Please note that only the "a" and "br" HTML tags are allowed.', 'nulis'),
						'priority' 			=> 12,
						) 
					));
}
add_action( 'customize_register', 'nulis_customize_register' );


/**
 * Callback function for sanitizing text area settings.
 */
function nulis_sanitize_text( $value ) {
	$value = wp_kses( $value, array(
		'a'  => array(
			'href'   => array(),
			'target' => array(),
			'rel'    => array(),
		),
		'br' => array(),
	) );
	return $value;
}

/**
 * Callback function for sanitizing checkbox settings.
 */
function nulis_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Gravatar as logo.
 * Use the admin email's gravatar or gravatar_email text field.
 */
function nulis_gravatar_logo() {
	// Get default from Discussion Settings.
	$default = get_option( 'avatar_default', 'mystery' ); // Mystery man default
	if ( 'mystery' == $default )
		$default = 'mm';
	elseif ( 'gravatar_default' == $default )
		$default = '';

	$protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';

	if ( ( get_option( 'admin_email' ) != get_theme_mod( 'gravatar_email' ) ) && is_email( get_theme_mod( 'gravatar_email' ) ) )
		$email = get_theme_mod( 'gravatar_email' );
	else
		$email = get_option( 'admin_email' );

	$url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( $email ) );
	$url = add_query_arg( array(
		's' => 120,
		'd' => urlencode( $default ),
	), $url );

	return esc_url_raw( $url );
}

/**
 * Let's colorized our blog!
 */
function nulis_colorized() {
	$color 				= esc_attr( get_theme_mod( 'nulis_accent_color') );
	$maincolor 			= esc_attr( get_theme_mod( 'nulis_main_color') );
	$footer_text_color 	= esc_attr( get_theme_mod( 'nulis_footer_text_color') );
	$footer_bg 			= esc_attr( get_theme_mod( 'nulis_about_me_color') ); 
	$aboutme_text_color = esc_attr( get_theme_mod( 'nulis_aboutme_text_color') );
	?>

	<!-- Custom style -->
		<style type="text/css" id="nulis-customizer-css">
			/* Hover & Accent Color */
			
			/*------------ Color ------------*/
			a:hover,
			a:focus,
			#scrollup:hover,
			.format-quote a,			
			.dropdown-toggle,
			.entry-meta a:hover,			
			.format-quote cite a,
			.comment-metadata a:hover,
			.comment-metadata a:focus,
			.pingback .edit-link a:hover,
			.pingback .edit-link a:focus,
			.paging-navigation .nav-links a:hover,
			.comment-navigation .nav-links a:hover {
				color: <?php echo $color; ?>;
			}

			/*------------ Background Color ------------*/
			button,
			.badger,
			.more-link:hover,
			.edit-link a:hover, 
			.cat-links a:hover, 
			.tags-links a:hover, 
			.page-links a:hover, 
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.comment-list .reply a,			
			.comments-link a:hover,
			.continue-reading:hover,
			.primary-nav ul ul,
			.bypostauthor > article .fn:after,
			.comment-list .reply a:hover {
				background-color: <?php echo $color; ?>;
			}
			
			/*------------ Border Color ------------*/
			body,
			blockquote,
			.default-logo:before,
			#scrollup:hover,
			.more-link:hover,
			.social-links a:hover,
			.continue-reading:hover,
			.continue-reading:hover {
				border-color: <?php echo $color; ?>;
			}
			
			/*------------ Toolbar & Site Info ------------*/
			.toolbar, 
			.site-info {
				background-color: <?php echo $maincolor; ?>;
			}

			/*------------ Site Info Color ------------*/
			.site-info p,
			.site-info a {
				color: <?php echo $footer_text_color; ?>;
			}

			/*------------ About Me Text Color ------------*/
			.site-footer .site-title a,
			.site-footer .site-description,
			.site-footer .social-links a {
				color: <?php echo $aboutme_text_color; ?>;
			}

			.site-footer .user-avatar,
			.site-footer .social-links a {
				border-color: <?php echo $aboutme_text_color; ?>;
			}

			/*------------ About Me Background Color ------------*/
			.site-footer {
				background-color: <?php echo $footer_bg; ?>;
			}
		</style>
	<?php	
}
add_action( 'wp_head', 'nulis_colorized' );


/**
* This outputs the javascript needed to automate the live settings preview.
*/
function nulis_customize_preview_js() {
	wp_enqueue_script( 
		'nulis-themecustomizer', 
		get_template_directory_uri() . '/assets/js/customizer.js', 
		array( 'customize-preview' ), '',
		true 
	);
}
add_action( 'customize_preview_init', 'nulis_customize_preview_js' );