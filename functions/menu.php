<?php
// Register menus
register_nav_menus(
	array(
		'main-menu-location'	=> __( 'Main Menu Location', 'fleximpletheme' ),	// Main menu in header
		'top-menu-location'	=> __( 'Top Menu Location', 'fleximpletheme' ),			// Top menu in header
	)
);

// The Main Menu
function fleximpletheme_main_menu() {
	wp_nav_menu( array(
		// 'menu',													// Desired menu. Accepts a menu ID, slug, name, or object
		'menu_id' => 'main-menu',								// The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented
		'menu_class' => 'main-menu menu', 						// CSS class to use for the ul element which forms the menu. Default 'menu'
		'container' => false,										// Whether to wrap the ul, and what to wrap it with. Default 'div'
		// 'container_id' => false,									// The ID that is applied to the container
		// 'container_class' => false,								// Class that is applied to the container. Default 'menu-{menu slug}-container'
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',		// How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders
		'theme_location' => 'main-menu-location',				// Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user
		'depth' => 0,												// How many levels of the hierarchy are to be included. 0 means all. Default 0
		'fallback_cb' => false,										// If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback
		'walker' => new Main_Menu_Walker()
	) );
}

// The Top Menu
function fleximpletheme_top_menu() {
	wp_nav_menu( array(
		// 'menu',												// Desired menu. Accepts a menu ID, slug, name, or object
		'menu_id' => 'top-menu',								// The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented
		'menu_class' => 'top-menu menu',						// CSS class to use for the ul element which forms the menu. Default 'menu'
		'container' => false,									// Whether to wrap the ul, and what to wrap it with. Default 'div'
		// 'container_id' => false,								// The ID that is applied to the container
		// 'container_class' => false,							// Class that is applied to the container. Default 'menu-{menu slug}-container'
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',	// How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders
		'theme_location' => 'top-menu-location',				// Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user
		'depth' => 0,											// How many levels of the hierarchy are to be included. 0 means all. Default 0
		'fallback_cb' => false,									// If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback
		'walker' => new Main_Menu_Walker()
	) );
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Main_Menu_Walker extends Walker_Nav_Menu {
	// Define current item global variable
	private $curr_item_id;
	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		// Make use of current item global variable
		$output .= "\n". $indent ."<ul id=\"menu-item-". $this->curr_item_id ."__submenu\" class=\"submenu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';

		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// $classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
		// $classes[] = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';
		// $classes[] = 'menu-item-' . $item->ID;
		// if ( $depth && $args->walker->has_children ) { $classes[] = 'dropdown-submenu'; }

		$class_names =  join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$current_object_id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$current_object_id = strlen( $current_object_id ) ? ' id="' . esc_attr( $current_object_id ) . '"' : '';

		// Assign current item value to global variable
		$this->curr_item_id = $item->ID;

		$output .= $indent . '<li' . $current_object_id . $value . $class_names . $li_attributes . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';

		// $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $args->walker->has_children ) ? ' </a><button class="submenu-toggle" aria-controls="menu-item-'. $item->ID .'__submenu" aria-pressed="false" aria-expanded="false">
		<span class="submenu-toggle-label sr-only">'. esc_html_x( 'Display submenu', 'toggle button', 'fleximpletheme' ) .'</span>
		<svg width="20" height="20" viewBox="0 0 20 20"><path d="M5 6l5 5 5-5 2 1-7 7-7-7z"></path></svg>
		</button>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// Header Fallback Menu
function fleximpletheme_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
		'menu_class' => '',		// Adding custom nav class
		'include' => '',
		'exclude' => '',
		'echo' => true,
		'link_before' => '',	// Before each link
		'link_after' => ''		// After each link
	) );
}

// Footer Fallback Menu
function fleximpletheme_footer_links_fallback() {
	/* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
	if ( $item -> current == 1 || $item -> current_item_ancestor == true ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
