<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Nulis
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function nulis_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'primary',
//		'type'		=> 'scroll',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'nulis_jetpack_setup' );
