<?php

	// Menus
	function bci_menus() {
		register_nav_menus( array(
			'side_icons' => 'Side Icon Menu',
			'mega_menu' => 'Mega Menu',
		) );
	}
	add_action( 'after_setup_theme', 'bci_menus' );

	function bci_sidebars() {
		$args = array(
			'id'			=> 'mainsidebar',
			'name'		  => __( 'Main Sidebar', 'bci' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'homesidebar',
			'name'		  => __( 'Home Sidebar', 'bci' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer1',
			'name'		  => __( 'Footer Area 1', 'bci' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer2',
			'name'		  => __( 'Footer Area 2', 'bci' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer3',
			'name'		  => __( 'Footer Area 3', 'bci' ),
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'bci_sidebars' );

add_filter( 'nav_menu_css_class', 'thd_menu_classes', 10, 2 );
function thd_menu_classes( $classes , $item ){
	if ( get_post_type() == 'tribe_events' || is_archive( 'tribe_events' ) || is_archive( 'document' ) || get_post_type() == 'announcement' || is_archive( 'announcement' ) || get_post_type() == 'potw' || is_archive( 'potw' ) || get_post_type() == 'potm' || is_archive( 'potm' ) || get_post_type() == 'centre' || is_archive( 'centre' ) ) {
		$classes = str_replace( 'current_page_parent', '', $classes );
		// find the url you want and add the class you want
		if ( $item->url == '/events' ) {
			$classes = str_replace( 'menu-item', 'menu-item current_page_item', $classes );
			remove_filter( 'nav_menu_css_class', 'thd_menu_classes', 10, 2 );
		}
	}
	return $classes;
}