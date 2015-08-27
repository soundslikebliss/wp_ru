<?php
/**
 * Nulis functions and definitions
 *
 * @package Nulis
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Nulis only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'nulis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nulis_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nulis, use a find and replace
	 * to change 'nulis' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nulis', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', 'assets/genericons/genericons/genericons.css', nulis_fonts_url() ) );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nulis-featured', 1272, 0, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nulis' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'  ) );

	// Set up the WordPress core custom background feature. 
	add_theme_support( 'custom-background', apply_filters( 'nulis_custom_background_args', array(
		'default-color' => 'F2F2F2',
		'default-image' => '',
	) ) );
}
endif; // nulis_setup
add_action( 'after_setup_theme', 'nulis_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nulis_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area One', 'nulis' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area Two', 'nulis' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area Three', 'nulis' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Area Four', 'nulis' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'nulis_widgets_init' );


if ( ! function_exists( 'nulis_fonts_url' ) ) :
/**
 * Register Google fonts for Nulis
 *
 * @return string Google fonts URL for the theme.
 */
function nulis_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'nulis' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'nulis' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'nulis' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'nulis' ) ) {
		$fonts[] = 'Playfair Display:400,700,400italic,700italic';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'nulis' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function nulis_scripts() {

	wp_enqueue_style( 'nulis-style', get_stylesheet_uri() );

    wp_enqueue_style( 'nulis-fonts', nulis_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/genericons/genericons/genericons.css', array(), '3.3' );

	wp_enqueue_script( 'nulis-js', get_template_directory_uri() . '/assets/js/nulis.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'nulis-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nulis_scripts' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function nulis_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'nulis_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nulis_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', 'nulis_body_classes' );

if ( ! function_exists( '_wp_render_title_tag' ) ) :
/*
* Filters wp_title to print a neat <title> tag based on what is being viewed.
*
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string The filtered title.
*/
function nulis_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'nulis' ), max( $paged, $page ) );
	}
		return $title;
	}
	add_filter( 'wp_title', 'nulis_wp_title', 10, 2 );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function nulis_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'nulis_setup_author' );


if ( ! function_exists( 'nulis_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since Nulis 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function nulis_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="continue-reading">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'nulis' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'nulis_excerpt_more' );
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Nulis Customizer
 */
function nulis_customize_controls_enqueue_scripts() { ?>
    <style type="text/css">
    	.wp-full-overlay, .wp-full-overlay .collapse-sidebar,.wp-full-overlay-main, .wp-full-overlay-sidebar {box-shadow: 0 -20px 30px 30px rgba(0, 0, 0, 0.1);}
    	.customize-controls-close,.wp-full-overlay-sidebar {border-right: 0px solid #6E7F8F !important;}
    	.customize-controls-close, #customize-header-actions {border-bottom: 1px solid #6E7F8F;background-color: #6E7F8F;}
		.wp-full-overlay .collapse-sidebar-arrow:before,#customize-controls .control-panel-back:focus, #customize-controls .control-panel-back:hover, .customize-controls-close:focus,.customize-controls-close:hover,
		.wp-full-overlay-sidebar,.wp-full-overlay-sidebar-content.accordion-container,#customize-info .accordion-section-title {background: none repeat scroll 0% 0% #55626D !important;}
    	#accordion-section-nulis_customizer .accordion-section-title{background-color: #FFC600;}
    	#accordion-section-nulis_customizer .accordion-section-title {text-align: left;border-bottom: 0px solid #EEE;text-transform: uppercase;}
    	#customize-info .accordion-section-title { text-align: center;border-bottom: 0px solid #EEE;}
    	.wp-full-overlay a.collapse-sidebar,#customize-controls .control-panel-back:focus,#customize-controls .control-panel-back:hover, #customize-controls .customize-controls-close:focus, 
		#customize-controls .customize-controls-close:hover,#accordion-section-nulis_customizer .accordion-section-title,#customize-info .accordion-section-title,.accordion-section-title:hover:after,#customize-info .accordion-section-title:after,#customize-info .accordion-section-title:hover,#accordion-section-nulis_customizer .accordion-section-title:after {color: #FFF;}
		#customize-info .accordion-section-title:hover {background-color: #e2b626;}
		#customize-controls .control-panel-back:focus,#customize-controls .control-panel-back:hover, 
		#customize-controls .customize-controls-close:focus,#customize-controls .customize-controls-close:hover {border-color: #55626D;outline: 0px none;box-shadow: none;}
		.wp-full-overlay-sidebar {border-right: 1px solid #DDD;}
		.wp-core-ui.wp-customizer .button-primary-disabled, .wp-core-ui.wp-customizer .button-primary.disabled, .wp-core-ui.wp-customizer .button-primary:disabled, .wp-core-ui.wp-customizer .button-primary[disabled] {color: #FFF !important;background: none repeat scroll 0% 0% #4F5B66 !important;border-color: #4F5B66 !important;box-shadow: none !important;text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1) !important;cursor: default; }
		.wp-core-ui.wp-customizer .button-primary.focus, .wp-core-ui.wp-customizer .button-primary.hover, .wp-core-ui.wp-customizer .button-primary:focus, .wp-core-ui.wp-customizer .button-primary:hover {background: none repeat scroll 0% 0% #98AAB3;border-color: #98AAB3;box-shadow:none !important;color: #FFF;}
		.wp-core-ui .button-primary {background: none repeat scroll 0% 0% #4A5E68;border-color: #4A5E68;box-shadow: 0px 1px 0px rgba(95, 92, 92, 0.5) inset, 0px 1px 0px rgba(0, 0, 0, 0.15);color: #FFF;text-decoration: none;}
		#customize-theme-controls .accordion-section-content {color: #555;background: none repeat scroll 0% 0% #F3F7F9;}
		#customize-theme-controls .control-section .accordion-section-title:focus,#customize-theme-controls .control-section .accordion-section-title:hover, 
		#customize-theme-controls .control-section.open .accordion-section-title,#customize-theme-controls .control-section:hover > .accordion-section-title {background: none repeat scroll 0% 0% #B4B4B4;color: #FFF;
		}
    </style>
<?php }
add_action( 'customize_controls_print_scripts', 'nulis_customize_controls_enqueue_scripts' );
?>