/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description, .social-links a' ).css( {
					'clip': 'auto',
					'color': to,
					'border-color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Nulis colors
	var AccentColor, BgColor, BorderColor, ToolBarColor, AboutMeColor, AboutMeBorder, FooterBg;
	AccentColor 	= 'a:hover,a:focus,#scrollup:hover,.format-quote a,.dropdown-toggle,.entry-meta a:hover,.format-quote cite a,.comment-metadata a:hover,.comment-metadata a:focus,.pingback .edit-link a:hover,.pingback .edit-link a:focus,.paging-navigation .nav-links a:hover,.comment-navigation .nav-links a:hover';
	BgColor			= 'button,.badger,.more-link:hover,.edit-link a:hover,.cat-links a:hover,.tags-links a:hover,.page-links a:hover,input[type="button"],input[type="reset"],input[type="submit"],.comment-list .reply a,.comments-link a:hover,.continue-reading:hover,.primary-nav ul ul,.bypostauthor > article .fn:after,.comment-list .reply a:hover';
	BorderColor 	= 'blockquote,.site-info,#scrollup:hover,.more-link:hover,.social-links a:hover,.continue-reading:hover,.continue-reading:hover';
	ToolBarColor 	= '.toolbar, .site-info';
	AboutMeColor	= '.site-footer .site-title a,.site-footer .site-description,.site-footer .social-links a';
	AboutMeBorder	= '.site-footer .user-avatar,.site-footer .social-links a';
	FooterBg		= '.site-footer';

	wp.customize( 'nulis_accent_color', function( value ) {
		value.bind( function( to ) {
			$( AccentColor ).css( { 'color': to } );
			$( BgColor ).css( { 'background-color': to } );
			$( BorderColor ).css( { 'border-color': to } );
		} );
	} );

	wp.customize( 'nulis_main_color', function( value ) {
		value.bind( function( to ) {
			$( ToolBarColor ).css( { 'background-color': to } );
		} );
	} );

	wp.customize( 'nulis_about_me_color', function( value ) {
		value.bind( function( to ) {
			$( AboutMeColor ).css( { 'color': to } );
		} );
	} );

	wp.customize( 'nulis_aboutme_text_color', function( value ) {
		value.bind( function( to ) {
			$( AboutMeBorder ).css( { 'border-color': to } );
		} );
	} );

	wp.customize( 'nulis_aboutme_color', function( value ) {
		value.bind( function( to ) {
			$( FooterBg ).css( { 'border-color': to } );
		} );
	} );

} )( jQuery );
