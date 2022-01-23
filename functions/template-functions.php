<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package FleximpleTheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fleximpletheme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'fleximpletheme_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable entrys.
 */
function fleximpletheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'fleximpletheme_pingback_header' );


/**
 * Customize archive page titles.
 */
add_filter( 'get_the_archive_title', function ( $title ) {
	$title = str_replace( ': ', ': <em>', $title ) . '</em>';
    return $title;
} );


/**
 * Customize login logo URL and title.
 */
function fleximpletheme_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'fleximpletheme_login_logo_url' );
 
function fleximpletheme_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'fleximpletheme_login_logo_url_title' );